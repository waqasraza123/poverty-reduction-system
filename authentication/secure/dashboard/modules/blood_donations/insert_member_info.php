<?php 
include("db.php"); 
$uname=$_POST['uname'];
$pass=$_POST['pass'];
$name=$_POST['name'];
$mob_num=$_POST['mob_num'];
$email=$_POST['email'];
$msg=$_POST['msg'];

 $usercheck = $uname;
 $sql = ("SELECT uname FROM member_reg WHERE uname ='".$usercheck."'");
 $result = $db_handle->query($sql);

if ($uname==""  or $pass=="" or $name=="" or $mob_num=="" or $email=="")
{
echo "All fields must be entered, hit back button and re-enter information";
}
elseif (mysqli_num_rows($result) > 0) {

 		die('Sorry, the username '.$_POST['uname'].' is already in use.');

	}

elseif($_POST['pass'] != $_POST['cpass']) {

 		die('Your passwords did not match. ');

 	}
else{

$sql="INSERT INTO member_reg (uname, pass,name,mob_num,e_mail,msg)
VALUES
('$uname','$pass','$name','$mob_num','$email','$msg')";
 mysqli_query($db_handle, $sql) or die(mysqli_error($db_handle));

  //echo "Your message has been received";
 header( 'Location: member_login.php' ) ;

 }
?>
