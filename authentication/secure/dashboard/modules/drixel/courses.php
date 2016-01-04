<!doctype html>
<html>
<?php include 'head.php';?>

<body>

<?php include 'header.php';?>

<?php
session_start();
if (!isset($_SESSION["session_name"])){
    header("Location:../index.php");
  exit();
}
else{
	$id = $_SESSION["session_name"];
    require_once 'db_functions.php';
	$db = new db_functions();
	$user_profile = $db->FindUser($id);	
}
?>

<div class="row">
	<div class="col-sm-5 col-sm-offset-1">
		<div class="flip">
			<div class="card" style="border: 2px solid #1a1a1a">
				<div class="face front" 
				style="  background-image: url('images/androids.jpg'); background-size: 100% 100%; background-repeat: no-repeat;" > </div>
				<div class="face back"> <span style="font-family:Arial, Helvetica, sans-serif">
					<h3 style="font-family: Impact, Charcoal, sans-serif;color: #990000">Introduction to Android Development</h3>
					<h4 style=" font-family:Arial, Helvetica, sans-serif; color:#00004d; align:left;"> &nbsp  Learn the basics of Android and Java programming, and take the first step on your journey to becoming an Android developer!</h4>
					<span style="position: absolute; margin-top:-3vw;margin-left:5vw;"><a class="btn btn-primary " href="<?php 	if($user_profile["role"] == "instructor")
	{
		echo "course_videos.php?course_id=1";	
	} else { echo "course_detail.php?course_id=1"; } ?>" style="font-size:0.4em">Learn More</a></span>
					<span style="font-style:bold; font-size:0.5em; color:#262626">Course duration: 7 weeks </span> </span> </div>
			</div>
		</div>
	</div>
	<div class="col-sm-5 ">
		<div class="flip">
			<div class="card" style="border: 2px solid #1a1a1a">
				<div class="face front" 
				style="  background-image: url('images/bdb2.jpg'); background-size: 100% 100%; background-repeat: no-repeat;" > </div>
				<div class="face back"> <span style="font-family:Arial, Helvetica, sans-serif">
					<h3 style="font-family: Impact, Charcoal, sans-serif;color: #990000">SQL Server</h3>
					<h4 style=" font-family:Arial, Helvetica, sans-serif; color:#00004d; align:left;"> &nbsp  Microsoft SQL Server is an application used to create computer databases for the Microsoft Windows family of server operating systems. Learn managing SQL server!</h4>
					<span style="position: absolute; margin-top:-3vw;margin-left:5vw;"><a class="btn btn-primary " href="<?php 	if($user_profile["role"] == "instructor")
	{
		echo "course_videos.php?course_id=2";	
	} else { echo "course_detail.php?course_id=2"; } ?>" style="font-size:0.4em">Learn More</a></span>
					<span style="font-style:bold; font-size:0.5em; color:#262626">Course duration: 5 weeks </span> </span> </div>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php';?>

<script src="js/jquery.js"></script> 
<script>
/* card flip */
$(".flip").hover(function(){
  $(this).find(".card").toggleClass("flipped");
});
</script>
</body>
</html>
