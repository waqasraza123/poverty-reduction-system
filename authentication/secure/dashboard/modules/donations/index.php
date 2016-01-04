<?php
$response=array();
    $response["success"]=-1;
session_start();
if (!isset($_SESSION["session_name"]) || $_SESSION["session_name"] ==""){
    header("Location:../index.php");
  exit();
}
else{
    // reaching from current directory to _user_info
    require_once __DIR__ . '/../../php/user_info.php';
    $user=new UserInfo();
    $user_data_values =  $user->module_user_id("delta","./donations",$_SESSION["session_name"]);

    //echo $user_data_values;

    $zzzz = json_decode($user_data_values);
    //echo "\n" .


	$user_donor = $zzzz->result[0]->is_donor;;


		$_SESSION["user_first_name_"] = $zzzz->result[0]->firstname;
		$_SESSION["user_last_name_"] = $zzzz->result[0]->lastname;
		$_SESSION["user_email_"] = $zzzz->result[0]->email;
		
		if($user_donor == 1)
		{
			$_SESSION["user_type"] = "donor";
			echo "<script>window.location = 'donation_method.php'; </script>";
		}
		else if ($user_donor == 0)
		{
			$_SESSION["user_type"] = "acceptor";
			echo "<script>window.location = 'method.php'; </script>";
		}
		else if ($user_donor == 2)
		{
			$_SESSION["user_type"] = "admin";
			echo "<script>window.location = 'insert_monetary_help.php'; </script>";
		}

}
//echo json_encode($response);
?>
