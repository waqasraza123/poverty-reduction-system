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
						
	$code = $_POST["recieved_keys"];

	echo "$code";


	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{

		if($_POST["confirmation_value"] == "true")	
		{
			//echo $_POST["confirmation_value"];
			$sql = "update metirial_donation set sent=1 where metirial_id = $code;";
			$result = $conn->query($sql);
			if ($conn->query($sql) === TRUE) {
				//echo "<script>alert('Record updated successfully')</script>";
				echo "<script>window.location = 'metirial_donation.php'; </script>";
			} //else {
				//echo "alert('Error updating record') ";
			//}
		}
		else
			//echo "<script>alert('ERRORS')</script>";
			echo "<script>window.location = 'metirial_donation.php'; </script>";
	}
?>