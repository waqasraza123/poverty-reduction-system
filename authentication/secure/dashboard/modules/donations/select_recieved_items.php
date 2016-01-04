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
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$sql = "select * from mh_user_data natural join metirial_donation_user natural join metirial_donation where metirial_id=$code";
		$result = $conn->query($sql);

		if($result->num_rows > 0)
		{
			$row = $result->fetch_assoc();
			
				$f_name_= $row["user_first_name"];
				$l_name_= $row["user_last_name"];
				$email_= $row["user_email"];
		}

		if($_POST["confirmation_value"] == "true")	
		{
//			echo $_POST["confirmation_value"];
			$sql = "update metirial_donation set recieved=1 where metirial_id in (select metirial_id from metirial_donation_user where user_first_name='$f_name_' and user_last_name='$l_name_' and user_email='$email_');";
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