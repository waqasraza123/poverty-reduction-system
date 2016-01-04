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
			#hide{
				display: none;
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
		  <div >
		  	<h2 style = "color:#666699">Submit your Item</h2>
		  </div>
		  <form action = "addexec.php" method = "post" enctype = "multipart/form-data" name = "addroom" role="form">
		   
		  
		  	<div class="form-group has-success">
		      <label class="col-xs-2 control-label" for="title">Title</label>
		      <input style="width:60%" type="text" class="form-control" name ="title" id="title" >
		    </div>


		   <div class="form-group has-success">
		      <label class="col-xs-2 control-label" for="price">Price</label>
		      <input style="width:60%" type="text" class="form-control" name ="price" id="price" >
		    </div>

		    

		    <div class = "form-group has-success">
				 <label class="col-xs-2 control-label" for="caption">Description</label>
				  <input style = "width:60%" name="caption" type="text" class = "form-control"  id="caption" >

			  </div>

		    <div class="form-group has-success">
		     
		    	 <label class="col-xs-2 control-label" for="image">Upload Photos</label>

		    	<div class ="row">

					<div style="margin-left:30px;background:url(./img/add.jpg);background-repeat:no-repeat; width :50px;height:50px" class = "col-sm-3">
						<input style="width:60%" type = "file" class = "form-control imghide" id = "image" name = "image" >
					</div>

		    	</div>

		    </div>

			  

		    <div class="form-group has-success">
		      
		       <label class="col-xs-2 control-label" for="fullname">Name</label>
		      <input style="width:60%" type="text" class="form-control" id="fullname" name="fullname"   >
		    </div>

		     <div class="form-group has-success">
		      <label class="col-xs-2 control-label" for="cell"> Cell No.</label>
		      <input  style="width:60%" type="text" class="form-control" id="cell" name="cell" >
		    </div>

		    <div class ="form-group has-success" >
		    	<label class="col-xs-2 control-label" for="cell"> Ad Type</label>

			<select name = "sponsor" id = "sponsor" class = "form-control" style = "width:60%">
			  <option value="0">Not Sponsored</option>
			  <option value="1">Sponsored</option>
			</select>
		    
		    </div>


		    <div style = "margin-left:40px;margin-top:40px" class = "form-group has-success" >
		    	<button class="col-xs-2 control-label" style = "background-color:#dd3333;color:white" type="submit" name  = "submit" value = "upload" id="submit" class="btn btn-default">Submit</button>
		  	</div>
		  </form>
	</div>


	</body>
</html>