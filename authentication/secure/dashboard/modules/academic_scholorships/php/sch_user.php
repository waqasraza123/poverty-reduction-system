<?php 
class SchUser{
    private  $pass;

    private $db;
    function __construct() {
        require_once  '/../../../php/db_connect.php';
        
        $this->pass="delta";
        $this->db=new DB_CONNECT();
    }

    function system_users($kk,$pk){

        $response=array();
        if($kk!=$this->pass){
            $response["success"]=-2;
            return json_encode($response);
        }
        $response["success"]=-1;
        $db_c=$this->db->connect("userdata");
        $qry= $db_c->prepare("SELECT * from sch_users where user_id=$pk");
        if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute()){
            
            $result=$qry->get_result();
            $response["result"]=array();
            $cnt=0;
            if(mysqli_num_rows($result)>0)
            {
                    $response["success"]=1;
                    $row = mysqli_fetch_array($result);
                    $store=array();
                    $store["sch_id"]=$row["sch_id"];
                    $store["user_id"]=$row["user_id"];
                    $store["rating"]=$row["rating"];
                    $store["is_school"]=$row["is_school"];
                    $store["is_admin"]=$row["is_admin"];
                    array_push($response["result"],$store);
                 
                
            }
                else
                {
                    $store=array();

                    $qry= $db_c->prepare("INSERT into sch_users (user_id, rating, is_school, is_admin) VALUES ('$pk', 0 , 0, 0)");
                    if(!$qry)
                    echo "prepare error".$qry;

                    if($qry->execute())
                    {

                        $response["success"]=1;

                        $qry= $db_c->prepare("SELECT sch_id from sch_users where user_id=$pk");
                        if(!$qry)
                        echo "prepare error".$qry;

                        if($qry->execute()){
                        $result=$qry->get_result();
                        $row = mysqli_fetch_array($result);
                        $store["sch_id"]=$row["sch_id"];

                        }
             
                    
                    
                        $store["user_id"]=$pk;
                        $store["rating"]=0;
                        $store["is_school"]=0;
                        $store["is_admin"]=0;
                        array_push($response["result"],$store);
                    }
               
                }
            
            

        }
        $this->db->disconnect($db_c);// wrapper function in db_connect.php
        return json_encode($response);
    }
    function get_schools($kk){

        $response=array();
        if($kk!=$this->pass){
            $response["success"]=-2;
            return json_encode($response);
        }
        $response["success"]=-1;
        $db_c=$this->db->connect("userdata");
        $qry= $db_c->prepare("SELECT * from sch_school join user_details using (user_id)");
        if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute()){
            
            $result=$qry->get_result();
            $response["result"]=array();
            $cnt=0;
            if(mysqli_num_rows($result)>0){
                $response["success"]=1;
         while(  $row = mysqli_fetch_array($result)){
                   $store=array();
                    $store["school_id"]=$row["school_id"];
                    $store["user_id"]=$row["user_id"];
                    $store["school_name"]=$row["school_ame"];
                    $store["school_address"]=$row["school_address"];
                    $store["school_contact"]=$row["school_contact"];
                $store["school_email"]=$row["school_email"];
                $store["school_website"]=$row["school_website"];
                 $store["username"]=$row["username"];
                 $store["password"]=$row["password"];
                 $store["password"]=$row["password"];
            
            array_push($response["result"],$store);
         }
                
            }
            

        }
        $this->db->disconnect($db_c);// wrapper function in db_connect.php
        return json_encode($response);
    }
    
    
     
}
    ?>