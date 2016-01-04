<?php
session_start();
if (!isset($_SESSION["session_name"])){
    
    header("Location:./index.php");
    exit();   
} 

?>
    <!DOCTYPE html>
    <html lang="">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Project</title>
        <link rel="shortcut icon" href="">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/master-ui.css">
        <!--    <link rel="stylesheet" href="css/bootstrap-theme.min.css">-->
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/signin.css">
        <link rel="stylesheet" href="css/hover.css">
        <script src="//npmcdn.com/api-check@latest/dist/api-check.js"></script>
        <script src="js/angular.min.js"></script>
        <script src="js/file_upload.js"></script>
        
        <script src="js/ui-bootstrap.min.js"></script>
        <script src="js/ng-intl-tel-input.js"></script>
        <script src="js/ng-flow-standalone.min.js"></script>
        <!-- This is the current state of master for formly core. -->
        <script src="//npmcdn.com/angular-formly@latest/dist/formly.js"></script>
        <!-- This is the current state of master for the bootstrap templates -->
        <script src="//npmcdn.com/angular-formly-templates-bootstrap@latest/dist/angular-formly-templates-bootstrap.js"></script>

        <style>
            body {
                padding-top: 50px;
            }
        </style>

        <!--[if IE]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>

    <body ng-app="app" ng-controller="mainController as vm" ng-init="portalitems">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Web Project</a>
                </div>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="about.php">About</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a ng-click="logout()"><span style="font-weight: bolder;">{{usernamef}}</span><span style="margin-left:8px;"></span><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    </ul>
                </div>
                <!--.nav-collapse -->
            </div>
        </nav>
        <div class="container">
            <div class="row">

            </div>
        </div>
        <div class="container ">
            <div class="row">
                <div class="row  top-margin ">
                    <?php
    $str = file_get_contents('./modules/modules.json');
    $str =json_decode($str);
//    $str["success"]=1;
    $str=$str->projectlist;
    $rw= count($str);
    $rwc=ceil($rw/2);             
//    echo json_encode($str);
//        echo ''
                     $cnt=0;
            for ($i=0;$i<$rw;$i++){
                echo "<div class='col-md-6 col-xs-12' >
                    
                     <div class='  text-center hvr-underline-from-center jumbotron module-txt hover-pointer' ng-click='register(\"".$str[$i]->url."\",\"".$str[$i]->name."\")'>".$str[$i]->name."</div>
                     </div>";
                if ($cnt==3){
                    $cnt=0;
                    echo '<div><div class="row  top-margin ">';
                }
            }
             echo "<div>";        
?>
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