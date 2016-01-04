<?php
/*
Include this file in your module (don't change its location)
USE require_once __DIR__ . 'relative path from your folder to this file'; in your file
Create Object like this $a=new UserInfo();
then call function with this object
Every public function needs a variable passkey=="delta" (for authentic access only) as first argument
Every Function returns JSON which has following keys

--success  (1,-1,-2)
if operation is successfull it returns 1, -1 for error/problem, -2 for incorrect passkey
next fields will only be avialble when success==1
--result (object array)
it contains rows with their column name as key value pair like this
"result":[
{"user_id":4,"username":"77","firstname":"Mickey","lastname":"45","isdonor":0,"phonenumber":"80980"},
{"user_id":4,"username":"77","firstname":"Mickey","lastname":"45","isdonor":0,"phonenumber":"80980"}]

--result_count
gives number of tuples in result key
Function syntax

function system_users($pk);
function module_users($pk,$project);
function module_user_id($pk,$project,$id);
function system_user_id($pk,$id);


for a module
module_users($pk,$project);
function module_user_id($pk,$project,$id);
ye do functions hen

*/
class UserInfo{
    private  $pass;

    private $db;
    function __construct() {
        require_once __DIR__ . '/db_connect.php';
        $this->pass="delta";
        $this->db=new DB_CONNECT();
    }
    private function find_match($url){
//        echo __DIR__
        $str = file_get_contents(__DIR__.'/../modules/modules.json');
        $str =json_decode($str);
        //        echo $str;
        $str=$str->projectlist;
        foreach($str as $obj){
            if($obj->url==$url )
                return $obj->table;
        }
        return null;
    }
    function system_users($pk){

        $response=array();
        if($pk!=$this->pass){
            $response["success"]=-2;
            return json_encode($response);
        }
        $response["success"]=-1;
        $db_c=$this->db->connect("userdata");
        $qry= $db_c->prepare("SELECT user_id,username,firstname,lastname,email from user_details");
        if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute()){
            $response["success"]=1;
            $result=$qry->get_result();
            $response["result"]=array();
            $cnt=0;
            if(mysqli_num_rows($result)>0){
                $response["success"]=1;

                while($row = mysqli_fetch_array($result)){
                    $store=array();
                    $store["user_id"]=$row["user_id"];
                    $store["username"]=$row["username"];
                    $store["firstname"]=$row["firstname"];
                    $store["lastname"]=$row["lastname"];
                    $store["email"]=$row["email"];
                    array_push($response["result"],$store);
                    $cnt++;
                }
            }
            $response["result_count"]=$cnt;

        }
        $this->db->disconnect($db_c);// wrapper function in db_connect.php
        return json_encode($response);
    }
    function module_users($pk,$project){
        
        $table=self::find_match($project);
        //        echo $table;
        if($table=="null"){
            return $this->system_users($pk);
        }
        $response=array();
        if($pk!=$this->pass){
            $response["success"]=-2;
            return json_encode($response);
        }
        $response["success"]=-1;
        $db_c=$this->db->connect("userdata");
        $qry= $db_c->prepare("SELECT * FROM (SELECT user_id,username,firstname,lastname,email from user_details) as A
                NATURAL JOIN (SELECT user_id FROM registered_modules where module_id=?) as B 
                NATURAL JOIN   (SELECT * FROM ".$table.") as C");
        $tmp=addslashes($project);
        $qry->bind_param("s",$tmp);

        if($qry->execute()){
            $response["success"]=1;
            $result=$qry->get_result();
            $response["result"]=array();
            $cnt=0;
            $fields=array();
            if(mysqli_num_rows($result)>0){
                $fc=0;
                while ($fieldinfo=mysqli_fetch_field($result))
                {
                    $fields[$fc]=$fieldinfo->name;
                    $fc++;
                }
                while($row = mysqli_fetch_array($result)){
                    $store=array();
                    for($i=0;$i<count($fields);$i++){
                        $store[$fields[$i]]=$row[$fields[$i]];
                    }
                    array_push($response["result"],$store);
                    $cnt++;
                }

            }
            $response["result_count"]=$cnt;
//            var_dump($result=$qry->get_result());
        }
        $this->db->disconnect($db_c);// wrapper function in db_connect.php
        return json_encode($response);

    }
    function system_user_id($pk,$id){
        $response=array();
        if($pk!=$this->pass){
            $response["success"]=-2;
            return json_encode($response);
        }
        $response["success"]=-1;
        $db_c=$this->db->connect("userdata");
        $qry= $db_c->prepare("SELECT user_id,username,firstname,lastname,email from user_details where user_id=?");
        $qry->bind_param("s",$id);
        if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute()){
            $response["success"]=1;
            $result=$qry->get_result();
            $response["result"]=array();
            $cnt=0;
            if(mysqli_num_rows($result)==1){
                $response["success"]=1;

                while($row = mysqli_fetch_array($result)){
                    $store=array();
                    $store["user_id"]=$row["user_id"];
                    $store["username"]=$row["username"];
                    $store["firstname"]=$row["firstname"];
                    $store["lastname"]=$row["lastname"];
                    $store["email"]=$row["email"];
                    array_push($response["result"],$store);
                    $cnt++;
                }
            }
            $response["result_count"]=$cnt;

        }
        $this->db->disconnect($db_c);// wrapper function in db_connect.php
        return json_encode($response);
    }
    function module_user_id($pk,$project,$id){
        
        $table=self::find_match($project);
        if($table=="null"){
            return $this->system_user_id($pk,$id);
        }
        $response=array();
        if($pk!=$this->pass){
            $response["success"]=-2;
            return json_encode($response);
        }
        $response["success"]=-1;
        $db_c=$this->db->connect("userdata");
        $qry= $db_c->prepare("SELECT * FROM (SELECT user_id,username,firstname,lastname,email from user_details) as A
                NATURAL JOIN (SELECT user_id FROM registered_modules where module_id=? AND user_id=?) as B 
                NATURAL JOIN   (SELECT * FROM ".$table.") as C");
        $qry->bind_param("ss",addslashes($project),$id);

        if($qry->execute()){
            $response["success"]=1;
            $result=$qry->get_result();
            $response["result"]=array();
            $cnt=0;
            $fields=array();
            if(mysqli_num_rows($result)>0){
                $fc=0;
                while ($fieldinfo=mysqli_fetch_field($result))
                {
                    $fields[$fc]=$fieldinfo->name;
                    $fc++;
                }
                while($row = mysqli_fetch_array($result)){
                    $store=array();
                    for($i=0;$i<count($fields);$i++){
                        $store[$fields[$i]]=$row[$fields[$i]];
                    }
                    array_push($response["result"],$store);
                    $cnt++;
                }

            }
            $response["result_count"]=$cnt;
//            var_dump($result=$qry->get_result());
        }
        $this->db->disconnect($db_c);// wrapper function in db_connect.php
        return json_encode($response);

    }
}
//var_dump();

//$a=new UserInfo();
//echo $a->module_users("delta","./academic_scholorships");
?>