<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Blood Donation Forum | Member Profile</title>
<link href="Style.css" rel="stylesheet" type="text/css" />

<SCRIPT type="text/javascript">
    window.history.forward();
    function noBack() { window.history.forward(); }
</SCRIPT>
</HEAD>
<BODY onload="noBack();"
    onpageshow="if (event.persisted) noBack();" onunload="">


<?php
include("db.php"); 



if (isset($_POST['uname']))
{
	$uname=$_POST['uname'];
	setcookie('uname', $uname);
}

if (isset($_POST['pass'])){$pass=$_POST['pass'];setcookie('pass', $pass);}

if ((isset($_POST["uname"]) && isset ($_POST["pass"]) ) || isset($_COOKIE['pass'])){
	$uname = $_COOKIE['uname'];
	$pass = $_COOKIE['pass'];
if ($uname==""  or $pass=="")

{
echo "All fields must be entered, hit back button and re-enter information";
}
else
{
$sql="SELECT * FROM member_reg WHERE uname='".$uname."' and pass='".$pass."'";
 $result=mysqli_query($db_handle,$sql);
$count=mysqli_num_rows($result);
if($count==1){}

else
{

header('location: member_login.php');

}
}
}
?>

<div class="header">
<div class="menu"> <div class="top">&nbsp;&nbsp;<a href="../index.php">Home</a> &gt; Member Profile</div>
<br /><br /><br /><br /><br /><br />
                        <div id="tabsE">
                                <ul>
                                        <!-- CSS Tabs -->
<li><a href="#"><span>Profile</span></a></li>
<li><a href="blood_facts.php"><span>Blood Facts</span></a></li>
<li><a href="blood_tips.php"><span>Precautions & Tips</span></a></li>
<li><a href="member_search.php"><span>Search Donor</span></a></li>
<li><a href="request_blood.php"><span>Request Blood</span></a></li>

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
<li><a href="#"><span>Contact Us</span></a><br />
</li>
</ul>
  <p>&nbsp;</p>
  </div>
</div>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<div id="apDiv1">
<form id="form1" name="form1" method="post" action="">
  <table class="tbl_form" width="461" height="160">
    <tr>      </tr>
    <tr>
      <td colspan="3" class="cptn">
	  <?php 

	//if (isset($result))
		
	
	  while($row=mysqli_fetch_array($result))
	  {
	  echo ' Hi,  &nbsp;&nbsp;'.$row['name'] ;
	
	  ?>      </td>
      </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
      </tr>
    <tr>
      <td class="field" width="200">Name</td>
      <td class="field" width="5">:</td>
      <td class="data">&nbsp;&nbsp;        <?php
	   echo ''.$row['name'] ;  
	  
	  ?></td>
    </tr>
    
    <tr>
      <td class="field">Mobile Number</td>
      <td class="field">:</td>
      <td class="data">&nbsp;&nbsp;        <?php
	   echo ''.$row['mob_num'] ;  
	  
	  ?></td>
    </tr>
    <tr>
      <td class="field">E-mail ID</td>
      <td class="field">:</td>
      <td class="data">&nbsp;&nbsp;        <?php
	   echo ''.$row['e_mail'] ;  
	  }
	
	  ?>      </td>
    </tr>
    <tr>
      <td class="field">&nbsp;</td>
      <td class="field">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>    </tr>
    <tr>      </tr>
  </table>
  </form>
</div>
</div>
<div class="bottom" align="center">© Copyright 2015. All rights are Reserved.</div>

</body>
</html>