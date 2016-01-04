<!DOCTYPE html>
<html lang="en">
<title>Drixel-Videos</title>
<!--  Animation Style -->
<link href="assets/css/animate.css" rel="stylesheet" />
<!--  Pretty Photo Style -->
<link href="assets/css/prettyPhoto.css" rel="stylesheet" />
<!--  Google Font Style -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<!--  Custom Style -->
<link href="assets/css/style.css" rel="stylesheet" />
<?php include 'head.php';?>

<body>

<!--/<div id="pre-div">
	<div id="loader"> </div>
</div>
. PRELOADER END -->

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

<?php
    if(isset($_GET["course_id"]))
    {
        $course_id = $_GET["course_id"];
		$course_info = $db->getCourseInfo($course_id);
		
		if(isset($_POST["save"])) {
		$db->updateCourseInfo($course_id,$_POST["course_name"],$_POST["summary"]);
		$chapter_no = "1";
		$db->updateChapter($course_info["contentTable_name"], "$chapter_no", $_POST["chapter_1_name"], $_POST["chapter_1_link"], $_POST["chapter_1_summary"]);
		$db->updateChapter($course_info["contentTable_name"], "2", $_POST["chapter_2_name"], $_POST["chapter_2_link"], $_POST["chapter_2_summary"]);
		$db->updateChapter($course_info["contentTable_name"], "3", $_POST["chapter_3_name"], $_POST["chapter_3_link"], $_POST["chapter_3_summary"]);
		$db->updateChapter($course_info["contentTable_name"], "4", $_POST["chapter_4_name"], $_POST["chapter_4_link"], $_POST["chapter_4_summary"]);		
	}
		
		$course_info = $db->getCourseInfo($course_id);
		$course_data = $db->getCourseData($course_info["contentTable_name"]);
		$row = array();
		$count = 0;
		while($row[$count] = $course_data->fetch_assoc()) {
			$count++;
		}
    }
?>


<?php 
if ($user_profile["role"] == "instructor") {
?>
	<div class="container">
  <h2 class="col-sm-4 col-sm-offset-5 "> Edit course data </h2>
  <form role="form" action="course_videos.php?course_id=<?php echo $course_id ?>" method="post" class="col-sm-8 col-sm-offset-2 top-buffer">
    <div class="form-group">
      <label for="course_name">Course Name:</label>
      <input type="text" required class="form-control" id="course_name" name="course_name" value="<?php echo $course_info["course_name"]; ?>">
    </div>
    <div class="form-group">
      <label for="summary">Summary:</label>
  		<textarea required class="form-control" rows="8" id="summary" name="summary"><?php echo $course_info["description"]; ?></textarea>
    </div>
    <div class="form-group">
      <label for="chapter_1_name">Chapter 1 Name:</label>
      <input type="text" required class="form-control" id="chapter_1_name" name="chapter_1_name" value="<?php echo $row[0]["chapter_name"]; ?>">
    </div>
    <div class="form-group">
      <label for="chapter_1_link">Chapter 1 Video Link:</label>
      <input type="text" required class="form-control" id="chapter_1_link" name="chapter_1_link" value="<?php echo $row[0]["video_link"]; ?>">
    </div>	
    <div class="form-group">
      <label for="chapter_1_summary">Chapter 1 Summary:</label>
      <input type="text" required required class="form-control" id="chapter_1_summary" name="chapter_1_summary" value="<?php echo $row[0]["video_summary"]; ?>">
    </div>
	<div class="form-group">
      <label for="chapter_2_name">Chapter 2 Name:</label>
      <input type="text" required class="form-control" id="chapter_2_name" name="chapter_2_name" value="<?php echo $row[1]["chapter_name"]; ?>">
    </div>
    <div class="form-group">
      <label for="chapter_2_link">Chapter 2 Video Link:</label>
      <input type="text" required class="form-control" id="chapter_2_link" name="chapter_2_link" value="<?php echo $row[1]["video_link"]; ?>">
    </div>	
    <div class="form-group">
      <label for="chapter_2_summary">Chapter 2 Summary:</label>
      <input type="text" required class="form-control" id="chapter_2_summary" name="chapter_2_summary" value="<?php echo $row[1]["video_summary"]; ?>">
    </div>
    <div class="form-group">
      <label for="chapter_3_name">Chapter 3 Name:</label>
      <input type="text" required class="form-control" id="chapter_3_name" name="chapter_3_name" value="<?php echo $row[2]["chapter_name"]; ?>">
    </div>
    <div class="form-group">
      <label for="chapter_3_link">Chapter 3 Video Link:</label>
      <input type="text" required class="form-control" id="chapter_3_link" name="chapter_3_link" value="<?php echo $row[2]["video_link"]; ?>">
    </div>	
    <div class="form-group">
      <label for="chapter_3_summary">Chapter 3 Summary:</label>
      <input type="text" required class="form-control" id="chapter_3_summary" name="chapter_3_summary" value="<?php echo $row[2]["video_summary"]; ?>">
    </div>
    <div class="form-group">
      <label for="chapter_4_name">Chapter 4 Name:</label>
      <input type="text" required class="form-control" id="chapter_4_name" name="chapter_4_name" value="<?php echo $row[3]["chapter_name"]; ?>">
    </div>
    <div class="form-group">
      <label for="chapter_4_link">Chapter 4 Video Link:</label>
      <input type="text" required class="form-control" id="chapter_4_link" name="chapter_4_link" value="<?php echo $row[3]["video_link"]; ?>">
    </div>	
    <div class="form-group">
      <label for="chapter_4_summary">Chapter 4 Summary:</label>
      <input type="text" required class="form-control" id="chapter_4_summary" name="chapter_4_summary" value="<?php echo $row[3]["video_summary"]; ?>">
    </div>

    <input type="submit" name="save" class="btn btn-primary col-sm-12" value="Submit">
  </form>
</div>

<?php	
}
else { ?>
<div id="about" >
<div class="container">
	<div class="row text-center">
		<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 sub-head">
			<h2  data-wow-delay="0.3s" class="wow rollIn animated" style="color: #003399"> <strong> <?php echo $course_info["course_name"]; ?> </strong></h2>
			<p class="sub-head">  <?php echo $course_info["description"]; ?> </p>
		</div>
	</div>
	<div class="row pad-top-botm wow flipInX animated" data-wow-delay="0.7s">
		<div class="col-lg-8 col-md-8 col-sm-8 " >
			<h3><strong>Course Contents</strong></h3>
			<ul>
			<li><?php echo $row[0]["chapter_name"] ?></li>
			<li><?php echo $row[1]["chapter_name"] ?></li>
			<li><?php echo $row[2]["chapter_name"] ?></li>
			<li><?php echo $row[3]["chapter_name"] ?></li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="well text-center" style="font-size:1.5em"> Content Provided by &nbsp &nbsp &nbsp <img src="images\youtube.png" width="80px"> &nbsp &nbsp &nbsp <img src="images\nust_logo.png "width="80px"> </div>
		</div>
		<!-- /.col-lg-12 --> 
	</div>
	<div id="help"  style="  background-image: url('images/back1.png'); " >
		<div class="overlay">
			<div class="container">
				<div class="row text-center">
					<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
						<h2 data-wow-delay="0.3s" class="wow rollIn animated"><strong>7 Tips for Successful Online Learners</strong></h2>
						<p class="sub-head">An introductory and inspirational video by experts. (Courtesy of Udacity) </p>
					</div>
				</div>
				<div class="row ">
					<div class="col-lg-6 col-lg-offset-1  col-md-6 col-md-offset-1">
						<iframe width="560" height="315" src="https://www.youtube.com/embed/1OGfaT4LvzQ" frameborder="0" allowfullscreen 
                 class="vedio-style wow rotateIn animated" data-wow-delay="0.4s"></iframe>
					</div>
					<div class="col-lg-4 col-md-4" style="padding-top: 50px;">
						<div class="media wow rotateIn animated" data-wow-delay="0.5s">
							<div class="pull-left"> <i class="fa fa-star-o fa-4x  "></i> </div>
							<div class="media-body">
								<h3 class="media-heading">Watch This Video</h3>
								<p> It gives you a basic idea and a road map of what is your way through the course. </p>
							</div>
						</div>
						<div class="media wow rotateIn animated" data-wow-delay="0.6s">
							<div class="pull-left"> <i class="fa fa-history fa-4x  "></i> </div>
							<div class="media-body">
								<h3 class="media-heading">Visit Udacity </h3>
								<p> They have a lot more insipirational videos and and technological information you might be interested in. </p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--./ HELP SECTION END -->
	
	<div id="port-folio" class="pad-top-botm" >
		<div class="container">
			<div class="row text-center ">
				<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
					<h2 data-wow-delay="0.3s" class="wow rollIn animated"><strong>Videos </strong></h2>
					<p class="sub-head">The list contains the video contents of course. </p>
				</div>
			</div>
			<div class="row ">
				<div class="col-lg-6 col-md-6 col-sm-6 ">
					<div class="portfolio-item wow rotateIn animated" data-wow-delay="0.4s">
						<iframe width="560" height="315" src="<?php echo $row[0]["video_link"] ?>" frameborder="0" allowfullscreen 
                 class="vedio-style wow rotateIn animated" data-wow-delay="0.4s"></iframe>
					</div>
					<h3  style="color: #003399"><strong> <?php echo $row[0]["chapter_name"] ?> </strong></h3>
					<p> <?php echo $row[0]["video_summary"] ?> </p>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 ">
					<div class="portfolio-item wow rotateIn animated" data-wow-delay="0.5s">
						<iframe width="560" height="315" src="<?php echo $row[1]["video_link"] ?>" frameborder="0" allowfullscreen 
                 class="vedio-style wow rotateIn animated" data-wow-delay="0.4s"></iframe>
					</div>
					<h3  style="color: #003399"><strong> <?php echo $row[1]["chapter_name"] ?> </strong></h3>
					<p> <?php echo $row[1]["video_summary"] ?> </p>
				</div>
			</div>
			<div class="row " style="padding-top: 50px;">
				<div class="col-lg-6 col-md-6 col-sm-6 ">
					<div class="portfolio-item wow rotateIn animated" data-wow-delay="0.6s">
						<iframe width="560" height="315" src="<?php echo $row[2]["video_link"] ?>" frameborder="0" allowfullscreen 
                 class="vedio-style wow rotateIn animated" data-wow-delay="0.4s"></iframe>
					</div>
					<h3  style="color: #003399"><strong> <?php echo $row[2]["chapter_name"] ?> </strong></h3>
					<p> <?php echo $row[2]["video_summary"] ?> </p>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 ">
					<div class="portfolio-item wow rotateIn animated" data-wow-delay="0.7s">
						<iframe width="560" height="315" src="<?php echo $row[3]["video_link"] ?>" frameborder="0" allowfullscreen 
                 class="vedio-style wow rotateIn animated" data-wow-delay="0.4s"></iframe>
					</div>
					<h3  style="color: #003399"><strong> <?php echo $row[3]["chapter_name"] ?> </strong></h3>
					<p> <?php echo $row[3]["video_summary"] ?> </p>
				</div>
			</div>
		</div>
	</div>
</div>

<?php } ?>

<?php include 'footer.php';?>


<!--./ FOOTER SECTION END --> 
<!--  Jquery Core Script --> 
<script src="assets/js/jquery-1.10.2.js"></script> 
<!--  Core Bootstrap Script --> 
<script src="assets/js/bootstrap.js"></script> 
<!--  WOW Script --> 
<script src="assets/js/wow.min.js"></script> 
<!--  Scrolling Script --> 
<script src="assets/js/jquery.easing.min.js"></script> 
<!--  PrettyPhoto Script --> 
<script src="assets/js/jquery.prettyPhoto.js"></script> 
<!--  Custom Scripts --> 
<script src="assets/js/custom.js"></script>
</body>
</html>
