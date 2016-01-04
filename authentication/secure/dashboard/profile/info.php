<?php
	include("conn.php");
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
			<div class="col-md-12">
				<h1>Please fill in your details below</h1>
			</div>
		</div>
		<div class="row">
			<form method="post" action="func/store_details.php" enctype="multipart/form-data">
				<div class="col-md-6">
					<div class="form-group">
						<label>Full name</label>
						<input type="text" class="form-control" name="name" placeholder="Full name" required>
					</div>
					<div class="form-group">
						<label>Birthday</label>
						<input type="date" class="form-control" name="birthday" required>
					</div>
					<div class="form-group">
						<label>Blood Type</label>
						<input type="text" class="form-control" name="bloodtype" placeholder="A, B, O, AB, A+ etc." required>
					</div> 
					<div class="form-group">
						<label>Gender</label>
						<select name="gender" class="form-control" required>
							<option value="1">Male</option>
							<option value="2">Female</option>
							<option value="0">Other</option>
						</select>
					</div>
					<div class="form-group">
						<label>Location</label>
						<input type="text" class="form-control" name="location" placeholder="Islamabad, House, Cave etc." required>
					</div> 
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Education <small>(Optional)</small></label>
						<input type="text" class="form-control" name="education" placeholder="e.g. Graduated from XYZ University">
					</div> 
					<div class="form-group">
						<label>Likes <small>(Optional)</small></label>
						<input type="text" class="form-control" name="likes" placeholder="e.g Likes to party and study!">
					</div> 
					<div class="form-group">
						<label>Description <small>(Optional)</small></label>
						<textarea class="form-control" name="description" placeholder="Tell us about yourself in 500 characters or less."></textarea>
					</div> 
					<div class="form-group">
						<label>Upload a picture of yourself. The picture will be displayed publicly on your profile! <small>(Optional)</small></label>
						<input type="file" name="profilepic" accept="image/*">
						<p class="help-block">You are only allowed to upload image files (e.g. JPG, GIF, PNG).</p>
					</div>
					<button type="submit" class="btn btn-primary">SUBMIT DETAILS</button>
				</div>
			</form>
		</div>
	</div>
  
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>