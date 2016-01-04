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
		if($_SESSION["user_type"] == "acceptor")
			include "acceptor_header_footer.php";
		else if($_SESSION["user_type"] == "admin")
			include "donation_store_header_footer.php";

	include "db_config_values.php";
?>
<script src="jquery-1.11.js">		</script>

<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				
				<h1 style="text-align:center"> </h1>
				<br>
				<hr>
				<h4 style="text-align:center">Insert New Monetary Problem </h4>
				<hr>
			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
			</div>

			<div class="col-md-8">
				<br>
				<form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form"> 
				
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
							  <label for="usr">Problem Name:</label>
							  <input type="text" class="form-control" id="usr" name="p_name" 
							  value="<?php if (isset($_GET["p_name"])) {
							  	echo $_GET["p_name"];
							  }?>">

							</div>
							<div class="form-group">
							  <label for="mny">Money Required (in rupees):</label>
							  <input type="number" class="form-control" id="mny" name="money_req"
								value="<?php if (isset($_GET["money_req"])) {
							  	echo $_GET["money_req"];
							  }?>"							  
							  >
							</div>
							<div class="form-group">
							  <label for="cntc">Contact on:</label>
							  <input type="text" class="form-control" id="cntc" name="p_contact"
								value="<?php if (isset($_GET["p_contact"])) {
							  	echo $_GET["p_contact"];
							  }?>"							  
							  >
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="form-group">
 							  <label for="selectedIMG">Picture:</label><br/>
							  <img src="" style="width:100%; height:150px" id="selectedIMG"><br/>
							  <input type="file" id="files" name="files" />
							</div>						
						</div>
					</div>

					<div class="form-group">
					  <label for="email">Problem Description:</label>
					  <textarea name="feedback_MSG" class="form-control"  maxlength="500" rows="4"
								value="<?php if (isset($_GET["feedback_MSG"])) {echo $_GET["feedback_MSG"];}?>"
							  >
					</textarea>
					</div>
					
					<input type="submit" name="submit" value="Save" style="background-color:#777777; color:#fff; width:100px; height:40px; border-radius:20px">
					
				</form>
				<div style="height:100px"></div>
			</div>
		</div>
	</div>
	
	
	
<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") 
{

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	$unset_values = array();

	if (empty($_GET["p_name"]) ) {
		array_push($unset_values, "Problem Name");

	}
	if (empty($_GET["money_req"])) {
		# code...
		array_push($unset_values, "Money Required");
	}
	if (empty($_GET["p_contact"])) {
		# code...
		array_push($unset_values, "Contact on");
	}
	if (empty($_GET["feedback_MSG"])) {
		# code...
		array_push($unset_values, "Problem Description");
	}
	if (empty($_GET["files"])) {
		# code...
		array_push($unset_values, "Picture");
	}

	if (count($unset_values) >0 && count($unset_values)<5 ) {
		# code...
		$yyy = implode(',', $unset_values);
		echo "<script> alert('Kindly comlete the form. $yyy needs to be filled')</script>";

	}
	elseif (count($unset_values)==5) {
		# code...
	}

	else{
		$name = filter_var($_GET["p_name"], FILTER_SANITIZE_STRING);
		$money = $_GET["money_req"];
		$pic = $_GET["files"];
		$comment = filter_var($_GET["feedback_MSG"], FILTER_SANITIZE_STRING);
		$contact = filter_var($_GET["p_contact"], FILTER_SANITIZE_STRING);
		$validate_value = 0;

		if($_SESSION["user_type"] == "acceptor")
			$validate_value = 0;
		else if($_SESSION["user_type"] == "admin")
			$validate_value = 1;

		

		$sql = "insert into monetary_donation( problem_name, money_required, picture, problem_description, acceptor_contact,validated) values ('$name','$money', '$pic', '$comment','$contact',$validate_value) ";
		if ($conn->query($sql) === TRUE) {
	    echo "<script> alert('New record created successfully.') </script>";
	    echo "<script>window.location = 'insert_monetary_help.php'; </script>";
	    //echo "<script> alert('Incorrect Name or Password Entered') </script>";
		} else {
			//echo "Error: " . $sql . "<br>" . $conn->error;
			echo "<script> alert('A problem occoured while submitting data. Kindly try again')</script>";
		}
	}

	$conn->close();
}
?>

<script> 

  function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object

    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {

      // Only process image files.
      if (!f.type.match('image.*')) {
        continue;
      }

      var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          // Render thumbnail.
          var imgSelected = document.getElementById("selectedIMG");
		imgSelected.src= e.target.result;
		imgSelected.value= e.target.result;
		document.getElementById('list').insertBefore(imgSelected, null);
        };
      })(f);

      // Read in the image file as a data URL.
      reader.readAsDataURL(f);
    }
  }
document.getElementById('files').addEventListener('change', handleFileSelect, false);

 </script>
 
 
 
 	<script>
		$(document).ready(
			function()
			{
				document.getElementById("insert_monetary_help").className = "active";
			}
		)
	</script>


</body>
</html>