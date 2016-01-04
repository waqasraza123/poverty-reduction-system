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
    require_once __DIR__ . '/php/sch_user.php';
    
    $user=new UserInfo();
   // echo $user->module_users("delta","./academic_scholorships");
	$given_id = $_SESSION["session_name"];
    $sch_user=new SchUser();
    
    $sch_record = json_decode($sch_user->system_users("delta",$given_id),true);
    $sch_arr = $sch_record["result"][0];
    $_SESSION["sch_id"]=$sch_arr["sch_id"];
    $_SESSION["user_id"]=$sch_arr["user_id"];
    $_SESSION["rating"]=$sch_arr["rating"];
    $_SESSION["is_school"]=$sch_arr["is_school"];
    $_SESSION["is_admin"]=$sch_arr["is_admin"];
    //print_r ($sch_arr);
    
    if($sch_arr['is_admin']==1){
          header("Location:../academic_scholorships/views/admin_view.php");
        
    }
    elseif ($sch_arr['is_school']==1)
    {
          header("Location:../academic_scholorships/views/school_view.php");
    }
    else{
        
          header("Location:../academic_scholorships/views/user_view.php");
    }
    
    
    
}
//echo json_encode($response);
?>
