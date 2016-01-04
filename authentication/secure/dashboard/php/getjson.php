
<?php

require_once __DIR__ . '/db_connect.php';
session_start();
$db= new DB_CONNECT();
$id=$_SESSION['session_name'];
    $db_c= $db->connect("userdata");
    $qry= $db_c->prepare("SELECT * from user_details where user_id= ?");
    // fist argument tells format of each parameter
    $qry->bind_param("s",$id);

 $qry->execute();
    $result=$qry->get_result();
    if(mysqli_num_rows($result) == 1){
        $response=array();
            $response['user_details']=array();
          //saving fullname session
        $row = mysqli_fetch_array($result);
//                $_SESSION['fullname'] = $row["firstname"];
                $response["user_details"]["firstname"]=$row["firstname"];
                $response["user_details"]["lastname"]=$row["lastname"];
                $response["user_details"]["username"]=$row["username"];
                $response["user_details"]["email"]=$row["email"];
        $js=json_encode($response);
//            $js=
            echo ($js);
    }
?>