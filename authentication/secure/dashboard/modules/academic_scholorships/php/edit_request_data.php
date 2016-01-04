<?php
$response["success"]=-1;
require_once  '/../../../php/db_connect.php';
 require_once __DIR__ . '/../php/insert_data.php';
  
//if(isset($_POST[0]['name']) && isset($_POST['long']) && isset($_POST['lati'])){
if (!empty($_POST))

{
$insert=new InsertData();
    $id = $_GET['token'];
      $sch_record = json_decode($insert->update_request("delta",$_POST,$id),true);






  echo json_encode($sch_record) ;
}
  
else {echo json_encode("No data received");}
  /*

    */
/*
else{
  $response["success"]=-2;
  echo json_encode($response);
}*/
?>
