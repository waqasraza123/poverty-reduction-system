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

<script src="jquery.js"></script>

<script src="jquery-1.11.js">		</script>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
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
			width: 100px;
			height: 70px;
		}
		.reservation_row{
			background:#ddd; 
			border-radius: 2em;
			padding: 0px;
		}
		.mh_user_data_col
		{
			background: #82B796;
			border-radius:2em;
			padding-left: 5%;
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
		<div class="row" style="margin-top:0px">
			<div class="col-md-12" style="height:100px;">
				
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
					


				$sql_names = "select user_address,user_contact_number, user_email,user_last_name, user_first_name from mh_user_data natural join metirial_donation_acceptor natural join metirial_donation where sent=0 group by user_email;";
				$result_names = $conn->query($sql_names);
					
			if($result_names->num_rows > 0)
				while($row_names = $result_names->fetch_assoc())
				{
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
						            user_first_name = '".$row_names["user_first_name"]."'
						                AND user_last_name = '".$row_names["user_last_name"]."'
						                AND user_email = '".$row_names["user_email"]."') and sent=0";

					$result = $conn->query($sql);
					if($result->num_rows > 0)
					{
					
						echo '<div class="row reservation_row" > 
						<div class="col-md-3 mh_user_data_col"> <h3><b>'.$row_names["user_first_name"].'</b></h3><b>Email: </b><br> '.$row_names["user_email"].'<br>
						<b>Contact no.:</b>'.$row_names["user_contact_number"].' <br>	<p><b>Address: </b>'.$row_names["user_address"].'</p><br>
						 </div>';
						
						$sent_items = "";
					
						while($row = $result->fetch_assoc())
						{
							$sent_items .= (",".$row["metirial_id"]);

							echo '	<div class="col-md-3">
										<img src="'.$row["picture"].'" alt="image cant be displayed due to some issue">				
										<h5 >   Category: '.$row["category"].'</h5>
										<p > Stuff: '.$row["metirial_name"].'</p>
									</div>'	;
						}


					echo '<form method="post" action="sent_to_acceptor.php">
							<input type="submit" name="submit" value="Sent"  style="position:absolute; right:2%;margin-top:2%;" 	onclick="confirm_deletion()" class="btn btn-success">
							<input type="text"   id="acceptor_data" name="acceptor_data"  style="display:none" 
							value='.
							$sent_items.'>
							<input type="text"   id="confirmation_value" name="confirmation_value"  style="display:none">
						</form>';

					echo "</div><br>";

					}
					else
					{
						echo "<h4 style='text-align:center'>No items reserved by acceptor</h4>";
					}					
				}
				?>
			</div>
			<div class="col-md-12" style="height:50px"></div>
		</div>
	</div>



	<div style="height:100px"> </div>
	
	<script>
		$(document).ready(
			function()
			{
				document.getElementById("reservations").className = "active";
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