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
						
	$item_values = substr($_POST["acceptor_data"], 1);
	

	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{

		if($_POST["confirmation_value"] == "true")
		{
			//echo $_POST["confirmation_value"];
			$sql = "update metirial_donation set sent=1 where metirial_id in ($item_values);";

			$result = $conn->query($sql);
			if ($conn->query($sql) === TRUE) {
				echo "<script>window.location = 'reservations.php?done=true'; </script>";
			} 
			else echo "<script>window.location = 'reservations.php?done=false'; </script>";

		}
		else
			echo "<script>window.location = 'reservations.php'; </script>";
	}
	else
			echo "<script>window.location = 'reservations.php'; </script>";
?>