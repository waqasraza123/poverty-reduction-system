<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
if(isset($_POST['btn_sub'])){
	$bills=$_POST['bills'];
	$extras=$_POST['extras'];	
$stu_expense = "SELECT SUM(student_expense) as stu_exp FROM stu_tbl;";
$stu_expense = mysql_query($stu_expense);
$stu_expense = mysql_fetch_array($stu_expense);
$stu_expense = $stu_expense['stu_exp'];	

$tot_teacher = "SELECT SUM(Salary) as teach_sal FROM teacher_tbl WHERE type='teacher';";
$tot_teacher = mysql_query($tot_teacher);
$tot_teacher = mysql_fetch_array($tot_teacher);
$tot_teacher = $tot_teacher['teach_sal'];

$tot_staff   = "SELECT SUM(Salary) as staff_sal FROM teacher_tbl WHERE type='staff';";
$tot_staff	 = mysql_query($tot_staff);
$tot_staff   = mysql_fetch_array($tot_staff);
$tot_staff   = $tot_staff['staff_sal'];

$sql_ins	 = mysql_query("INSERT INTO expenses (student_expense,teachers_salary,staff_salary,bills,extras) 
					VALUES(	
							'$stu_expense',
							'$tot_teacher',
							'$tot_staff',
							'$bills',
							'$extras'
							)
					");									

if($sql_ins==true) {
    {
        echo "<div>"
            . "<div class='alert alert-success col-md-6 col-md-offset-3'>"
            . "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
            . "</button>"
            . "<strong>Sucess!</strong> New Expense inserted"
            . "</div>"
            . "</div>";
    }
}
else
	$msg="Insert Error:".mysql_error();
	
}

//------------------uodate data----------
if(isset($_POST['btn_upd'])){
	$bills=$_POST['bills'];
	$extras=$_POST['extras'];	
	
	$sql_update=mysql_query("UPDATE expenses SET 
								bills='$bills',
								extras='$extras'
							WHERE
								exp_id=$id
							");
	if($sql_update==true) {
        echo "<div>"
            . "<div class='alert alert-success col-md-6 col-md-offset-3'>"
            . "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
            . "</button>"
            . "<strong>Sucess!</strong> Expenses Updated"
            . "</div>"
            . "</div>";
    }
	else {
        echo "<div>"
            . "<div class='alert alert-danger col-md-6 col-md-offset-3'>"
            . "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
            . "</button>"
            . "<strong>Warning!</strong> Update Failed"
            . "</div>"
            . "</div>";
    }
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::. Charity School Management .::</title>
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
</head>

<body>

<?php

if($opr=="upd")
{
	$sql_upd=mysql_query("SELECT * FROM expenses WHERE exp_id=$id");
	$rs_upd=mysql_fetch_array($sql_upd);
	
?>
<div class="col-md-10 col-md-offset-1 form-style">
    <div class="col-md-12 entry-head margin-20b">
        <h4 class="left">Expenses Update</h4>
        <a class="btn btn-primary right" href="?tag=view_expenses">Back</a>
    </div>
    <div class="col-md-10 col-md-offset-1">
        <form role="form" data-toggle="validator" method="post" class="form-horizontal">
            <div class="row">
                <div class="form-group">
                    <label for="bills" class="control-label col-sm-3">Bills</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="bills" name="bills" value="<?php echo $rs_upd['bills'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="extras" class="control-label col-sm-3">Extras:</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="extras" name="extras" value="<?php echo $rs_upd['extras'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" name="btn_upd" value="Update" class="btn btn-success col-md-offset-4 col-sm-offset-4 col-xs-offset-2"/>
                    <input type="reset" value="Cancel" class="btn btn-primary col-md-offset-3 col-sm-offset-3 col-xs-offset-3"/>
                </div>
            </div>
        </form>
    </div>
</div>


<?php	
}
else
{
?>
<div class="col-md-10 col-md-offset-1 form-style">
    <div class="col-md-12 entry-head margin-20b">
        <h4 class="left">Expense Entry</h4>
        <a class="btn btn-primary right" href="?tag=view_expenses">Expense View</a>
    </div>
    <div class="col-md-10 col-md-offset-1">
        <form role="form" data-toggle="validator" method="post" class="form-horizontal">
            <div class="row">
                <div class="form-group">
                    <label for="fnametxt" class="control-label col-sm-3">Bills</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="bills" name="bills"  placeholder="Bills" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="notetxt" class="control-label col-sm-3">Extras</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="bills" name="extras"  placeholder="Extras" required>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" name="btn_sub" value="Generate Expense" class="btn btn-success col-md-offset-4 col-sm-offset-4 col-xs-offset-2"/>
                    <input type="reset" value="Cancel" class="btn btn-primary col-md-offset-3 col-sm-offset-3 col-xs-offset-3"/>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
}
?>
</body>
</html>