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

		if($_SESSION["user_type"] == "admin")
			include "donation_store_header_footer.php";
		else if($_SESSION["user_type"] == "donor")
			include "donor_header_footer.php";

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

</head>


<body>

	<div class="container">

	<div style="height:100px; width:100px"> </div>
	
	<div class="row">
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
					
					$sql = "select problem_name,money_required,money_recieved ,picture,problem_id from monetary_donation where validated=1";
					$result = $conn->query($sql);
										
					echo '<div class="container demo-3"> <ul class="grid cs-style-4">';
					$i=1;
					if($result->num_rows > 0)
					{
						
						while($row = $result->fetch_assoc())
						{
							if (!($_SESSION["user_type"]=="donor" && ($row["money_recieved"]>=$row["money_required"]))){
								echo '<li>
									<figure>
										<div><img src="pics/'.$row["picture"].'" style="" alt="image cant be displayed due to some issue"></div>
										<figcaption>
											<form action="monetary_problem.php" method="get"> 
												<h3>'.$row["problem_name"].'</h3>
												<span>Requires PKR '.$row["money_required"].'</span>
												<input type="text" name="problemcode" value='.$row["problem_id"].' style="display:none";> 
												<input type="submit" name="submit" value="problem details" style="float:left; background-color:#888888; color:#fff; position:absolute; bottom:5%"> 
											</form>
										</figcaption>
									</figure>
								</li>';
								# code...
							}

						}
					}
				?>
				</ul>
			</div>
		</div>
		<div style="height:100px; width:100px"> </div>
	</div>


	<script>
		$(document).ready(
			function()
			{
				document.getElementById("monetary_help").className = "active";
			}
		)
	</script>

</body>
</html>