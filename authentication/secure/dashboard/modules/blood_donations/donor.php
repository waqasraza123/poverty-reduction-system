<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Blood Donation System | Donor Profile</title>
<link href="Style.css" rel="stylesheet" type="text/css" />
</head>
<?php
 

include("db.php"); 
/*if (!isset($_SESSION)) {
  session_start();
}
 
//rest of your php scripts can go here
 
if (isset($_SESSION['user'])){
	$user = $_SESSION['user'];

}
*/

if (isset($_POST['donor-login']) || isset($_COOKIE['uname'])){

	if(isset($_POST['uname']) && isset($_POST['pass'])){
		setcookie('uname', $_POST['uname']);
	setcookie('pass', $_POST['pass']);
	}
	
	if(!empty($_POST['uname'])){
		$uname=$_POST['uname'];
	}
	else{
		$uname = isset($_COOKIE['uname']) ? $_COOKIE['uname'] : "";
	}
	

	if(!empty($_POST['pass'])){
		$pass=$_POST['pass'];
	}
	else{
		$pass = isset($_COOKIE['pass']) ? $_COOKIE['pass'] : "";
	}


	$query_Recordset1 = "SELECT * FROM donor_reg WHERE uname='".$uname."'";
	$Recordset1 = mysqli_query($db_handle,$query_Recordset1); 

//or die(mysql_error());
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);
//echo the name
//echo $row_Recordset1['name']; 


if ($uname==""  or $pass=="")
{
echo "All fields must be entered, hit back button and re-enter information";
}
else
{
$sql="SELECT * FROM donor_reg WHERE uname='".$uname."' and pass='".$pass."'";
 $result=mysqli_query($db_handle,$sql);
$count=mysqli_num_rows($result);
}
if($count==1){}

else
{

//header('location: donor_login.php');
}

?>
<body>
<div class="header">
<div class="menu"> <div class="top">&nbsp;&nbsp;<a href="index.php">Home</a> &gt; Donor Profile</div>
  <br /><br />
  <h1 class="h" align="right">Blood Donation System&nbsp;&nbsp;</h1>
<br />
                        <div id="tabsE">
                          <ul>
                                        <!-- CSS Tabs -->
<li><a href="donor.php"><span>Profile</span></a></li>
<li><a href="blood_facts.php"><span>Blood Facts</span></a></li>
<li><a href="blood_tips.php"><span>Precautions & Tips</span></a></li>
<li><a href="donor_vw_req.php"><span>View Requests</span></a></li>
<li><a href="don_response.php"><span>Response</span></a></li>
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
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><div id="apDiv1">
<form id="form1" name="form1" method="post" action="">
  <table class="tbl_form" width="461" height="401">
    <tr>      </tr>
    <tr>
      <td colspan="3" class="cptn">
	  <?php 
	  while($row=mysqli_fetch_array($result))
	  {
	  echo ' Hai,  &nbsp;&nbsp;'.$row['name'] ;
	
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
      <td class="field">Age</td>
      <td class="field">:</td>
      <td class="data">&nbsp;&nbsp;        <?php
	   echo ''.$row['age'] ;  
	  
	  ?></td>
    </tr>
    <tr>
      <td class="field">Gender</td>
      <td class="field">:</td>
      <td class="data">&nbsp;&nbsp;        <?php
	   echo ''.$row['gender'] ;  
	  
	  ?></td>
    </tr>
    <tr>
      <td class="field">Date of Birth</td>
      <td class="field">:</td>
      <td class="data">&nbsp;&nbsp;        <?php
	   echo ''.$row['dob'] ;  
	  
	  ?></td>
    </tr>
    <tr>
      <td class="field">Weight</td>
      <td class="field">:</td>
      <td class="data">&nbsp;&nbsp;        <?php
	   echo ''.$row['weight'] ;  
	  
	  ?></td>
    </tr>
    <tr>
      <td class="field">Blood Group</td>
      <td class="field">:</td>
      <td class="data">&nbsp;&nbsp;
        <?php
	   echo ''.$row['b_gp'] ;  
	  
	  ?>
        &nbsp;</td>
    </tr>
    <tr>
      <td class="field">Last Donated Date</td>
      <td class="field">:</td>
      <td class="data">&nbsp;&nbsp;        <?php
	   echo ''.$row['ldd'] ;  
	  
	  ?></td>
    </tr>
    <tr>
      <td class="field">&nbsp;</td>
      <td class="field">&nbsp;</td>
      <td class="data">&nbsp;</td>
    </tr>
    <tr>
      <td class="field">State</td>
      <td class="field">:</td>
      <td class="data">&nbsp;&nbsp;        <?php
	   echo ''.$row['state'] ;  
	  
	  ?></td>
    </tr>
    <tr>
      <td class="field">City</td>
      <td class="field">:</td>
      <td class="data">&nbsp;&nbsp;        <?php
	   echo ''.$row['city'] ;  
	  
	  ?></td>
    </tr>
    <tr>
      <td class="field">Pin Code</td>
      <td class="field">:</td>
      <td class="data">&nbsp;&nbsp;        <?php
	   echo ''.$row['pin_code'] ;  
	  
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
	  }}
	  ?>      </td>
    </tr>
    <tr>
      <td class="field">&nbsp;</td>
      <td class="field">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>    </tr>
    <tr>
      
      </tr>
   
  </table>
  </form>
</div>
</div>
<div class="bottom" align="center">© Copyright 2015. All rights are Reserved.</div>

</body>
</html>
