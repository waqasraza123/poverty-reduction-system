<?php

    //starting session
    session_start();
if(isset($_SESSION['dashboard_login_username'])){
    
        echo("<script>window.location = '../dashboard'</script>");
}
    //success status
    if (!empty($_GET['msg'])) {

        if($_GET['msg']=="success")
            $msg = '<div class="alert alert-success">
                    <strong>Success!</strong> you have registered successfully!
                </div>';
        elseif($_GET['msg']=="bypass")  
            $msg = '<div class="alert alert-warning">
                    <strong>Warning!</strong> you need to login first!
                </div>';                
        elseif($_GET['msg']=="logout")  
            $msg = '<div class="alert alert-info">
                    <strong>Oh Snap!</strong> you have been logged out!
                </div>';             

    }
    else
        $msg = "";

    //including db file
    require '../../config/database.php';    

    //if form is submitted
    if(isset($_POST['authenticate'])){

        //getting data from from
        $username = $_POST['username'];
        $password = sha1($_POST['password']);

        //querying db
        $sql = "select * from user_details where username='$username' and password='$password'";
        $results = $conn->query($sql);
        $count = $results->num_rows;

        //authorizing login
        if($count>0){

            //saving username session
            $_SESSION['dashboard_login_username'] = $username;
            $response=array();
            $response['user_details']=array();
//        $info=array();
         

            while($row = $results->fetch_assoc()){ 

              
                
                
                //retieving user datass
                $_SESSION['name'] = $row["firstname"];
                $_SESSION['session_name'] = $row["user_id"];
                $response["user_details"]["firstname"]=$row["firstname"];
                $response["user_details"]["lastname"]=$row["lastname"];
                $response["user_details"]["username"]=$row["username"];
                $response["user_details"]["email"]=$row["email"];
                if($row["role"]==1)
                $_SESSION['admin'] = $row["role"];
            }
//            $js=json_encode($response);
////            $js=
//            echo ($js);
            //redirecting
//            echo("<script>localStorage.setItem('user_details',".$response['user_details'].")</script>");
            echo("<script>window.location = '../dashboard'</script>");

            //stopping php
            exit();

        }
        else{

            //setting status
            $msg = '<div class="alert alert-danger">
                    <strong>Error!</strong> your entered credentials are wrong!
                </div>';
            
        }       

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
        <title>Believe - Secure Login</title>
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
    <body>
        <!--MAIN WRAPPER-->
        <div class="container">
            <!--CONTENT-->
            <div class="row" style="margin:10% auto">
                <div class="col-md-6">
                    <div class="well animated jello">
                        <form class="form-horizontal" method="post">
                            <legend><i class="fa fa-lock"></i> Login</legend>
                            <?php echo $msg ?>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Email</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Username" name="username" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Password</label>
                                <div class="col-lg-10">
                                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                                    <br><a href="" class="pull-right thin">forgot your password?</a><br>             
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <button type="reset" class="btn btn-default">Clear</button>
                                    <button type="submit" class="btn btn-success" name="authenticate">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>    
                </div>
            </div>
            <a href="../../" class="btn btn-primary pull-right">&lt;&lt;&nbsp;Back to Homepage</a>
        </div>    
    </body>
</html>