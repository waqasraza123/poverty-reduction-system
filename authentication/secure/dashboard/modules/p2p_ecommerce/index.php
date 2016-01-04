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
    
    $user=new UserInfo();
    //echo 
    $user->module_users("delta","./p2p_ecommerce");
}
//echo json_encode($response);
?>


<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title> </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 
   <link rel = "stylesheet" href ="css/style.css">
</head>

<body>

	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="index.php">Frendo</a>
	    </div>
	    <div>
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="index.php">Home</a></li>
	        <li><a href="#">My Account</a></li>
	        <li><a href="#">About Us</a></li>
	        <li><a href="sell.php">Submit Ad</a></li>
	        <li><a href="sell.php">Sponsored Ad</a></li>


	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	        <li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>


<div class = "container-fluid imgback" >
	<div class = "row">

	    <div class = "col-sm-6">
	    	<a href = "buy.php">
		    	<div class="buydiv" >

		    	</br></br></br>
				     <span  class = "slabtext" style="word-spacing: 0px; letter-spacing: 0px; font-size: 55.132px;">Buy Here
				     </span>
					</br>
				     	<span class="slabtext" style="color:#dd3333 ;word-spacing: 0px; letter-spacing: 0px; font-size: 55.132px;">Browse Around</span>
				     </br>
				     <span class="slabtext" style="word-spacing: 0px; letter-spacing: 0px; font-size: 55.132px;">Check it Now!</span>
		    	</div>
		    </a>	
	    </div>

	    <div class = "col-sm-6">
	    	<a href = "sell.php">
		    	<div class="selldiv">

				    <span class = "slabtext" style="word-spacing: 0px; letter-spacing: 0px; font-size: 55.132px;">Artist?</span>
					</br>
					<span class = "slabtext" style=" color:#dd3333; word-spacing: 0px; letter-spacing: 0px; font-size: 40px;">This is Your Shop</span>
					</br>
					<span class = "slabtext" style="word-spacing: 0px; letter-spacing: 0px; font-size: 48.132px;">Take a look</span>

					<span class="slabtext" style="word-spacing: 0px; letter-spacing: 0px; font-size: 60px;">SELL HERE</span>

		    	</div>
		    </a>
		</div>

	</div>

 </div>



</body>
</html>