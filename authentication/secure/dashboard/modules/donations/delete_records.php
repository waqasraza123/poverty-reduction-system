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

	echo "IN DELETION PHASE";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		if($_POST["confirmation_value"] == "true")	
		{
			echo $_POST["confirmation_value"];
//			echo "alert('Error updating record') ";
			$sql = "
					DELETE
					FROM
					    metirial_donation
					WHERE
					    metirial_id IN (SELECT 
					            metirial_id
					        FROM
					            metirial_donation_acceptor
					        WHERE
					            user_first_name = '".$_SESSION["user_first_name_"]."'
					                AND user_last_name = '".$_SESSION["user_last_name_"]."'
					                AND user_email = '".$_SESSION["user_email_"]."')";


//			$result = $conn->query($sql);
			if ($conn->query($sql) === TRUE) {
				echo "<script>window.location = 'method.php'; </script>";
			} else {
				echo "alert('Error updating record') ";
				//echo "errores";
			}
		}
		else
			{
				//echo "no errores000000000";
				echo "<script>window.location = 'acceptor_reserved_items.php'; </script>";
			}
	}
?>
