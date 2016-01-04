<?php
	include("../conn.php");
    session_start();
	
	if(isset($_POST['name'], $_POST['birthday'], $_POST['bloodtype'], $_POST['gneder'], $_POST['education'], $_POST['likes'], $_POST['education'], $_POST['location'])) {
		header("Location:../?m=incomplete+data");
	}
	
	$name = htmlspecialchars(trim($_POST['name']));
	$bday = htmlspecialchars($_POST['birthday']);
	$btype = htmlspecialchars(trim($_POST['bloodtype']));
	$gender = htmlspecialchars($_POST['gender']);
	$edu = htmlspecialchars(trim($_POST['education']));
	$likes = htmlspecialchars(trim($_POST['likes']));
	$desc = htmlspecialchars(trim($_POST['description']));
	$loc = htmlspecialchars(trim($_POST['location']));
	$user_id = 2; /* DEBUG */
	
	$dateparts = explode("/", $bday);
	$bday = $dateparts[2]."-".$dateparts[0]."-".$dateparts[1];
	
	echo $name."<br>";
	echo $bday."<br>";
	echo $btype."<br>";
	echo $gender."<br>";
	echo $edu."<br>";
	echo $likes."<br>";
	echo $desc."<br>";
	
	$sql = "select * from profile_users where user_id = ".$_SESSION['session_name']; /* DEBUG */
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		header("Location:../?m=user+exists");
	}
	
	$sql = "insert into profile_users (name, birthday, bloodgroup, gender, education, likes, description, location, user_id) values ('$name', $bday, '$btype', '$gender', '$edu', '$likes', '$desc', '$loc', $user_id)";
	if(mysqli_query($conn, $sql)) {
		echo "Yeah!";
	}
	else {
		echo "No!";
	}
	
	$target_dir = "../profpics/";
	$target_file = $target_dir."2"; /* DEBUG */
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
	$check = getimagesize($_FILES["profilepic"]["tmp_name"]);
	if($check)
		move_uploaded_file($_FILES["profilepic"]["tmp_name"], $target_file);
	
	header("Location:../");
?>