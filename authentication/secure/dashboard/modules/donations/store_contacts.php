<?php
// Start the session
session_start();
if (!isset($_SESSION["user_type"])) {
	header("Location:../index.php");
}
?>
<!DOCTYPE html>

<html>
<head>
<meta charset="ISO-8859-1">
<title>Donate What You Want</title>


<?php 
	include "donor_header_footer.php";
	include "db_config_values.php";
?>

<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				
				<h1 style="text-align:center"> </h1>
				<br>
				<hr>
				<h4 style="text-align:center">Contact Us </h4>
				<hr>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<br><br><br>
				<p style="text-align:center">Have any questions or concerns? <br>We're always ready to help! </p>
				
				<br><br><br>
				<h5 style="text-align:center"> <b>Call us at </b></h5>
				<p style="text-align:center"> 123-456-7890 <br> or send a mail at <br> abc@def.com </p>
			</div>

			<div class="col-md-4">
				<br>
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form"> 
					<div class="form-group">
					  <label for="usr">Name:</label>
					  <input type="text" class="form-control" id="usr" name="cl_name" value="<?php echo $_SESSION["user_first_name_"]." ".$_SESSION["user_last_name_"];?>" disabled>
					</div>
					<div class="form-group">
					  <label for="email">Email:</label>
					  <input type="email" class="form-control" id="usr" name="cl_email" value="<?php echo $_SESSION["user_email_"];?>" disabled>
					</div>
					<div class="form-group">
					  <label for="usr">Subject:</label>
					  <input type="text" class="form-control" id="usr" name="cl_subject" maxlength="54">
					</div>
					<div class="form-group">
					  <label for="usr">Message:</label>
					  <textarea name="cl_comments" class="form-control" maxlength="390"></textarea>
					</div>
					
					<input type="submit" name="submit" value="Submit" style="background-color:#777777; color:#fff; width:100px; height:40px; border-radius:20px">
					
				</form>
				<div style="height:100px"></div>
			</div>
		</div>
	</div>
	
	
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{


	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 


	$unset_values = "";

	if (empty($_POST["cl_subject"]) && empty($_POST["cl_comments"])) {
		$unset_values.= "Subject and Message";
	}
	else{
		if (empty($_POST["cl_subject"])) {
			# code...
			$unset_values.= "Subject";
		}
		if (empty($_POST["cl_comments"])) {
			# code...
			$unset_values.= "Message";
		}
	}

	if ($unset_values != "") {
		echo "<script> alert('Kindly fill $unset_values.') </script>";
	}
	else
	{
		$subject = $_POST["cl_subject"];
		$comment = $_POST["cl_comments"];
		
		$sql = "insert into visitor_comment(visitor_name, visitor_email, visitor_subject, visitor_message) values ('".$_SESSION["user_first_name_"]."','".$_SESSION["user_email_"]."', '$subject', '$comment') ";
	
		if ($conn->query($sql) === TRUE) {
	    //echo "New record created successfully. Last inserted ID is: " .$conn->insert_id;
			echo "<script> alert('Your Message has been sent successfully.') </script>";
		} else {
			echo "<script> alert('Unfortunately your message couldnt be sent. Please try again.') </script>";
		}
	
	}
	$conn->close();
}
?>

	<script>
		$(document).ready(
			function()
			{
				document.getElementById("store_contact").className = "active";
			}
		)
	</script>


</body>
</html>