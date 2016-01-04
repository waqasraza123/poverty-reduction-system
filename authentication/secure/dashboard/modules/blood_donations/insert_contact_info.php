<?php 

include("db.php"); 

$nam=$_POST['nam'];
$mob=$_POST['mob'];
$email=$_POST['email'];
$msg=$_POST['msg'];

$sql="INSERT INTO contact (name, mob_num, e_mail,message)
VALUES
('$nam','$mob','$email','$msg')";
 mysqli_query($db_handle,$sql);
$s= "Your message has been received";
 header( 'Location: index.php' ) ;
?>