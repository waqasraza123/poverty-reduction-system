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
<title>Insert title here</title>
<?php 
	include "donor_header_footer.php";
	
?>

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
				<p>	 You can make two types of donations:		<br/>
					<ul>
						<li>	Financial	</li>
						<li>	Metirial	</li>
					</ul>
				</p>
				
				<br/>
				<h4>	Financial:	</h4>
				<p>
					Click on "Monetary Donations" in navigation bar on the top of the page. There you will see a number of cases. You can click "problem 
					details" button under any case you are interested in, to get the details of that case . Then you can either directly contact with the 
					acceptors on the contact number given, or you can donate money through us. 
				</p>
				
				<br/>
				<h4>	Metirial:	</h4>
				<p>
					Beside money you can also donate anything that you want to donate like: clothes, stationery items, books, bags, shoes etc. You can either 
					directly parcel the stuff at address:"House#874 dhgfshf". 
						If you can't parcel then click on "Metirial Donations" in navigation bar on the top of the page. Fill the form and we will collect
				</p>				
				<div style="height:100px"></div>
			</div>
		</div>
	</div>
	
	<script>
		$(document).ready(
			function()
			{
				document.getElementById("donation_method").className = "active";
			}
		)
	</script>
</body>
</html>