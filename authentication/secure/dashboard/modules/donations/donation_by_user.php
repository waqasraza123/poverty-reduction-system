<?php
// Start the session
session_start();
if (!isset($_SESSION["user_type"])) {
	header("Location:../index.php");
}
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
		?>
    
    
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
			
			$code = $_GET["problemcode"];
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			
			$sql = "select * from mh_user_data natural join metirial_donation_user natural join metirial_donation where metirial_id=$code";
			$result = $conn->query($sql);

			if($result->num_rows > 0)
			{
				$row = $result->fetch_assoc();
				
					$id_ = $row["metirial_id"];
					$f_name_= $row["user_first_name"];
					$l_name_= $row["user_last_name"];
					$email_= $row["user_email"];
					$pic_= $row["picture"];
					$recieved_ = $row["recieved"];
//										$description= $row["problem_description"];
					$address_= $row["user_address"];
					$contact_= $row["user_contact_number"];
				
			}
			else{
				echo "<script> alert('no data found') </script>";
			}
			


			?>

  
  
		<!-- Navigation Bar Code is in the store_header_footer.php file-->
		
		
		<!-- Jumbotron Code -->
		
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					
					<h1 style="text-align:center"> </h1>
					<br>
					<hr>

				</div>
			</div>
		
			<div style="height:50px"></div>

			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-6">
					<img src= <?php echo $pic_ ?>>
				</div>

					<script>
						function confirm_deletion()
						{
							document.getElementById("confirmation_value").value=confirm("Proceed Action?") ;
						}
					</script>
					
				<div class="col-md-5">
					<h4 >Donor Name: <?php echo $f_name_ . " ". $l_name_;?> </h4>
					<h5 >Donor email id: <?php echo $email_;?></h5>
					<h5 >Donor Contact number: <?php echo $contact_;?></h5>
					<h5 >Donor Address: <?php echo $address_;?></h5>
					<br>
					<hr>
					
					<?php
					
					if($recieved_ == 0)
					{
						echo '<form method="post" action="select_recieved_items.php">  <input type="submit" name="submit" value="Recieved" onclick="confirm_deletion()"	';
						echo 'class="btn btn-primary">';
					}	
					else 
					{
						echo '<form method="post" action="mark_sent_items.php"> <input type="submit" name="submit" value="Sent" 	onclick="confirm_deletion()"	';
						echo 'class="btn btn-success">';
					}
					?>
					
						<input type="text"   id="confirmation_value" name="confirmation_value"  style="display:none">
						<input type="text"   id="recieved_keys" 	 name="recieved_keys" 		value="<?php echo $code?>"  style="display:none">
					</form>
				
				</div>
			</div>

			
		<hr>
		
		<!-- Footer Code-->

		<div class="row" style="padding:5px; border:1px sloid #676767; box-shadow: 0 0 7px #000;background:rgb(44,63,82)">
							<?php
								$result = $conn->query("select * from mh_user_data natural join metirial_donation_user natural join metirial_donation where user_first_name='$f_name_' and user_last_name='$l_name_' and user_email='$email_' and recieved=0 ");
								
								$metirials = array($code);
								if($result->num_rows > 0)
								{
									echo "<h4 style='text-align:center; color:#eee'>Other donations by this user:</h4>		<hr/>";
									while($new_row = $result->fetch_assoc())
									{
										if($new_row["metirial_id"] != $id_)
										{
											echo "<div style='float:left; padding:5px'> <img src='".$new_row["picture"]."' style='width:200px; height:150px'> ";
											echo "<b><h5 style='text-align:center; color:#eee'>".$new_row["metirial_name"]."</b></h5> <h5 style='text-align:center; color:#eee'><b>Category:</b> ".$new_row["category"]."</h5> </div>";
											
											array_push($metirials,$new_row["metirial_id"]);
										}
									}
								}
								
								$metirial_keys = implode(",",$metirials);
								
								//echo $metirial_keys ;
		
						?>
		
		<div style="height:250px; width:400px;; background:rgb(44,63,82)"></div>
		</div>				
		</div>
		

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
