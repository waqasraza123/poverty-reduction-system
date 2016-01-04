  <?php
// Start the session
session_start();
if (!isset($_SESSION["user_type"])) {
	header("Location:../index.php");
}

?>
<?php 
	include "acceptor_header_footer.php";
?>


<!DOCTYPE html>

<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>

<style>
	p{
		text-align: justify;
	}
</style>

<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
</head>
<body >

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 style="text-align:center"> </h1>
				<br>
				<hr>
				<h4 style="text-align:center"> Donation Method </h4>
				<hr>
			</div>
		</div>

		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<br>
				<p>	 You can get two types of donations:		<br/>
					<ul>
						<li>	Financial	</li>
						<li>	Metirial	</li>
					</ul>
				</p>
				
				<br/>
				<h4>	Financial:	</h4>
				<p>
					Click on "Contact Us" in navigation bar on the top of the page. Fill the form on the page. If you need urgent response, you can call
					the at the given phone nummber
				</p>
				
				<br/>
				<h4>	Metirial:	</h4>
				<p>
					Beside money you can also get anything that you need and the is the donors have given for donation. Click on "Metirial Donations" in 
					navigation bar on the top of the page and select anything that you need. After that click "Confirm Reservation" at bottom-right side 
					of the page. On successful operation you will be show a success message.
					<br>
					You can see the items you reserved by clicking on "Reserved Items" in navigation bar on the top of the page. As soon as you recieve 
					kindly click the "Recieved" button at bottom-right side of this page.

				</p>				
				<div style="height:100px"></div>
			</div>
		</div>
	</div>
	
	<script>
		$(document).ready(
			function()
			{
				document.getElementById("method").className = "active";
			}
		)
	</script>
</body>
</html>