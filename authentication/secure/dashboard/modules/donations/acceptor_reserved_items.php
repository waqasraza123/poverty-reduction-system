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
	include "acceptor_header_footer.php";
	include "db_config_values.php";
?>

<script src="jquery.js"></script>

<script src="jquery-1.11.js">		</script>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Caption Hover Effects - Demo 3</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 
		<script src="js/modernizr.custom.js"></script>

	<style>
	
		.cat-link
		{
			margin-left:10%;
		}
		.cat-link:hover{
			color:#fff;
		}
		img{
			width: 200px;
			height: 140px;
		}
	</style>
</head>


	<script>
		function confirm_deletion()
		{
			document.getElementById("confirmation_value").value=confirm("Proceed Action?") ;
		}
	</script>


<body>

	<div class="container">
		<div class="row" style="margin-top:100px">
			<div class="col-md-12">
				
				<h1 style="text-align:center"> </h1>
				<hr>
			</div>
		</div>

		<div class="row">

			
			<div class="col-md-12">
				<?php 

					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);
					// Check connection
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					} 
					
					$reserved = array();
					
					$sql = "
							SELECT 
							    *
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

					$result = $conn->query($sql);
					
					
					echo '<div> ';
					
					if($result->num_rows > 0)
					{
						
						while($row = $result->fetch_assoc())
						{

							echo '
									<figure>
										<div class="row">

											<div class="col-md-6 col-md-push-3">
												<img src="'.$row["picture"].'" alt="image cant be displayed due to some issue">				
											</div>

											<div class="col-md-6">
												<h4 >   Category: '.$row["category"].'</h4>
												<p > Stuff: '.$row["metirial_name"].'</p>
											</div>

										</div>
									</figure>
								 <hr> '	;
						}
					
					echo '	<form method="post" action="delete_records.php">
						<input type="submit" name="submit" value="Recieved"  style="float:right" 	onclick="confirm_deletion()" class="btn btn-success">
						<input type="text"   id="confirmation_value" name="confirmation_value"  style="display:none">
					</form>';

					}
					else
					{
						echo "<h4 style='text-align:center'>No items reserved</h4>";
					}
				?>
			</div>
			<div class="col-md-12" style="height:50px"></div>
		</div>
	</div>

<!--
		<form action="donations_reserved.php" method="post">
			<input type="submit" name="submit" value="Confirm Reservation" style="border:1px;">
		</form>


	<button class="btn btn-success" style="float:right" onclick="delete_recieved_records()">
		Recieved	
	</button>		
-->





	<div style="height:100px"> </div>
	
	<script>
		$(document).ready(
			function()
			{
				document.getElementById("acceptor_reserved_items").className = "active";
			}
		);

		function delete_recieved_records()
		{
			alert("Proceed Action??");
			window.location = 'delete_records.php';
		}
	</script>

</body>
</html>