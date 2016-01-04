<?php
	$msg="";
	$opr="";
	if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	if($opr=="del")
{
	$del_sql=mysql_query("DELETE FROM expenses WHERE exp_id=$id");
	if($del_sql) {
            echo "<div>"
                . "<div class='alert alert-success col-md-6 col-md-offset-3'>"
                . "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
                . "</button>"
                . "<strong>Sucess!</strong> Record Deleted"
                . "</div>"
                . "</div>";
        }
	else
		$msg="Could not Delete :".mysql_error();	
			
}
	echo $msg;
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::. Charity School Management System .::</title>
<link rel="stylesheet" type="text/css" href="css/style_view.css" />
</head>

<body>
	<h1 style="text-align:center; font-size:30px; padding:5px;">Total Expenses</h1>
	  
<div class="col-md-12  view-form-style">
<div class="col-md-1 entry-head margin-20b">
   <!-- <h4 class="left">Total Expenses</h4>-->
  
   <a class="btn btn-primary right" href="?tag=expense_entry">Generate Total Expense</a>
   <a class="btn btn-primary right" href="../donations/insert_monetary_help.php"style="margin-top:10px;">Request Donation </a>
</div>
<form role="form" data-toggle="validator" method="post" class="form-horizontal">
    <div class="form-group">
        <div class="col-md-9 col-md-offset-1     col-xs-9 col-sm-10">
            <input type="text" class="form-control" name="searchtxt" Placeholder="Enter Date for search" autocomplete="off"/></div>
        <input type="submit" name="btnsearch" value="Search" class="btn btn-info"/>
    </div>
</form>

<div class="table-responsive">
	<form method="post">
        <table class="table table-bordered">
        <tr>
        	<th>No</th>
            <th>Month</th>
            <th>Student Expense</th>
            <th>Teachers Salary</th>
            <th>Staff Salary</th>
            <th>Bills</th>
            <th>Extras</th>
            <th>Total</th>
            <th colspan="2">Operation</th>
      	</tr>
        
         <?php
		 $key="";
	if(isset($_POST['searchtxt']))
		$key=$_POST['searchtxt'];
	
	if($key !="")
		$sql_sel=mysql_query("SElECT * FROM expenses WHERE date like '%$key%' ");
	else
        $sql_sel  =mysql_query("SELECT exp_id,date,student_expense,teachers_salary,staff_salary,bills,extras, (teachers_salary+staff_salary+bills+extras+student_expense) as tot FROM expenses ORDER BY date DESC;");
		
    $i=0;
	$count = 0;
    while($row=mysql_fetch_array($sql_sel)){
    $i++;
    $color=($i%2==0)?"lightblue":"white";
    ?>
      <tr bgcolor="<?php echo $color?>">
          <td><?php echo $i;?></td>
          <td><?php echo $row['date'];?></td>
          <td><?php echo $row['student_expense'];?></td>
          <td><?php echo $row['teachers_salary'];?></td>
          <td><?php echo $row['staff_salary'];?></td>
          <td><?php echo $row['bills'];?></td>
          <td><?php echo $row['extras'];?></td>
       
          	
          
          <td><?php echo $total=$row['teachers_salary']+$row['staff_salary']+$row['bills']+$row['extras']+$row['student_expense'];?></td>
          <td><a href="?tag=expense_entry&opr=upd&rs_id=<?php echo $row['exp_id'];?>" title="Upate"><img src="picture/update.png" /></a></td>
          <td><a href="?tag=view_expense&opr=del&rs_id=<?php echo $row['exp_id'];?>" title="Delete"><img src="picture/delete.png" /></a></td> 
        </tr>       
    <?php	$count++;
	// if($count==1){
	 //	$myJSON = array("date"=>$row['date'],"students_expense"=>$row['student_expense'],"teachers_salary"=>$row['teachers_salary'],
	//	 "staff_salary"=>$row['staff_salary'],"bills"=>$row['bills'],"extras"=>$row['extras'],"total"=>$total);
	 //	echo json_encode($myJSON);
		//}
		?>
    <?php	
    }
    ?>
   	</table>
 	</form>
</div><!--end of content_input -->
</body>
</html>