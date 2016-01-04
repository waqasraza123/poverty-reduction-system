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
	<style>
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
			<div class="col-md-12">
				<?php 
					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);
					// Check connection
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					} 
					$errors = 0;
					$reserved = array();
					$keys_arr = array_unique(explode(",",$_POST["reserved_items"]));
					$keys = implode(",",$keys_arr);

					$already_reserved = 0;
					$already_reserved_list = "";

					if((count($keys_arr)==1 && $keys_arr[0]==-1) || $_POST["reserved_items"] == "")
					{
						echo "<script>window.location = 'items_available.php'; </script>";
					}
					else{

					$sql ="select * from metirial_donation where metirial_id in($keys) and recieved=1 and reserved=1;";
					$result = $conn->query($sql);
					if($result->num_rows > 0)
					{
						
						while ($row = $result->fetch_assoc()) {
							# code...
							$already_reserved++;
							$already_reserved_list.= $row["metirial_name"].",";

						}
					}

						$sql = "update metirial_donation set reserved=1 where metirial_id in($keys)";
						$res = $conn->query($sql);
						//echo $res;
						if($res===true)
						{
						}
						else
							echo "*".$errors++;

							foreach ($keys_arr as $value) 
							{
    							//echo $keys_arr[$i];
								if($value != -1)
								{
									$sql = "insert into metirial_donation_acceptor(metirial_id, user_first_name, user_last_name, user_email) values($value,'". $_SESSION["user_first_name_"]."','".$_SESSION["user_last_name_"] ."','".$_SESSION["user_email_"] ."' )";
									$xx = $conn->query($sql);
									//echo "^^".$xx;
									if($xx===true)
									{
									}
									else
										$errors++;
								}
						}
					
						if($errors > 0)
							echo '<h3 style="text-align:center">Error Reserving items</h3>';
						if ($errors == 0 && $already_reserved==0)
						{
							echo '<h3 style="text-align:center">You have successfully reserved, You will recieve these items soon</h3></br>';
							echo "<h4 style='text-align:center'>kindly inform on recieving these items by clicking recieved</h4>";
						}
						if ($already_reserved>0 && $errors==0) {
							# code...
							echo "<h3 style='text-align:center'>All items except $already_reserved_list are successfully reserved, You will recieve these items soon</h3></br>";
							echo "<h4 style='text-align:center'>kindly inform on recieving these items by clicking recieved</h4>";
						}
						//echo "--".$errors;
					}
				?>
			</div>
			<div class="col-md-12" style="height:150px"></div>
		</div>

	</div>
	<div style="height:100px"> </div>


</body>
</html>