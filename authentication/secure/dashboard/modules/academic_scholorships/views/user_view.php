<?php
require_once __DIR__ . '/../php/insert_data.php';
session_start();
if (!isset($_SESSION["session_name"])){
    
    header("Location:../index.php");
    
  exit();
}
if($_SESSION["is_school"]!=0 && $_SESSION["is_admin"]!=0){

     header("Location:../index.php");
}
?>

<link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="//unpkg.com/api-check@latest/dist/api-check.js"></script>
        <script src="js/angular.min.js"></script>
        
            <script src="js/ui-bootstrap.min.js"></script>
        <script src="js/ng-intl-tel-input.js"></script>
        <!-- This is the current state of master for formly core. -->
        <script src="//unpkg.com/angular-formly@latest/dist/formly.js"></script>
        <!-- This is the current state of master for the bootstrap templates -->
        <script src="//unpkg.com/angular-formly-templates-bootstrap@latest/dist/angular-formly-templates-bootstrap.js"></script>
   <link href="../ui/css/bootstrap.css" rel="stylesheet">
    <link href="../ui/css/master-ui.css" rel="stylesheet">

    
    </head>

<style>
    
body{background: #f1f1f1;
        padding-top: 50px;}
        
  div{background: white;}

            
            .starter-template {
                padding: 40px 15px;
                text-align: center;
            }
      
  .p-head{
    
    font-size: 20px;
    font-style: bold;
    padding-top:10px;
    padding-left: 10px;
  }

    .req_div{border-width: 1px;
    border-color: black;
    border-style: solid;

        width:600px;
    }

    .flt{float: right; margin-right: 3px;}


    .my-panels{
        margin-top: 70px;
        margin-bottom: 5px;

        padding: 5px;
        border-width: 2px;
        border-color: #999999;
        border-style: solid;
        border-radius: 3px;

    }


    .inner-panel{
        margin-top: 5px;
        margin-bottom: 5px;
        padding: 3px;
        border-radius: 3px;
        border-width: 1px;
    border-color: black;
    border-style: solid;
display: block;
    width:99%;
    border-bottom-color: #178acc;
    
    }
    .panel-head{
        background: #449d44;
        color: white;
        height:50px;
      
        border-radius:  3px 3px 0px 0px;


    }

    #add_request{background: #449d44;}
     
        .pflt{margin-right: 10px;}
    .lll{background: #1995dc;
        color: white;}
</style>

<script src="jquery.js"></script>
<script>


function donate_req(token){

    var url = 'donation_view.php?token='+token;
  
    
    window.open(url);

    }

function maximize(o) {
$(o).css("display", "block");
}
function minimize(o) {
         
$(o).css("display", "none");
}

</script>

     <body ng-app="app" ng-controller="mainController as vm" ng-init="portalitems">
        <nav class="navbar navbar-fixed-top lll" role="navigation">
            <div class="container lll">
                <div class="navbar-header lll">
                    <button type="button" class="navbar-toggle lll" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a  class="navbar-brand lll" href="#">Web Project</a>
                </div>

                <div class="collapse navbar-collapse lll">
                    <ul class="nav navbar-nav">
                        <li class="active lll"><a class="lll" href="../index.php">Home</a></li>
                        <li><a class="lll" href="#about">About</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="lll" ng-click="logout()"><span class="glyphicon glyphicon-log-out lll"></span> Logout</a></li>
                    </ul>
                </div>
                <!--.nav-collapse -->
            </div>
        </nav>
  
    
           

            
            <script src="js/portal.js"></script>



<div id="add_request">
<input type="button" class='btn btn-success' value="Add Request" onclick="location.replace('add_request.php')" />
<input type="button" class='btn btn-success' value="View My Requests" onclick="location.replace('view_my_request.php')" />
<input type="button" class='btn btn-success' value="View My Donations" onclick="location.replace('view_my_donation.php')" />

</div>



<div id="all_request_box" class='container my-panels'>
<div class='panel-head'><p class='p-head'> All Requests</p></div>
   
 <?php   $insert=new InsertData();
    
    $sch_record = json_decode($insert-> get_requests("delta"),true);
   json_encode($sch_record);
   $records =$sch_record["result"];
  // print_r($school_record);
   

   foreach($records as $row){

  $kk= "req".$row['req_id'];
   echo"<div class='inner-panel container' ><div >
   $row[username] <input  type='button' class='flt btn btn-primary' value='Expand' onclick='maximize($kk)'/>
   </td><td><input  type='button' class='flt btn btn-primary' value='Minimize' onclick='minimize($kk)'/><p class='flt'>Request Date: $row[req_time]</p></div >
   <table id='$kk' class='table table-striped table-hover table-responsive table-condensed' style='display:none;'>";
 


	 
        echo "<tr>";
        echo"<td class='cells'> Username:</td><td>$row[username]</td>";
        echo"<td class='cells'></td><td></td>";
        echo "</tr>";

        echo "<tr>";
        echo"<td class='cells'> User Rating: </td><td>$row[rating]</td>";
        echo"<td class='cells'> </td><td></td>";
        echo "</tr>";

        if($row['req_status']==0){ $status = "Not Yet Approved";
        echo "<tr> <td class='danger'>Approval Status:</td><td>$status</td><td></td><td></td></tr>";}
        else{$status = "Approved by school";echo "<tr> <td class='success'>Approval Status:</td><td>$status</td><td></td><td></td></tr>";}
       
       
        echo "<tr>";
        echo"<td class='cells'>Name: </td><td>$row[full_name]</td>";
        echo"<td class='cells'> Father's Name: </td><td>$row[father_name]</td>";
        echo "</tr>";
        echo "<tr>";
        echo"<td class='cells'> Age: </td><td>$row[age]</td>";
        echo"<td class='cells'> Gender: </td><td>$row[gender]</td>";
        echo "</tr>";

 $sch_record1 = json_decode($insert->get_school_by_id("delta",$row["school_name"]),true);

  $name = $sch_record1['result'][0]['school_name'];
   $add= $sch_record1['result'][0]['school_address'];
    $con = $sch_record1['result'][0]['school_contact'];
     $email = $sch_record1['result'][0]['school_email'];
     $web  = $sch_record1['result'][0]['school_website'];
 
 

        echo "<tr>";
        echo"<td class='cells'> Course/Degree: </td><td>$row[course_degree]</td>";
        echo"<td class='cells'> school/Institute: </td><td>$name</td>";
        echo "</tr>";
 
        echo "<tr>";
        echo"<td class='cells'> School Address</td><td>$add</td>";
        echo"<td class='cells'> School Coontact: </td><td>$con</td>";
        echo "</tr>";
        echo "<tr>";
        echo"<td class='cells'> School Email: </td><td>$email</td>";
        echo"<td class='cells'> School Website: </td><td>$web</td>";
        echo "</tr>";
 



        echo "<tr>";
        echo"<td class='cells'> Approx Amount Required:</td><td>  $row[approx_amount]</td>";
        echo "</tr>";
        echo "<tr>";
        echo"<td class='cells'> Request: </td><td colspan='3'>$row[req_text]</td>";
        echo "</tr>";
        echo "<tr>";
        echo"<td class='cells'> Additional info:</td><td> $row[add_info]</td>";
        echo "</tr>";

        if($row['user_id']!=$_SESSION['session_name']){
        echo "<tr>";
        echo"<td class='cells'></td><td class='cells'></td><td class='cells'></td><td class='cells'> <input class='flt btn btn-primary' type='button' value='Donate' onclick='donate_req($row[req_id])'/></td>";
        echo "</tr>";

        }
       
   echo"</table></div>";
   }
       
    ?>


</div>
</body>