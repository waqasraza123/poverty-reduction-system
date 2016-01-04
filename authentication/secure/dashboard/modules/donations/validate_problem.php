<?php
// Start the session
session_start();
if (!isset($_SESSION["user_type"])) {
	header("Location:../index.php");
}
?>
<?php
require_once 'web/common.php';
?>


<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Donate What You Want</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<?php include "donation_store_header_footer.php";
		include "db_config_values.php";

	;?>
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<style>
		img{
			width:90%;
		}
	</style>
	
  </head>
  <body>

  
  
		<?php 
	$code= $name= $path= $money_red= $description= $money_recieved= $pieces= "";
			
		if ($_SERVER["REQUEST_METHOD"] == "GET") 
		{
			$code = $_GET["problemcode"];
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			
			$sql = "select problem_name,picture,money_required,problem_description, money_recieved, acceptor_contact from monetary_donation where problem_id=$code";
			$result = $conn->query($sql);

			if($result->num_rows > 0)
			{
				$row = $result->fetch_assoc();
				$name= $row["problem_name"];
				$path= $row["picture"];
				$money_red= $row["money_required"];
				$description= $row["problem_description"];
				$money_recieved= $row["money_recieved"];
				$contact= $row["acceptor_contact"];
			}
		
			#echo $_POST["productcode"];
			if (isset($_GET["payment"]) && $_GET["payment"]="done") {
				echo "<script>alert('Payment Successful! Thank you for donating') </script>";
			}
			
		}
		else
			{
				
			}
	
	?>

  
  
		<!-- Navigation Bar Code is in the store_header_footer.php file-->
		
		
		<!-- Jumbotron Code -->
		
		<div class="container">
					<br>
					<hr>
		
		<div style="height:50px"></div>

			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-6">
					<img src= <?php echo "pics/".$path ?>>
				</div>

				<div class="col-md-5">
					<h3 style="text-align:center"><?php echo $name;?>
					

					</h3>
					<h4 style="text-align:center">Rs <?php echo $money_red;?> required</h4>
					<h5 style="text-align:center">Contact on: <?php echo $contact;?></h5>
					<br>

					<hr>
					<p >
						<b>Details:</b> &nbsp; &nbsp;&nbsp;<?php echo $description;?> 
					</p>
					
					<hr>
					<br>					
					<?php 
						echo '
						<form method="post" action="validation_of_problem.php">
							<input type="text" name="problemcode" value="'.$_GET["problemcode"].'" style="display:none">
							<input type="submit" class="btn btn-success" value="Validate">
						</form>';
					?>
				</div>
			</div>

		</div>
		
		<div style="height:100px"></div>
		<hr>
		
		<!-- Footer Code-->

		
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>