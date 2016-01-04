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
    $json = $user->module_user_id("delta","./school_management",$_SESSION["session_name"]);
    //echo $json;
	
	//var_dump(json_decode($json,true));
	//echo "<script>console.log(".$json.")</script>";
	
	$userInfo = json_decode($json,true);
	$myUserName = $userInfo['result'][0]['username'];
	$myUserType = $userInfo['result'][0]['user_role'];
	//$userInfo['result'][6]['user_info'];
    //echo $json['result'][6]['user_role'];

}
//echo json_encode($response);
?>


<style>
<?php include 'css/master-ui.css'; ?>
</style>

<?php include '_header.html'; ?>

<?php
require("conection/connect.php");



if(isset($myUserName) && isset($myUserType)){
	
	$sql=mysql_query("SELECT * FROM users_tbl WHERE username='$myUserName' AND type='$myUserType' AND approved='1'");
	//echo $myUserName." AND ".$myUserType;
	 
	if($sql){
								
			$cout=mysql_num_rows($sql);
			if($cout>0){
				$row=mysql_fetch_array($sql);
				
					if($row['type']=='admin') {
                        header("location: admin.php");	
						}
                
					else if($row['type']=='student') {
                        header("location: student.php");	
						}
                
					else if($row['type']=='teacher') {
                        header("location: teacher.php");	
						}
                                
					else {
						echo "<div style='width: 500px; margin-top: 100px; margin-left: 350px;''>" 
										."<div class='alert alert-danger col-lg-12'>"
										."<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
										."</button>"
										."<strong>Your Request Has been sent to admin. Please wait for approval!</strong>"
										."</div>"
										."</div>";
				}				
			}else{
				$sql = mysql_query("INSERT INTO users_tbl(username,type) VALUES('$myUserName','$myUserType');");
				
				echo "<div style='width: 500px; margin-top: 100px; margin-left: 350px;''>" 
										."<div class='alert alert-danger col-lg-12'>"
										."<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
										."</button>"
										."<strong>Your Request Has been sent to admin. Please wait for approval!</strong>"
										."</div>"
										."</div>";
			}
		}
			else{
			
				mysql_query("INSERT INTO users_tbl(username,type) VALUES('$myUserName','$myUserType';");
				
				echo "<div style='width: 500px; margin-top: 100px; margin-left: 350px;''>" 
										."<div class='alert alert-danger col-lg-12'>"
										."<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
										."</button>"
										."<strong>Your Request Has been sent to admin. Please wait for approval!</strong>"
										."</div>"
										."</div>";
			}
							
}


?>

<?php include '_footer.html'; ?>