<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Donate What You Want</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
	<link href="css/master-ui.css" rel="stylesheet">
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

  </head>
  <body >

		<!-- Navigation Bar Code-->
		<nav class="navbar navbar-default navbar-fixed-top" >
			<div style="margin-right:20px; margin-left:20px">
			
				<Button type=”button”  class="navbar-toggle"
				data-toggle = "collapse"
				data-target= ".navbar-collapse">
				<span class="sr-only">		Toggle navigation	</span>
				<span class="icon-bar">		</span>	
				<span class="icon-bar">		</span>	
				<span class="icon-bar">		</span>	

				</button>

				<a href="#" class="navbar-brand">  <b> Donate What You Want </b>  </a>
				
				<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
				
					<!--<li class="active">  <a href="#" class="header_A">	Donate </a> </li>-->
					<li  id="metirial_donation"> 	<a href="items_available.php" class="header_A">	Metirial Donations </a>	</li>
					<li id="insert_monetary_help"> 	<a href="insert_monetary_help.php" class="header_A">	Get Money Donation</a>	</li>
					<li id="acceptor_reserved_items"> 	<a href="acceptor_reserved_items.php" class="header_A" > Reserved Items </a>	</li>
					<li id="method"> 	<a href="method.php" class="header_A" >	Method </a>	</li>
					<li id="store_contact"> 	<a href="store_contact.php" class="header_A" >	Contact Us </a>	</li>
					<li id="user_name_display"> 	
						<a class="header_A"  style="color:#58ACFA">
							<?php 
								if (isset($_SESSION["user_first_name_"]) && isset($_SESSION["user_last_name_"])) {
								# code...
								echo '<b>'.$_SESSION["user_first_name_"]." ".$_SESSION["user_last_name_"].'</b>';
							} ?>	
						</a>
					</li>
					<li > 	
							<a href="../../php/logout.php" class="header_A">	Logout
							<span class="glyphicon glyphicon-log-out"> </span> 
						</a>
					</li>	
					<input type="text" value=<?php echo $_SESSION["user_type"]?> id="user_type_input" style="display:none">
				</ul>
				</div>
			</div>
		</nav>
		

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>