<!doctype html>
<html>
<?php include 'head.php';?>

<body>
<?php
$response=array();
    $response["success"]=-1;
session_start();
if (!isset($_SESSION["session_name"])){
    header("Location:../index.php");
  exit();
}
else{
    // reaching from current directory to _user_info
    require_once __DIR__ . '/../../php/user_info.php';
	$id = $_SESSION["session_name"];
//    echo $id;
	$pk = "delta";
	$project = "./drixel";
    $user = new UserInfo();
    $result = $user->module_user_id($pk, $project, $id);
	$array = json_decode($result, true);
	$user_info = $array["result"][0];
//    echo $result;
//    echo $user_info[''];
}
    require_once 'db_functions.php';
	$db = new db_functions();
	
	if(isset($_POST["sub"])) {
		$user_profile = $db->storeUserProfile($id, $_POST["dateOfBirth"], $_POST["gender"], $_POST["contactNum"], $_POST["address"]);
	}
	else if(isset($_FILES["dp"])) {
		$imagename = $_FILES["dp"]["name"]; 
		file_put_contents('dps/'.$imagename, file_get_contents($_FILES['dp']['tmp_name']));
		$db->storeUserDP($id, 'dps/'.$imagename);
	}
	$user_profile = $db->FindUser($id);	
	$enrolled = $db->getEnrollment($id);
	$row = array();
	$count = 0;
?>
<?php include 'header.php';?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="panel-title"><?php echo $user_info["username"] ?></h1>
			</div>
			<div class="panel-body">
			<div class="row">
			<div class="col-md-3 col-lg-3 " align="center">
			<img alt="User Pic" src= " <?php if ($user_profile["image"]) {
				 echo $user_profile["image"];
			} 
			else {
				echo "dps/batman.png";
			}
			?> " style="height:15vw;" class="img-circle img-responsive">
			<?php if ($user_profile["image"]) { 
			}
			else { ?>
			<form method="POST" action=" <?php $_PHP_SELF ?> " enctype="multipart/form-data">
				<span class="file-input btn btn-block btn-primary btn-file top-buffer"> Browse&hellip;
				<input type="file" name="dp" accept="image/*" onchange="javascript:this.form.submit();">
				</span>
			</form>
			<?php } ?>
		</div>
			<form method="post" action=" <?php $_PHP_SELF ?> ">
		<div class=" col-md-9 col-lg-9 ">
			<table class="table table-responsive">
				<tbody>
					<tr>
						<td > First Name: </td>
						<td><?php echo $user_info["firstname"] ?></td>
					</tr>
					<tr>
						<td> Last Name: </td>
						<td><?php echo $user_info["lastname"] ?></td>
					</tr>
					<tr>
						<td> Email: </td>
						<td><?php echo $user_info["email"] ?></td>
					</tr>
					<tr>
						<td class="col-sm-5"> Date of Birth: </td>
						<td><?php 
										if ($user_profile["date_of_birth"] == "") { 
										?>
							<div class="form-group input-group" style="margin:0">
								<input type="date" name="dateOfBirth" required class="form-control">
								<div class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </div>
							</div>
							<?php 
										}
										else {
											echo $user_profile["date_of_birth"];
										} 
									?></td>
					</tr>
					<tr>
						<td> Gender: </td>
						<td><?php 
										if ($user_profile["gender"] == "") { 
										?>
							<select required name="gender" class="form-group form-control">
								<option>Male</option>
								<option>Female</option>
							</select>
							<?php 
										}
										else {
											echo $user_profile["gender"];
										} 
									?></td>
					</tr>
					<tr>
						<td> Contact Number: </td>
						<td><?php 
										if ($user_profile["contact_num"] == "") { 
										?>
							<div class="input-group form-group" style="margin:0">
							<input required name="contactNum" type="number" class="form-control">
							<div class="input-group-addon"> <span class="glyphicon glyphicon-phone"></span> </div>
							<?php 
										}
										else {
											echo $user_profile["contact_num"];
										} 
									?></td>
					</tr>
					<tr>
						<td> Address: </td>
						<td><?php 
										if ($user_profile["address"] == "") { 
										?>
							<div class="form-group input-group" style="margin:0">
							<input required name="address" type="text" class="form-control">
							<div class="input-group-addon"> <span class="glyphicon glyphicon-map-marker"></span> </div>
							<?php 
										}
										else {
											echo $user_profile["address"];
										} 
									?></td>
					</tr>
					<?php if($user_profile["role"] != "instructor") {
						?>
					<tr>
						<td> Courses: </td>
						<td> <?php if ($enrolled) { 	while($row[$count] = $enrolled->fetch_assoc()) { echo $row[$count]["course_name"]; echo "<br>"; $count++; } } } ?></td>
					</tr>
					
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="panel-footer">
	<div class="row">
		<?php if($user_profile) { ?>
		<button class="col-sm-3 col-sm-offset-8 btn btn-success"><i class="glyphicon glyphicon-floppy-saved">&ensp;&ensp;Saved</i></button>
		<?php } else { ?>
		<button type="submit" name="sub" class="col-sm-3 col-sm-offset-8 btn btn-primary"><i class="glyphicon glyphicon-floppy-save">&ensp;&ensp;Save</i></button>
		<?php } ?>
	</div>
</div>
</form>
</div>
</div>
</div>
<?php include 'footer.php';?>

</body>
</html>
