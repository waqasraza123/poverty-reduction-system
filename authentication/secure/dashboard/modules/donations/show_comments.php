
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
</head>


<body>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				
				<h1 style="text-align:center"> </h1>
				<hr>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-3">
				
			</div>
			
			<div class="col-md-9">
				<?php 
					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);
					// Check connection
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					} 
					
					$sql = "select visitor_name,visitor_email,visitor_subject,visitor_message from visitor_comment";
					$result = $conn->query($sql);
					
					
					echo '<div class="row">';
					
					if($result->num_rows > 0)
					{
						
						while($row = $result->fetch_assoc())
						{
							echo '<div class="row">';		#adds new row
							echo '<h5 ><b>Name: &nbsp;'.$row["visitor_name"].'</b></h5>';
							echo '<h5 ><b>Email: &nbsp;'.$row["visitor_email"].'</b></h5>  <h5 ><b>Subject: &nbsp;'.$row["visitor_subject"].'</b></h5>   <p >Message: &nbsp;'.$row["visitor_message"].'</p></div>';						#close column
							
							echo "<hr/>  <br>"	;				#closes the row
						}
					}
				?>
			</div>
		</div>
		<div style="height:100px; width:100px"> </div>
	</div>

	
	
		<script>
		$(document).ready(
			function()
			{
				document.getElementById("show_comments").className = "active";
			}
		)
	</script>

</body>
</html>