<html>
	<head>
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	    
	    <title> </title>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 
	   <link rel = "stylesheet" href ="css/style.css">
	<style>
	
	.image{
		margin-top:50px;margin-left: 15px;
		 width:500px;height:550px;
		 border: 4px solid rgb(25, 50, 70);
	}
	.element{
		color:rgb(152,150,154);
		margin-left: 20%;
		font-size: 25px;
	}
	</style>


	</head>
<body>

<nav class="navbar navbar-inverse">
	  

	    <div class="navbar-header">
	      <a class="navbar-brand" href="../index.php">Frendo</a>
	    </div>
	    <div>
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="../index.php">Home</a></li>
	        <li><a href="#">My Account</a></li>
	        <li><a href="#">About Us</a></li>
	        <li><a href="../sell.php">Submit Ad</a></li>
	        <!--<li><a href="sponsor_ad.php">Sponsored Ad</a></li>  -->

	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	      </ul>
	   </div>

	<div style = "min-height:100%;height:100%"class="container-fluid">
	
			<div class = "row imgback">

				<?php
			include('config.php');
			$id = $_GET['id'];
			$result = mysql_query("SELECT * FROM photos where id = ".$id);
			while($row = mysql_fetch_array($result))
			{?>
				
					<div class ="col-sm-6 figure">
						<p><img class = "image" src="../<?php echo $row['location'] ?>"></p>
					</div>

					<div style = "padding-left:0px !important;padding-top: 60px"class = "col-sm-6" >
						<p class = "element" id="title">Item Title:&nbsp&nbsp&nbsp  	<?php echo $row['title'] ?></p>
						
						<p class = "element" id="fullname">Seller Name: &nbsp&nbsp&nbsp 		<?php echo $row['fullname'] ?></p>
						<p class = "element" id="cell">Phone No. &nbsp&nbsp&nbsp  	<?php echo $row['cell'] ?></p>
						<p class = "element" id="price">Price:  &nbsp&nbsp&nbsp 		<?php echo $row['price'] ?></p>
						<p class = "element" id="caption">Description:&nbsp&nbsp&nbsp    <?php echo $row['caption'] ?></p>
					</div>
			<?php
			} 
			?>




			</div>


		</div>


</body>
</html>