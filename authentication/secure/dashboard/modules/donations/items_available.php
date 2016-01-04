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
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>

	<style>
	
		.cat-link
		{
			margin-left:10%;
			background: transparent;
			border: 0px;
		}

		.cat-link:hover{
			color:#fff;
		}
		
	</style>
</head>


<body>

	<div class="container">
		<div class="row" style="margin-top:100px">
			<div class="col-md-12">
				
				<h1 style="text-align:center"> </h1>
				<hr>
			</div>
		</div>

		<div class="row">
			<div class="col-md-2" style="padding:5px; border:1px sloid #676767; box-shadow: 0 0 7px #000;background:#333;">
			
				<h4> Donations:</h4>

				<form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
				<input type="text" value="clothes" name="category" style="display:none">
				<input class="cat-link" type="submit" value="clothes">			</form>	<br>

				<form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
				<input type="text" value="bags" name="category" style="display:none">
				<input class="cat-link" type="submit" value="bags">					</form>	<br>

				<form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
				<input type="text" value="shoes" name="category" style="display:none">
				<input class="cat-link" type="submit" value="shoes">				</form>	<br>
				
				<form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
				<input type="text" value="furniture" name="category" style="display:none">
				<input class="cat-link" type="submit" value="furniture">			</form>	<br>
				
				<form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
				<input type="text" value="electrical equipment" name="category" style="display:none">
				<input class="cat-link" type="submit" value="electrical equipment">	</form>	<br>
				
				<form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
				<input type="text" value="household items" name="category" style="display:none">
				<input class="cat-link" type="submit" value="household items">		</form>	<br>
				
				<form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
				<input type="text" value="stationery and books" name="category" style="display:none">
				<input class="cat-link" type="submit" value="stationery and books">	</form>	<br>

				<form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
				<input type="text" value="miscellaneous" name="category" style="display:none">
				<input class="cat-link" type="submit" value="others">	</form>	<br>
		
			</div>
			
			
			<div class="col-md-9">
				<?php 
					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);
					// Check connection
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					} 
					
					$reserved = array();
					$sql ="";
					 
					if (isset($_GET["category"])) {
						# code...
						$sql ="select metirial_id, metirial_name,category,picture,recieved, reserved from metirial_donation where category='".$_GET["category"]."' and reserved=0 and recieved=1";
					}
					else{
						$sql ="select metirial_id, metirial_name,category,picture,recieved, reserved from metirial_donation where reserved=0 and recieved=1";
					}
					$result = $conn->query($sql);
					
					
					echo '<div class="container demo-3"> <ul class="grid cs-style-3">';
					
					if($result->num_rows > 0)
					{
						
						while($row = $result->fetch_assoc())
						{

							echo '<li>
									<figure>
										<img src="'.$row["picture"].'" alt="image cant be displayed due to some issue">
										<figcaption>
												<h4>Category: '.$row["category"].'</h4>
												<span>Stuff: '.$row["metirial_name"].'</span>
												<input type="text" name="problemcode" value='.$row["metirial_id"].' style="display:none">
												<button class="reserve_btn" style="float:right; background-color:#888888; color:#fff;"> Add to cart	</button>
										</figcaption>
									</figure>
								</li>'			;									
						}
						
					}
				?>
			</div>
			<div class="col-md-12" style="height:150px"></div>
		</div>
		
		<form action="donations_reserved.php" method="post">
			<input type="text" name="reserved_items" id="reserved_items" value="" style="display:none">
			<p style="color:#222; background:#ddd; float:right;padding:4px; border:2px solid #222">
			<input type="submit" name="submit" value="Confirm Reservation" style="border:0px;">
			<span class="glyphicon glyphicon-shopping-cart"> </span> </p>
		</form>

	</div>
	<div style="height:100px"> </div>
	
	<script>
		reservations=0;
		$(document).ready(
			//$(".reserve_btn").click(
			$("figcaption").on("click", ".reserve_btn",
				function() {
					var xx=$(this).prev().val();
					//alert(xx);
					
					if(reservations === 0)
						document.getElementById("reserved_items").value += xx;
					else
						document.getElementById("reserved_items").value += ","+xx;
					reservations++;
					$(this).replaceWith( '<button class="cancel_res_btn" style="float:right; background-color:#888888; color:#fff;"> Remove from cart	</button>' );
					
				}
			)

		);
		
		
	</script>
	
	<script>
		$(document).ready(
			function()
			{
				document.getElementById("metirial_donation").className = "active";
			}
		)
	</script>

		<script>
		$(document).ready(
			$("figcaption").on("click", ".cancel_res_btn",
			function() {
					//alert("in here");
					var xx=$(this).prev().val();
					var str = document.getElementById("reserved_items").value; 
					var res = str.replace(xx, "-1");
					document.getElementById("reserved_items").value = res;
					$(this).replaceWith( '<button class="reserve_btn" style="float:right; background-color:#888888; color:#fff;"> Add to cart	</button>' );
				}
			)
		)
	</script>
</body>
</html>