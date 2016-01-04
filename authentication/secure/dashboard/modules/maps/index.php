<?php
$response=array();
    $response["success"]=-1;
session_start();
if (!isset($_SESSION["session_name"])){
    header("Location:../index.php");
  exit();
}
else if(!isset($_SESSION["admin"])){
   header("Location:./switcher.php");
  exit();
}
//echo json_encode($response);
?>


<!DOCTYPE html>
<htmL>
<head>
<meta charset="utf-8">
<title>Dashboard/Maps Switcher</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/master-ui.css" rel="stylesheet">
    
    </head>

    <body align="center">
        <nav class="navbar navbar-default">
				  <div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					  <a class="navbar-brand" href="#">ePloyment</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					  <ul class="nav navbar-nav">
						<li class="active"><a href="../">Home<span class="sr-only">(current)</span></a></li>
						<li><a href="#">About</a></li>
					
					  </ul>
					  <ul class="nav navbar-nav navbar-right">
						<li><a href="#">Link</a></li>
						<li class="dropdown">
						  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
						
						</li>
					  </ul>
					</div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>
        
        <a href="./switcher.php" class="myButton" style="margin-top:100px;">Maps </a>
        <br>
        <br>
        <a href="./admin.php" class="myButton">View Admin Panel</a>
        
        <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    
    </body>

</htmL>