<!DOCTYPE html>
<html lang="en">

<?php include 'head.php';?>

<body>

<?php include 'header.php';?>

<?php
session_start();
if (!isset($_SESSION["session_name"])){
    header("Location:../index.php");
  exit();
}
    if(isset($_GET["course_id"]))
    {
		$id = $_SESSION["session_name"];
        $course_id = $_GET["course_id"];
		require_once 'db_functions.php';
		$db = new db_functions();
		$enrolled = $db->getEnrollmentData($id, $course_id);
		if (!$enrolled["id"] == $course_id) {
			$course_info = $db->getCourseInfo($course_id);
			$db->enrollStudent($course_info["course_id"], $course_info["course_name"], $id);
			?>
			<div class="container"> 
	
<div class="row">
	<div class="col-sm-7 col-sm-offset-2">
		<h1>Congratulations, you're enrolled!</h1>
		<h4 style="line-height:140%">
		<br>
		Welcome to Drixel, and welcome to your new course! We look forward to providing you with an extraordinary learning experience. If you have any questions at any time, please don’t hesitate to contact us at support@drixel-NUST.com. Your classroom is waiting!
		</h4>
		<br>
		<a href="./course_videos.php?course_id=<?php    if(isset($_GET["course_id"])) {
 	echo $_GET["course_id"];}
	?>" class="btn btn-lg btn-info" style="height:45px;"><span class="glyphicon glyphicon-book"></span> Go to Class</a>
	</div>
</div>
</div>
<?php 
		}
		else { ?>
		<div class="row">
	<div class="col-sm-7 col-sm-offset-2 alert-warning">
		<h1 >You are already enrolled in this course!</h1>
		
		</div>
		<div class="col-sm-6 col-sm-offset-2 top-buffer">
		<a href="./course_videos.php?course_id=<?php    if(isset($_GET["course_id"])) {
 	echo $_GET["course_id"];}
	?>" class="btn btn-lg btn-info" style="height:45px;"><span class="glyphicon glyphicon-book"></span> Go to Class</a>
		</div>
		</div>
		<?php
		}
    }
?>

<!-- Page Content -->


<!-- /.container --> 
<?php include 'footer.php';?>

<!-- jQuery --> 
<script src="js/jquery.js"></script> 

<!-- Bootstrap Core JavaScript --> 
<script src="js/bootstrap.min.js"></script>
</body>
</html>
