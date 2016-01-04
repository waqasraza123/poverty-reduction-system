<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	
if(isset($_POST['btn_sub'])){
	$username=$_POST['usertxt'];
	$appr=$_POST['apprtxt'];
	//$pwd=$_POST['pwdtxt'];
	$type=$_POST['typetxt'];
	

$sql_ins=mysql_query("INSERT INTO users_tbl 
						VALUES(
							NULL,
							'$username',
							'$type',
							'$appr',
							)
					");
if($sql_ins==true) {
    $msg = ucfirst($username);
    echo "<div>"
        . "<div class='alert alert-success col-md-6 col-md-offset-3'>"
        . "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
        . "</button>"
        . "<strong>Sucess!</strong> User $msg record inserted"
        . "</div>"
        . "</div>";
}
else
	$msg="Insert Error:".mysql_error();
	
}

//------------------uodate data----------
if(isset($_POST['btn_upd'])){
	$username=$_POST['usertxt'];
	$appr=$_POST['apprtxt'];
	$type=$_POST['typetxt'];
	
	$sql_update=mysql_query("UPDATE users_tbl SET 
								username='$username' ,
								type='$type',
								approved='$appr',  								 
								type='$type'
							WHERE
								u_id=$id
							");
	if($sql_update==true) {
        $msg = ucfirst($username) ;
        echo "<div>"
            . "<div class='alert alert-success col-md-6 col-md-offset-3'>"
            . "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
            . "</button>"
            . "<strong>Sucess!</strong> Student $msg record Updated"
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
<?php
if($opr=="upd")
{
	$sql_upd=mysql_query("SELECT * FROM users_tbl WHERE u_id=$id");
	$rs_upd=mysql_fetch_array($sql_upd);
?>
<div class="col-md-10 col-md-offset-1 form-style">
    <div class="col-md-12 entry-head margin-20b">
        <h4 class="left">User Entry</h4>
        <a class="btn btn-primary right" href="?tag=view_users">Back</a>
    </div>
    <div class="col-md-10 col-md-offset-1">
        <form role="form" data-toggle="validator" method="post" class="form-horizontal">
            <div class="row">
                <div class="form-group">
                    <label for="usertxt" class="control-label col-sm-3">Username:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="usertxt" name="usertxt" value="<?php echo $rs_upd['username'];?>">
                    </div>
                </div>
                
                
                <div class="form-group">
                    <label for="apprtxt" class="control-label col-sm-3">Approved:</label>
                    <div class="col-sm-8">
                    	<select name="apprtxt" id ="apprtxt" class="form-control">
                    		<option <?php if($rs_upd['approved'] =='1') echo "selected";?> value="1">Yes</option>
                    		<option <?php if($rs_upd['approved'] =='0') echo "selected";?> value="0">No</option>
                    		</select>
                        
                        
                    </div>
                </div>
                    
                <div class="form-group">
                    <label for="typetxt" class="control-label col-sm-3">Type:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="typetxt">
                            <option <?php if($rs_upd['type']=="student") echo "selected";?>>student</option>
                            <option <?php if($rs_upd['type']=="teacher") echo "selected";?>>teacher</option>
                            <option <?php if($rs_upd['type']=="admin") echo "selected";?>>admin</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <input type="submit" name="btn_upd" value="Register" class="btn btn-success col-md-offset-4 col-sm-offset-4 col-xs-offset-2"/>
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
        <h4 class="left">User Entry</h4>
        <a class="btn btn-primary right" href="?tag=view_users">Users View</a>
    </div>
    <div class="col-md-10 col-md-offset-1">
        <form role="form" data-toggle="validator" method="post" class="form-horizontal">
            <div class="row">
                <div class="form-group">
                    <label for="usertxt" class="control-label col-sm-3">Username:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="usertxt" name="usertxt"  placeholder="Username..." required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="typetxt" class="control-label col-sm-3">Type:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="typetxt">
                            <option>student</option>
                            <option>teacher</option>
                            <option>admin</option>
                        </select>
                    </div>
                </div>
                
                 <div class="form-group">
                    <label for="apprtxt" class="control-label col-sm-3">Approved</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="apprtxt">
                            <option value="1">Yes</option>
                            <option value="0">No</option>                   
                        </select>
                    </div>
        
                <div class="form-group">
                    <label for="typetxt" class="control-label col-sm-3">Type:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="typetxt">
                            <option>Student</option>
                            <option>Teacher</option>
                            <option>Admin</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" name="btn_sub" value="Register" class="btn btn-success col-md-offset-4 col-sm-offset-4 col-xs-offset-2"/>
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