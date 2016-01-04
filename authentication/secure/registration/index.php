<!DOCTYPE html>
<html lang="">
    <head>
            <!--META-->
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!--TITLE-->
            <title>Believe - Secure Signup</title>
            <link rel="icon" href="../../resources/images/favicon.png" type="image/png" />
            <!--CSS-->
            <link href="../../resources/css/reset.css" rel="stylesheet">
            <link href="../../resources/css/bootstrap.min.css" rel="stylesheet">
            <link href="../../resources/css/animate.css" rel="stylesheet">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
            <link href="../../resources/css/main.css" rel="stylesheet">
            <style>body{background: url('../../resources/images/secureBG.jpg') center center;}</style>
            <!--[if lt IE 9]>
            <script src="../../resources/js/html5shiv.min.js"></script>
            <script src="../../resources/js/respond.min.js"></script>
        <![endif]-->   
    </head>

    <body ng-app="app">
        <!--MAIN WRAPPER-->
        <div class="container" ng-controller="forms">
            <!--CONTENT-->
            <div class="row"> 
                <div class="col-md-6">
                    <div class="well animated jello" style="margin:5% auto">
                        <form id="register-form" class="form-horizontal" method="post" role="form" ng-show="true" ng-class="{fadeIn:signup,fadeOut:login}" ng-submit="submit_signup()">
                            <legend><i class="fa fa-user"></i> Register</legend>
                            <div class="row hidden" ng-show="attmsuccess" ng-class="{hidden:!attmsuccess}">
                                <div class="col-md-12">
                                    <div class="alert alert-success" style="display:none;">
                                        <strong>Success!</strong> {{result}}
                                    </div>
                                </div>
                            </div>

                            <div class="row hidden" ng-show="attmfailure" ng-class="{hidden:!attmfailure}">
                                <div class="col-md-12">
                                    <div class="alert alert-danger" style="display:none;">
                                        <strong>Failure!</strong> {{result}}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">    
                                <label class="col-lg-3 control-label">First Name</label>
                                <div class="col-lg-9">
                                    <input type="text" name="firstname" id="firstname" tabindex="1" class="form-control" placeholder="First Name" value="" ng-model="dsign.firstname" ng-trim="false" ng-change="dsign.firstname = dsign.firstname.split(' ').join('')"ng-required>
                                </div>    
                            </div>
                            <div class="form-group">    
                                <label class="col-lg-3 control-label">Last Name</label>
                                <div class="col-lg-9">
                                    <input type="text" name="lastname" id="lastname" tabindex="1" class="form-control" placeholder="Last Name" value="" ng-model="dsign.lastname" ng-trim="false" ng-change="dsign.lastname = dsign.lastname.split(' ').join('')" ng-required>
                                </div>
                            </div>
                            <div class="form-group">    
                                <label class="col-lg-3 control-label">Email</label>
                                <div class="col-lg-9">
                                    <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="" ng-model="dsign.email" ng-required>
                                </div>
                            </div>
                            <div class="form-group">    
                                <label class="col-lg-3 control-label">Username</label>
                                <div class="col-lg-9">
                                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="" ng-model="dsign.username" ng-trim="false" ng-change="dsign.username = dsign.username.split(' ').join('')"ng-required>
                                </div>
                            </div>
                            <div class="form-group">    
                                <label class="col-lg-3 control-label">Password</label>
                                <div class="col-lg-9">
                                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" ng-model="dsign.password" ng-change="dsign.password = dsign.password.split(' ').join('')" ng-required>
                                </div>
                            </div>


                            <div class="form-group">    
                                <label class="col-lg-3 control-label">Confirm Password</label>
                                <div class="col-lg-9">
                                    <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password" ng-model="dsign.password2" ng-change="dsign.password2 = dsign.password2.split(' ').join('');" ng-class="{'glowing-border-red':notpass}" ng-required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <button type="reset" class="btn btn-default">Clear</button>
                                        <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="panelb btn btn-success" value="Register Now">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>    
                </div>
            </div>
            <a href="../../" class="btn btn-primary pull-right" >&lt;&lt;&nbsp;Back to Homepage</a>
        </div> 

        <!--SCRIPTS-->
        <script src="js/angular.min.js"></script>
        <script src="js/ui-bootstrap.min.js"></script>
        <script src="js/signin.js"></script>
    </body>
</html>