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
				<h4 style="text-align:center">Reset Password </h4>
				<hr>
			</div>
		</div>

		<div class="row">
			<<div class="col-md-2">	</div>
			<div class="col-md-8">
				<br>
				<form method="post" action="store_my_account.php"> 
					<h4>	Please enter your email address below. You will receive a link to reset your password.	</h4>
					<div class="form-group">
					  <label for="usr">Email Address:</label>
					  <input type="text" class="form-control" id="usr" name="cl_name">
					</div>
					<input type="submit" name="submit" value="Submit" style="background-color:#777777; color:#fff; width:100px; height:40px; border-radius:20px">
					
				</form>
				<div style="height:100px"></div>
			</div>
		</div>
	</div>
</body>
</html>