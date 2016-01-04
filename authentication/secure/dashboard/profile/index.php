<?php
	include("conn.php");
    session_start();
	$user_found = false;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Viewing Profile</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/master-ui.css" rel="stylesheet">
	<style>
		body {
			margin-top: 80px;
		}
		
		.lead {
			line-height: 0.7em;
			margin-bottom: 10px;
		}
		
		h1 {
			line-height: 1.0em;
			margin-bottom: 15px;
			margin-top: 10px;
		}
	</style>
  </head>
  <body>
	<?php include("includes/nav.php"); ?>
  
	<div class="container">
		<div class="row">
		<?php if(!isset($_GET['id'])) : ?>
			<?php
				$sql = "select * from profile_users where user_id = ".$_SESSION['session_name']; /* DEBUG */
				$result = mysqli_query($conn, $sql);
				$myrow = array();
				if (mysqli_num_rows($result) > 0) {
					$user_found = true;
					while($row = mysqli_fetch_assoc($result)) {
						$myrow['name'] = $row['name'];
						$myrow['gender'] = "Other";
						if($row['gender'] == 1) {
							$myrow['gender'] = "Male";
						}
						else if($row['gender'] == 2) {
							$myrow['gender'] = "Female";
						}
						$myrow['location'] = $row['location'];
						$myrow['bloodgroup'] = $row['bloodgroup'];
						$myrow['birthday'] = $row['birthday'];
						$myrow['education'] = $row['education'];
						$myrow['likes'] = $row['likes'];
					}
				} 
			?>
			<?php if($user_found) : ?>
				<div class="col-md-2">				
					<a href="#" class="thumbnail">
						<?php if(file_exists("profpics/".$_SESSION['session_name'])): /* DEBUG */?>
							<img src="profpics/<?php echo $_SESSION['session_name']; /* DEBUG */ ?>">
						<?php else: ?>
							<img src="profpics/dp.png">
						<?php endif; ?>
					</a>
				</div>
				<div class="col-md-10">	
					<h1><?php echo $myrow['name']; ?></h1>
					<div class="row">	
						<div class="col-md-3">	
							<p><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $myrow['gender']; ?></p>
							<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Lives in <?php echo $myrow['location']; ?></p>
							<p><span class="glyphicon glyphicon-tint" aria-hidden="true"></span> Blood group <?php echo $myrow['bloodgroup']; ?></p>
						</div>
						<div class="col-md-3">
							<p><span class="glyphicon glyphicon-gift" aria-hidden="true"></span> Birthday <?php echo $myrow['birthday']; ?></p>
							<p><span class="glyphicon glyphicon-book" aria-hidden="true"></span> <?php echo $myrow['education']; ?></p>
							<p><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> <?php echo $myrow['likes']; ?>n</p>
						</div>
					</div>
				</div>
			<?php else: ?>
				<div class="col-md-2">				
					<a href="#" class="thumbnail">
					  <img src="profpics/dp.png">
					</a>
				</div>
				<div class="col-md-10">
					<h1>User information not found!</h1>
					<p class="lead">Please enter your information to the database by clicking the button below.</p><br>
					<a href="info.php" class="btn btn-primary">ENTER INFORMATION TO DATABASE</a>
				</div>
			<?php endif; ?>
		<?php else : ?>
			<?php
				$sql = "select * from profile_users where user_id = ".$_GET['id'];
				$result = mysqli_query($conn, $sql);
				$myrow = array();
				if (mysqli_num_rows($result) > 0) {
					$user_found = true;
					while($row = mysqli_fetch_assoc($result)) {
						$myrow['name'] = $row['name'];
						$myrow['gender'] = "Other";
						if($row['gender'] == 1) {
							$myrow['gender'] = "Male";
						}
						else if($row['gender'] == 2) {
							$myrow['gender'] = "Female";
						}
						$myrow['location'] = $row['location'];
						$myrow['bloodgroup'] = $row['bloodgroup'];
						$myrow['birthday'] = $row['birthday'];
						$myrow['education'] = $row['education'];
						$myrow['likes'] = $row['likes'];
					}
				} 
			?>
			<?php if($user_found) : ?>
				<div class="col-md-2">				
					<a href="#" class="thumbnail">
						<?php if(file_exists("profpics/".$_GET['id'])): ?>
							<img src="profpics/<?php echo $_GET['id']; ?>">
						<?php else: ?>
							<img src="profpics/dp.png">
						<?php endif; ?>
					</a>
				</div>
				<div class="col-md-10">	
					<h1><?php echo $myrow['name']; ?></h1>
					<div class="row">	
						<div class="col-md-3">	
							<p><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $myrow['gender']; ?></p>
							<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Lives in <?php echo $myrow['location']; ?></p>
							<p><span class="glyphicon glyphicon-tint" aria-hidden="true"></span> Blood group <?php echo $myrow['bloodgroup']; ?></p>
						</div>
						<div class="col-md-3">
							<p><span class="glyphicon glyphicon-gift" aria-hidden="true"></span> Birthday <?php echo $myrow['birthday']; ?></p>
							<p><span class="glyphicon glyphicon-book" aria-hidden="true"></span> <?php echo $myrow['education']; ?></p>
							<p><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> <?php echo $myrow['likes']; ?>n</p>
						</div>
					</div>
				</div>
			<?php else: ?>
				<div class="col-md-2">				
					<a href="#" class="thumbnail">
					  <img src="profpics/dp.png">
					</a>
				</div>
				<div class="col-md-10">
					<h1>User information not found!</h1>
					<p class="lead">The user's information will not be available until they upload it themselves.</p><br>
					<a href="./" class="btn btn-primary">GO TO YOUR PROFILE INSTEAD</a>
				</div>
			<?php endif; ?>
		<?php endif; ?>
		</div>
	</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>