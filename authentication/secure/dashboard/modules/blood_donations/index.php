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
    $tt= $user->module_user_id("delta","./blood_donations",$_SESSION["session_name"]);
//    echo $tt;
    if ($tt['result']["role"]==1){
        header("Location:./member.php");
  exit();
    }
    else if($tt['result']["role"]==0){
        header("Location:./donor_registration.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Blood Donation System</title>
<link href="Style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="header">
<div class="menu"> 
<div class="top"></div>
<br /><br /><br />
<div class="baner">Blood Donation System</div>
<br /><br /><br />
                        <div id="tabsE">
                                <ul>
                                        <!-- CSS Tabs -->
<li><a href="index.php"><span>Home</span></a></li>
<li><a href="blood_facts.php"><span>Blood Facts</span></a></li>
<li><a href="blood_tips.php"><span>Precautions & Tips</span></a></li>
<li><a href="member_registration.php"><span>Member Registration</span></a></li>
<li><a href="donor_registration.php"><span>Donor Registration</span></a></li>
<li><a href="contact_us.php"><span>Contact Us</span></a></li>

                                </ul>
    </div>
  </div>
</div>
<div class="content">
<br /><br />
<div class="link">Quik Links<br />
  <div class="links">
  <ul>
  <li><a href="#"><span>About Us</span></a><br />
    <br />
  </li>
<li><a href="#"><span>Tips</span></a><br />
  <br />
</li>
<li><a href="#"><span>Eligibility<br />
  <br />
</span></a></li>
<li><a href="contact_us.php"><span>Contact Us</span></a><br />
</li>
</ul>
  <p>&nbsp;</p>
  </div>
</div>
<br /><br /><br /><br /><br /><br /><div id="apDiv1">
  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data mining can be used to find blood donors. This  technique can also be used to find the availability of blood donor without any other contacts. We can also give  request for the particular blood groups. Not only the availability of blood  donors but also the details about blood storage, supply and demands can  be found<br />
    One important feature is the availability of location  based blood bank details and extraction of location based donor’s details which is very helpful to the acceptant. All the time the  network facility cannot be used. This time donor request does not  reachat proper time. This can be avoided by adding some message  sending procedures. This will help to find the proper blood donor in time. And provides availability of blood in need<br />
    Data mining algorithm helps to identifying groups of records that are  similar among themselves but different from the rest of the data. In our  case some of these data is useful for identifying the proper  blood donors according to the request and location based clustering of data.</p>
</div>
<br /><br /><br /><br /><br />
</div>
<div id="apDiv2">
  <div class="log"><br />
    <br />
    <div class="loglinks"><a href="admin_login.php">&nbsp;&nbsp;Admin Login</a></div>
    <div class="loglinks"><a href="member_login.php">&nbsp;&nbsp;Member Login</a></div>
    <div class="loglinks"><a href="donor_login.php">&nbsp;&nbsp;Donor Login</a></div>
  </div>
</div>
<div class="bottom" align="center">© Copyright 2015. All rights are Reserved.</div>

</body>
</html>
