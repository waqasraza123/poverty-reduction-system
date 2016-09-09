<?php

    //starting session
    session_start();

    //checking if user is signed in or not
    if(!isset($_SESSION['dashboard_login_username'])){

        //redirecting
        echo("<script>window.location = '../login?msg=bypass'</script>");

        //stopping php
        exit();

    }

    //getting fullname
    $name = $_SESSION['name'];
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!--META-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--TITLE-->
        <title>Believe - Dashboard</title>
        <link rel="icon" href="../../resources/images/favicon.png" type="image/png" />
        <!--CSS-->
        <link href="../../resources/css/reset.css" rel="stylesheet">
        <link href="../../resources/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../resources/css/animate.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href="../../resources/css/main.css" rel="stylesheet">
        <style>body{background: url('../../resources/images/dashboardBG.png') center center;}</style>
        <!--SCRIPTS--> 
        <script src="//unpkg.com/api-check@latest/dist/api-check.js"></script>
        <script src="js/angular.min.js"></script>
        <script src="js/file_upload.js"></script>
        
            <script src="js/ui-bootstrap.min.js"></script>
        <script src="js/ng-intl-tel-input.js"></script>
        <script src="js/ng-flow-standalone.min.js"></script>
        <!-- This is the current state of master for formly core. -->
        <script src="//unpkg.com/angular-formly@latest/dist/formly.js"></script>
        <!-- This is the current state of master for the bootstrap templates -->
        <script src="//unpkg.com/angular-formly-templates-bootstrap@latest/dist/angular-formly-templates-bootstrap.js"></script>

        <!--[if lt IE 9]>
            <script src="../../resources/js/html5shiv.min.js"></script>
            <script src="../../resources/js/respond.min.js"></script>
        <![endif]--> 
    </head>
    <body ng-app="app" ng-controller="mainController as vm" ng-init="portalitems">
        <!--NAVBAR-->
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="../" class="navbar-brand">believe<span class="green">.</span></a>
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse" id="navbar-main">
                    <ul class="nav navbar-nav navbar-right" style="margin-top:10px;">
                        <li><a href="logout.php"><i class="fa fa-power-off"></i> Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--MAIN WRAPPER-->
        <div class="container" style="margin:10% auto;">
            <h3>Welcome <?php echo $name; ?>!</h3>
            <p>choose the method by which you would like to help the community.</p>
            <br>
            <!--ROW 1-->            
            <div class="row">
                <div class="card col-md-2 animated bounceInDown" ng-click="register('./problem_sharing','Problem Sharing')">
                    <h1><i class="fa fa-users"></i></h1>
                    <br>
                    <h5>Problem Sharing</h5>
                </div>
                <div class="card col-md-2 animated bounceInDown" ng-click="register('./donations','Donations')">
                    <h1><i class="fa fa-dollar"></i></h1>
                    <br>
                    <h5>Donations</h5>
                </div>
                <div class="card col-md-2 animated bounceInDown" ng-click="register('./school_renovation','School Renovations')">
                    <h1><i class="fa fa-building"></i></h1>
                    <br>
                    <h5>School Renovations</h5>
                </div>
                <div class="card col-md-2 animated bounceInDown" ng-click="register('./drixel','Drixel')">
                    <h1><i class="fa fa-gift"></i></h1>
                    <br>
                    <h5>Drixel</h5>
                </div>
                <div class="card col-md-2 animated bounceInDown" ng-click="register('./d2quiz','Donation Through Quizzes')">
                    <h1><i class="fa fa-money"></i></h1>
                    <br>
                    <h5>Donation Through Quizzes</h5>
                </div>
            </div>
            <!--ROW 2-->            
            <div class="row">
                <div class="card col-md-2 animated bounceInDown" ng-click="register('./blood_donations','Blood Donationx')">
                    <h1><i class="fa fa-heartbeat"></i></h1>
                    <br>
                    <h5>Blood Donation</h5>
                </div>
                <div class="card col-md-2 animated bounceInDown" ng-click="register('./vizs','Person to Person Ecommerce')">
                    <h1><i class="fa fa-pie-chart"></i></h1>
                    <br>
                    <h5>Visualization</h5>
                </div>
                <div class="card col-md-2 animated bounceInDown" ng-click="register('./food_sustenance','Person to Person Ecommerce')">
                    <h1><i class="fa fa-beer"></i></h1>
                    <br>
                    <h5>Food Sustenence via Livestock &amp; Poultry</h5>
                </div>
                <div class="card col-md-2 animated bounceInDown" ng-click="register('./academic_scholorships','Person to Person Ecommerce')">
                    <h1><i class="fa fa-graduation-cap"></i></h1>
                    <br>
                    <h5>Academic Scholarship</h5>
                </div>
                <div class="card col-md-2 animated bounceInDown" ng-click="register('./p2p_ecommerce','Person to Person Ecommerce')">
                    <h1><i class="fa fa-shopping-basket"></i></h1>
                    <br>
                    <h5>Person to Person Ecommerce</h5>
                </div>
            </div>
            <!--ROW 3-->            
            <div class="row">
                <div class="card col-md-2 animated bounceInDown" ng-click="register('./school_management','School Management Systems')">
                    <h1><i class="fa fa-magic"></i></h1>
                    <br>
                    <h5>School Management System</h5>
                </div>
                <div class="card col-md-2 animated bounceInDown" ng-click="register('./ngos','NGO')">
                    <h1><i class="fa fa-life-saver"></i></h1>
                    <br>
                    <h5>NGO</h5>
                </div>
                <div class="card col-md-2 animated bounceInDown" ng-click="register('./maps','ePloyment')">
                    <h1><i class="fa fa-sitemap"></i></h1>
                    <br>
                    <h5>ePloyment</h5>
                </div>
            </div>
        </div>
         <script src="js/portal.js"></script>
            <script type="text/ng-template" id="myModalContent.html">
                <div class="modal-header" flow-prevent-drop>
                    <h3 class="modal-title">{{moduler}}- SignUp</h3>
                </div>
                <div class="modal-body">
                    <formly-form model="vm.formData.model" fields="vm.formData.fields" form="vm.form" options="vm.formData.options" enctype="multipart/form-data">
                    </formly-form>
                    <hr />
                    <span class="help-block error validMessage" ng-show="vm.serverer" >{{vm.regerror}}</span>
                    <div ng-if="vm.showData">
                        <h2>Model Value</h2>
                        <pre>{{vm.formData.model | json}}</pre>
                        <h2>Fields <small>(note, functions are not shown)</small></h2>
                        <pre>{{vm.originalFields | json}}</pre>
                        <h2>Form</h2>
                        <pre>{{vm.form | json}}</pre>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" ng-disabled="vm.form.$invalid" ng-click="vm.ok()">Register</button>
                    <button class="btn btn-warning" ng-click="vm.cancel()">Cancel</button>
                </div>
            </script>
            <script type="text/ng-template" id="fileupload.html">
                <div flow-init="{singleFile:true}" flow-file-added="!!{png:1,gif:1,jpg:1,jpeg:1}[$file.getExtension()]" class="ng-scope">
<div class="row">

<div  class="col-md-4">
  <span class="btn-xs btn-primary hover-pointer" ng-show="!$flow.files.length" flow-btn="">Select image<input type="file" style="visibility: hidden; position: absolute;"></span>
  <span class="btn-xs btn-info ng-hide hover-pointer" ng-show="$flow.files.length" flow-btn="">Change<input type="file" style="visibility: hidden; position: absolute;"></span>
  <span class="btn-xs btn-danger ng-hide hover-pointer" ng-show="$flow.files.length" ng-click="$flow.cancel()">
    Remove
  </span>
</div>
<div class="thumbnail col-md-8" ng-show="!$flow.files.length" >
<img src="./img/text.png" width="200" height="200" >
</div>
<div class="thumbnail ng-hide col-md-8" ng-show="$flow.files.length">
  <img flow-img="$flow.files[0]" class="thumbnail" >
</div>
</div>
<p>
  Only PNG,GIF,JPG,JEPG files allowed.
</p>
</div>
            </script>
    </body>
</html>