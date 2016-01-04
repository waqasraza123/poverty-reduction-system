<?php
$response=array();
    $response["success"]=-1;
session_start();
if (!isset($_SESSION["session_name"])){
    header("Location:../index.php");
  exit();
}
else{
  $fields = array(
//      set project_id acc to your folder_name
      //see modules/modules.json for you project_id
    'project_id' => './donations',
      'pk'=>'delta'
);

//$fields=json_encode($fields);
//$response2 = http_post_fields("http://localhost/registration/php/module_users.php", $fields);
//    echo json_decode($response2);
//   $r = new HttpRequest('http://localhost/registration/php/module_users.php', HttpRequest::METH_POST);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://localhost/registration/php/module_users.php');
//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$fields);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response2  = curl_exec($ch);
curl_close($ch);
    echo $response2;
}
//echo json_encode($response);
?>
