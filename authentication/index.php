<?php

session_start();
if(isset($_SESSION['dashboard_login_username'])){
    
        echo("<script>window.location = './secure/dashboard'</script>");
}
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <!--META-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--TITLE-->
        <title>Believe - Join Hands to Alleviate Poverty</title>
        <link rel="icon" href="resources/images/favicon.png" type="image/png" />
        <!--CSS-->
        <link href="resources/css/reset.css" rel="stylesheet">
        <link href="resources/css/bootstrap.min.css" rel="stylesheet">
        <link href="resources/css/animate.css" rel="stylesheet">
        <link href="resources/css/main.css" rel="stylesheet">
        <style>body{background: url('resources/images/bg.jpg');}</style>
        <!--[if lt IE 9]>
    	    <script src="resources/js/html5shiv.min.js"></script>
            <script src="resources/js/respond.min.js"></script>
        <![endif]--> 
    </head>  
    <body>
        <!--MAIN WRAPPER-->
        <div class="container">
            <!--HEADER-->
            <header class="row">              
                <div class="col-md-offset-8 col-md-4">
                    <div class="pull-right">
                        <a class="btn btn-default" href="secure/login">Login</a>
                        <a class="btn btn-success" href="secure/registration">Create Account</a>
                    </div>
                </div>
            </header>
            <!--CONTENT-->
            <div class="content">
                <div class="row">
                    <div class="col-md-2">
                        <img src="resources/images/logo.png" alt="Join Hands to Alleviate Poverty">
                    </div>
                    <div class="col-md-10">
                        <h1>believe<span class="green">.</span></h1>
                        <p>We believe in the fact that there is a light that never goes out. Therefore we welcome you to join hand with us in our fight to alleviete poverty!</p>
                        <br>
                        <a href="mailto:mubbashir10@gmail.com">Get in Touch With Us</a>
                        <br>
                    </div>
                </div>    
            </div>
            <!--FOOTER-->
            <footer>
                <span class="copyright grey pull-right">copyright &copy; 2016 - All Rights Reserved</span>
                <br>
            </footer>
        </div>    
    </body>
</html>