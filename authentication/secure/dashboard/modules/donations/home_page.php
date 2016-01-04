<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>

<meta charset=utf-8 />
<title>Donate What You Want</title>
<link rel="stylesheet" type="text/css" href="home.css"></link>
<link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
<script src="jquery-1.11.js">		</script>

</head>
<body>


<h1>	Donate! what U can...	</h1>


<div class="circulatingDIV"  id="pic1">
	<div class="innerDiv">
		<img class="rotatingImg" src="pics/1.jpg">
	</div>
</div> 

<div class="circulatingDIV"  id="pic2">
	<div class="innerDiv">
		<img class="rotatingImg" src="pics/2.jpg">
	</div>
</div> 

<div class="circulatingDIV"  id="pic3">
	<div class="innerDiv">
		<img class="rotatingImg" src="pics/3.jpg">
	</div>
</div> 

<div class="circulatingDIV"  id="pic4">
	<div class="innerDiv">
		<img class="rotatingImg" src="pics/4.jpg">
	</div>
</div> 

<div class="circulatingDIV"  id="pic5">
	<div class="innerDiv">
		<img class="rotatingImg" src="pics/5.jpg">
	</div>
</div> 

<div class="circulatingDIV"  id="pic6">
	<div class="innerDiv">
		<img class="rotatingImg" src="pics/11.jpg">
	</div>
</div> 

<div class="circulatingDIV"  id="pic7">
	<div class="innerDiv">
		<img class="rotatingImg" src="pics/12.jpg">
	</div>
</div> 

<div class="circulatingDIV"  id="pic8">
	<div class="innerDiv">
		<img class="rotatingImg" src="pics/13.jpg">
	</div>
</div> 

<div class="circulatingDIV"  id="pic9">
	<div class="innerDiv">
		<img class="rotatingImg" src="pics/15.jpg">
	</div>
</div> 

<div class="circulatingDIV"  id="pic10">
	<div class="innerDiv">
		<img class="rotatingImg" src="pics/18.jpg">
	</div>
</div> 

<div id="containingDiv">
</div>

<div id="LoginDiv">
	<div >
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form"> 
			Email Address:
			<input type="text" name="u_email">
			<br><br>
			Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
			<input type="password" name="u_password">
			
			<input type="submit" value="submit" name="Submit">	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a style="font-size:15px; color:orange" href="forgot_password.php"> forgot password? </a>&nbsp;&nbsp;
			<a style="font-size:15px; color:orange" href="create_account.php"> No account? Create one </a>
		</form>
		
		
	</div>
</div>

 
 <?php

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

	$email = $_POST["u_email"];
	$password = $_POST["u_password"];
	
		$sql = "select * from mh_user_data where user_email='$email' and user_password='$password'";
		$result = $conn->query($sql);

		//echo "<script> alert(".$password.") </script>";
		
		$rrr = $result->num_rows;
		
		if($result->num_rows > 0)
		{
			$row = $result->fetch_assoc();
			$_SESSION["user_first_name_"] = $row["user_first_name"];
			$_SESSION["user_last_name_"] = $row["user_last_name"];
			$_SESSION["user_email_"] = $row["user_email"];
			$_SESSION["user_password_"] = $row["user_password"];
			if($row["user_donor"] == 1)
			{
				$_SESSION["user_type"] = "donor";
				echo "<script>window.location = 'donation_method.php'; </script>";
			}
			else if ($row["user_donor"] == 0)
			{
				$_SESSION["user_type"] = "acceptor";
				echo "<script>window.location = 'method.php'; </script>";
			}
			else if ($row["user_donor"] == 2)
			{
				$_SESSION["user_type"] = "admin";
				echo "<script>window.location = 'insert_monetary_help.php'; </script>";
			}
		} else {
			echo "<script> alert('Incorrect Name or Password Entered') </script>";
		}
	
	$conn->close();
	
}
?>
</body>
</html>