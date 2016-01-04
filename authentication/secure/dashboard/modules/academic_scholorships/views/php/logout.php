<?php
$response=array();
    $response["success"]=-1;
session_start();
if (!isset($_SESSION["session_name"])){
    header("Location:../index.php");
  exit();
}
else{
     $response["success"]=1;
    session_destroy();
//    unset($_COOKIE["user_id"]);
//    setcookie( "user_id", "", time()- 60, "/","", 0);
////    setcookie("user_id", "", time() - 3600);
}
echo json_encode($response);
?>
