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
	
	$sql = "select visitor_name,visitor_email,visitor_subject,visitor_message from visitor_comment";
	$result = $conn->query($sql);
	
	$output = "";
	if($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			if($output !="")
				$output.=",";
			$output .= '{"name":"'.$row["visitor_name"].'",';
			$output .= '"email":"'.$row["visitor_email"].'",';
			$output .= '"subject":"'.$row["visitor_subject"].'",';
			$output .= '"message":"'.$row["visitor_message"].'"}';
		}
				
		$output = '{ "records": ['.$output.'] }';
		
		echo $output;
	}
?>
