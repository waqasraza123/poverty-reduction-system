<!doctype html>
<html>
<?php include 'head.php';?>

<body>

<?php include 'header.php';?>

<?php
    if(isset($_GET["course_id"])) {
		require_once 'db_functions.php';
		$db = new db_functions();
		$course = $db->getCourseInfo($_GET["course_id"]);
	}
?>

<br>
<br>
<div class="container">
	<div class="row">
		<div class="col-sm-12"> <img src= <?php echo $course["image_logo"]; ?> class="img-responsive" alt="Responsive image"> </div>
	</div>
</div>
<div class="row top-buffer"> <a href="./enrollment_confirm.php?course_id=<?php    if(isset($_GET["course_id"])) {
 	echo $_GET["course_id"];}
	?>" class="btn btn-warning col-sm-2 col-sm-offset-5"><span class="glyphicon glyphicon-pencil"></span> Enroll in this Course</a> </div>
<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		<h2 id="showSummary"> <a><i id="chev" class="fa fa-chevron-right"></i>&ensp;Course Summary</a></h2>
		<div id="summary" hidden="true">
			<p> <?php echo $course["description"]; ?> </p>
		</div>
		<script src="js/jquery.js"></script>
		<script>
		$('#showSummary').click(function(){
			$('#chev').toggleClass('fa-chevron-right');
			$('#chev').toggleClass('fa-chevron-down');
			$('#summary').toggle();
		});
		</script>
	</div>
</div>
<?php include 'footer.php';?>
</body>
</html>
