<?php
// Start the session
session_start();
if (!isset($_SESSION["user_type"])) {
	header("Location:../index.php");
}
?>
<?php
include "db_config_values.php";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
						
//	$code = $_POST["recieved_keys"];

	
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
//			echo "alert('Error updating record') ";
		$xxx = $_POST["problemcode"];
		$money_ = $_POST["money_recieved"];

		if ($money_>0) {
			$sql = "update monetary_donation set money_recieved = money_recieved + $money_ where problem_id=$xxx;";
			if ($conn->query($sql) === TRUE) {
				//echo "<script>alert('Record updated successfully')</script>";
				echo "<script>window.location = 'monetary_help.php'; </script>";
				echo "alert('Donation added successfully') ";
			}
			else {
				echo "<script>window.location = 'monetary_help.php'; </script>";
				echo "alert('An error occoured. Please try again later') ";
			}
		}
		else
			echo "<script>window.location = 'monetary_help.php'; </script>";
			//echo "<script>window.location = 'method.php'; </script>";
	} 
?>


