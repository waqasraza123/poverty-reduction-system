<html>
	<head>
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	    
	    <title> </title>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 
	   <link rel = "stylesheet" href ="css/style.css">

		<style type="text/css">
			<!--
			
			.imghide{
				opacity: 0;
				z-index:10;
			}

			-->
			.btn{
				margin-left: 20px;
				margin-top: 20px;
				color:green;
				background-color: white;

			}
		</style>
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
		        <li><a href="sponsor_ad.php">Sponsored Ad</a></li>

		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
		        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		      </ul>
		    </div>
		  </div>
		</nav>

	 	<div class="container">
		  
		  <form action = "addexec.php" method = "post" enctype = "multipart/form-data" name = "addroom" role="form">
		  
		  <h2 style = "color:red"> Sponsor your Ad for $1 Only</h2>
		  <h3 style = "color:red">Click below to pay online</h3>
			  

		   <a href = "payment.php"><button class = "btn" type="button" >Pay by Card</button></a>




		    
		  </form>
	</div>


	</body>
</html>