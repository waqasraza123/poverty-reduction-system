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
	include "donation_store_header_footer.php";
	include "db_config_values.php";

?>
<script src="jquery-1.11.js">		</script>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
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
		
		.col-md-1,.col-md-2, .col-md-3,.col-md-4,.col-md-5, .col-md-6,.col-md-7,.col-md-8, .col-md-9,.col-md-10,.col-md-11, .col-md-12{
		  padding-right: 15px;
		  margin-left:-10px;
		  padding-left: 15px;
		  margin-right:-10px;
		}
		.demo-3{
			margin-left: -5%;
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
		<br/>
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
			
			<div class="col-md-10">
				<?php 
					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);
					// Check connection
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					} 
					

					$sql ="";
					 
					if (isset($_GET["category"])) {
						# code...
						$sql ="select metirial_id, metirial_name,category,picture,recieved from metirial_donation where category='".$_GET["category"]."' and sent=0";
					}
					else{
						$sql ="select metirial_id, metirial_name,category,picture,recieved from metirial_donation  where sent=0";
					}
					$result = $conn->query($sql);
					
					
					echo '<div class="container demo-3"> <ul class="grid cs-style-3">';
					
					if($result->num_rows > 0)
					{
						
						while($row = $result->fetch_assoc())
						{

							echo	'<li>
									<figure>
										<img src="'.$row["picture"].'" alt="image cant be displayed due to some issue">
										<figcaption>
											<form action="donation_by_user.php" method="get">
											<h4>Category: '.$row["category"].'</h4>
											<span>Stuff: '.$row["metirial_name"].'</span>';
											if($row["recieved"] == 1)
												echo '<img src="pics/tick.png" style="width:20px;height:20px; float:right">';
										echo'<input type="text" name="problemcode" value='.$row["metirial_id"].' style="display:none";> <input type="submit" name="submit" value="details" style="float:right; background-color:#888888; color:#fff;"> </form>
										</figcaption>
									</figure>
								</li>'			;									
						}
					}
					else
						echo "<h4>No items availabe</h4>";
				?>
			</div>
			<div class="col-md-12" style="height:150px"></div>
		</div>
		
	</div>
	<div style="height:100px"> </div>
	
	
	
		<script>
		$(document).ready(
			function()
			{
				document.getElementById("metirial_donation").className = "active";
			}
		)
	</script>

</body>
</html>