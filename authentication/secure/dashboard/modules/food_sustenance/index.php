<?php
$response=array();
    $response["success"]=-1;
session_start();
if (!isset($_SESSION["session_name"])){
    header("Location:../index.php");
  exit();
}
else{
    // reaching from current directory to _user_info
    require_once __DIR__ . '/../../php/user_info.php';
    
    $user=new UserInfo();
    $pk="delta";
    $module="./food_sustenance";
    echo $user->module_users($pk,$module);
}
//echo json_encode($response);
?>
