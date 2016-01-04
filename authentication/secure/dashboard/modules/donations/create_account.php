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
	include "mm_store_header_footer.php";
?>

<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
</head>
<body >

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				
				<h1 style="text-align:center"> </h1>
				<br>
				<hr>
				<h4 style="text-align:center">Create Account </h4>
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
					  <label for="usr">First Name: * </label>
					  <input type="text" class="form-control" id="usr" name="user_f_name"  maxlength="15">
					</div>
					<div class="form-group">
					  <label for="usr">Last Name: * </label>
					  <input type="text" class="form-control" id="usr" name="user_l_name"  maxlength="15">
					</div>
					<div class="form-group">
					  <label for="email">Email: * </label>
					  <input type="email" class="form-control" id="usr" name="u_email"  maxlength="40">
					</div>
					<div class="form-group">
					  <input type="radio" id="radio1" name="u_donor" value="1"/>			<label for="radio1">Donor</label>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					  <input type="radio" id="radio2" name="u_donor" value="0"/>			<label for="radio2">Acceptor</label>	<br/>
					</div>	
					<div class="form-group">
					  <label for="pwd">Password: * </label>
					  <input type="password" class="form-control" id="usr" name="u_password"  maxlength="40">
					</div>
					<div class="form-group">
					  <label for="usr">Confirm Password: * </label>
					  <input type="password" class="form-control" id="usr" maxlength="40">
					</div>
					<div class="form-group">
					  <label for="usr">Address: * </label>
					  <input type="text" class="form-control" id="usr" name="u_address"  maxlength="100">
					</div>
					<div class="form-group">
					  <label for="usr">Contact Number: * </label>
					  <input type="text" class="form-control" id="usr" name="u_contact_no" maxlength="12">
					</div>
					<input type="submit" name="submit" value="Submit" style="background-color:#777777; color:#fff; width:100px; height:40px; border-radius:20px">
				</form>
				<div style="height:100px"></div>
			</div>
		</div>
	</div>
	
	
<?php

	function validateContact($contact) {
		for($zz=0 ; $zz<strlen($contact) ; $zz++)
		{
			if($zz == 4)
			{
			
				if($contact[$zz] != "-")
				{
					//echo "<script> alert('enter -') </script>";
					return false;
				}
			}
			
			else{
				if($contact[$zz]<"0" || $contact[$zz] >"9")
				{
					//echo "<script> alert('enter number') </script>";
					return false;
				}
			}
		}
		return true;
	}

function validateName($name) {
		for($zz=0 ; $zz<strlen($name) ; $zz++)
		{
			if($name[$zz]<"A" || $name[$zz]>"z")
			{
				return false;
			}			
		}
		return true;
	}


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "userdata";
	$errors = "";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	$first_name = $_POST["user_f_name"];
	$last_name = $_POST["user_l_name"];
	$email = $_POST["u_email"];
	$donor_acceptor = $_POST["u_donor"];
	$password = $_POST["u_password"];
	$address = $_POST["u_address"];
	$contact_number = $_POST["u_contact_no"];
		
	if(!validateContact($contact_number))
	{
		//echo "<script> alert('enter contact number in the given format') </script>";
		
	}
	
	if(!validateName($first_name))
	{
		echo "<script> alert('enter valid name') </script>";
	}
	
		//ask for correct input
	
	$sql = "insert into mh_user_data(user_first_name, user_last_name, user_email, user_donor, user_password, user_address, user_contact_number) values ('$first_name','$last_name', '$email', '$donor_acceptor','$password', '$address', '$contact_number') ";
	$result = $conn->query($sql);

	if ($conn->query($sql) === TRUE) {
    echo "New record created successfully. Last inserted ID is: " .$conn->insert_id;
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}
?>



</body>
</html>