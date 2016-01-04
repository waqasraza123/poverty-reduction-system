<?php
include('config.php');
if (!isset($_FILES['image']['tmp_name'])) {
	echo "";
	}else{
	$file=$_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
			
			move_uploaded_file($_FILES["image"]["tmp_name"],"photos/" . $_FILES["image"]["name"]);
			
			$location="photos/" . $_FILES["image"]["name"];
			$caption=$_POST['caption'];
			$title = $_POST['title'];
			$fullname = $_POST['fullname'];
			$cell = $_POST['cell'];
			$price = $_POST['price'];
			$sponsor = $_POST['sponsor'];
			$save=mysql_query("INSERT INTO photos (location, caption,title,fullname,cell,price,sponsored) VALUES ('$location','$caption','$title','$fullname','$cell','$price','$sponsor')");
			if ($sponsor == 1){
				header("location:sponsor_ad.php");
			}else{
				header("location:buy.php");
			}
			
			exit();					
	}
?>
