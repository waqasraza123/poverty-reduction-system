<?php
$response["success"]=-1;
require_once  '/../../../php/db_connect.php';
 require_once __DIR__ . '/../php/insert_data.php';
	
//if(isset($_POST[0]['name']) && isset($_POST['long']) && isset($_POST['lati'])){
if (!empty($_GET))

{
	$id=$_GET['token'];
$insert=new InsertData();
    
      $sch_record = json_decode($insert->delete_request("delta",$id),true);






  echo json_encode($sch_record) ;
}
	
else {echo json_encode("No data received");}
?>
