<?php 
class InsertData{
    private  $pass;

    private $db;
    function __construct() {
        require_once  '/../../../php/db_connect.php';
        
        $this->pass="delta";
        $this->db=new DB_CONNECT();
    }

    function insert_school($kk,$pk){

        $response=array();
        if($kk!=$this->pass){
            $response["success"]=-2;
            return json_encode($response);
        }
        $id =null;
      
  $name = filter_var($pk['sch_name'], FILTER_SANITIZE_STRING);
  $add = filter_var($pk['sch_address'], FILTER_SANITIZE_STRING);
  $contact = filter_var($pk['sch_contact'], FILTER_SANITIZE_STRING);
  $email = filter_var($pk['sch_email'], FILTER_SANITIZE_STRING);
  $website = filter_var($pk['website'], FILTER_SANITIZE_STRING);
  $username = filter_var($pk['username'], FILTER_SANITIZE_STRING);
  $password = filter_var($pk['password'], FILTER_SANITIZE_STRING);
        
        
        $response["success"]=-1;
        $db_c=$this->db->connect("userdata");
        
        $qry = $db_c->prepare("INSERT INTO user_details(username, firstname, lastname, email, password) VALUES ('$username','school','school','$email','$password')");
           if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute()){
            
                $response["success"]=1;     
                
            }
          $qry = $db_c->prepare("SELECT user_id from user_details where email = '$email' and password='$password'");
           if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute())
            {
              $result=$qry->get_result();
              $row = mysqli_fetch_array($result);
              $id=$row["user_id"];
              $response["success"]=$id;     
            }
        
 $qry= $db_c->prepare("INSERT INTO sch_school(user_id, school_ame, school_address, school_contact, school_email, school_website) VALUES ('$id','$name','$add','$contact','$email','$website')");
     
           if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute()){
            
                $response["success"]=1;     
                
            }
        
         $qry= $db_c->prepare("INSERT INTO sch_users(user_id, rating, is_school, is_admin) VALUES ('$id','0','1','0')");
     
           if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute()){
            
                $response["success"]=1;     
                
            }
        
       /* $qry= $db_c->prepare("INSERT INTO sch_school(user_id, school_ame, school_address, school_contact, school_email, school_website) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7])");*/
     
            
    
        $this->db->disconnect($db_c);// wrapper function in db_connect.php
        return json_encode($response);
    }


     function donate_request($kk,$pk,$req,$id){

        $response=array();
        if($kk!=$this->pass){
            $response["success"]=-2;
            return json_encode($response);
        }

        $email = filter_var($pk['don_email'], FILTER_SANITIZE_STRING);
        $contact = filter_var($pk['don_contact'], FILTER_SANITIZE_STRING);
        $msg = filter_var($pk['don_msg'], FILTER_SANITIZE_STRING);
        $amount = filter_var($pk['don_amount'], FILTER_SANITIZE_STRING);
        
        $response["success"]=-1;
        $db_c=$this->db->connect("userdata");
        
        $qry = $db_c->prepare("INSERT INTO sch_donations(user_id, req_id, don_email,don_contact,don_msg,don_amount) 
          VALUES ('$id','$req','$email','$contact','$msg','$amount')");
           if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute()){
            
                $response["success"]=1;     
                
            }
         
            
    
        $this->db->disconnect($db_c);// wrapper function in db_connect.php
        return json_encode($response);
    }
    

         function get_donation_by_id($kk,$id){

        $response=array();
        if($kk!=$this->pass){
            $response["success"]=-2;
            return json_encode($response);
        }
        $response["success"]=-1;
        $db_c=$this->db->connect("userdata");
        $qry= $db_c->prepare("SELECT * from sch_donations join sch_requests using (req_id) where sch_donations.user_id='$id'");
        if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute()){
            
            $result=$qry->get_result();
            $response["result"]=array();
            $cnt=0;
            if(mysqli_num_rows($result)>0){
                $response["success"]=1;
           while($row = mysqli_fetch_array($result)){
                   $store=array();
                 $name = $row['full_name'];
                 
            $store['don_id'] = $row['don_id'];     
             $store['req_id'] = $row['req_id'];  
             $store['req_time'] = $row['req_time'];            
          $store['don_status'] = $row['don_status'];
          $store['don_msg'] = $row['don_msg'];
          $store['don_amount'] = $row['don_amount'];

        
          $store['full_name'] = $row['full_name'];
          $store['father_name'] = $row['father_name'];
          $store['course_degree']=$row['course_degree'];
          $store['age'] = $row['age'];
          $store['gender'] = $row['gender'];
          $store['approx_amount'] = $row['approx_amount'];
          $store['school_name']= $row['school_name'];
          $store['req_text'] = $row['req_text'];
          $store['add_info'] = $row['add_info'];
                 $store['req_status'] = $row['req_status'];
                 $store['don_time'] = $row['don_time'];
                
                
                 
            array_push($response["result"],$store);
           }
                
            }
            

        }
        $this->db->disconnect($db_c);// wrapper function in db_connect.php
        return json_encode($response);
    }



    
     function insert_request($kk,$pk,$id){

        $response=array();
        if($kk!=$this->pass){
            $response["success"]=-2;
            return json_encode($response);
        }
          $age = filter_var($pk['age'], FILTER_SANITIZE_STRING);
          $gender = filter_var($pk['gender'], FILTER_SANITIZE_STRING);
          $name = filter_var($pk['full_name'], FILTER_SANITIZE_STRING);
          $fname = filter_var($pk['father_name'], FILTER_SANITIZE_STRING);
          $course = filter_var($pk['course_degree'], FILTER_SANITIZE_STRING);
          $approx = filter_var($pk['approx_amount'], FILTER_SANITIZE_STRING);
          $school = filter_var($pk['school_name'], FILTER_SANITIZE_STRING);
          $add_info = filter_var($pk['add_info'], FILTER_SANITIZE_STRING);
          $req = filter_var($pk['req_text'], FILTER_SANITIZE_STRING);
        
        
        $response["success"]=-1;
        $db_c=$this->db->connect("userdata");
        
        $qry = $db_c->prepare("INSERT INTO sch_requests(user_id, full_name, father_name, course_degree, age, gender, approx_amount, school_name, req_text, add_info) VALUES ('$id','$name','$fname','$course','$age','$gender','$approx','$school','$req','$add_info')");
           if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute()){
            
                $response["success"]=1;     
                
            }
         
            
    
        $this->db->disconnect($db_c);// wrapper function in db_connect.php
        return json_encode($response);
    }
    
    function update_request($kk,$pk,$id){

        $response=array();
        if($kk!=$this->pass){
            $response["success"]=-2;
            return json_encode($response);
        }
       

          $age = filter_var($pk['age'], FILTER_SANITIZE_STRING);
          $gender = filter_var($pk['gender'], FILTER_SANITIZE_STRING);
          $name = filter_var($pk['full_name'], FILTER_SANITIZE_STRING);
          $fname = filter_var($pk['father_name'], FILTER_SANITIZE_STRING);
          $course = filter_var($pk['course_degree'], FILTER_SANITIZE_STRING);
          $approx = filter_var($pk['approx_amount'], FILTER_SANITIZE_STRING);
          $school = filter_var($pk['school_name'], FILTER_SANITIZE_STRING);
          $add_info = filter_var($pk['add_info'], FILTER_SANITIZE_STRING);
          $req = filter_var($pk['req_text'], FILTER_SANITIZE_STRING);
    
   
   
        
        
        $response["success"]=-1;
        $db_c=$this->db->connect("userdata");
        
        $qry = $db_c->prepare("UPDATE sch_requests SET  full_name='$name', father_name='$fname', course_degree='$course', age='$age', gender='$gender', 
          approx_amount='$approx', school_name='$school', req_text='$req', add_info='$add_info' WHERE req_id='$id'");
           if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute()){
            
                $response["success"]=1;     
                
            }
         
            
    
        $this->db->disconnect($db_c);// wrapper function in db_connect.php
        return json_encode($response);
    }
        
    function delete_request($kk,$id){

        $response=array();
        if($kk!=$this->pass){
            $response["success"]=-2;
            return json_encode($response);
        }
       
   
        
        $response["success"]=-1;
        $db_c=$this->db->connect("userdata");
        
        $qry = $db_c->prepare("DELETE FROM sch_requests WHERE req_id='$id'");
           if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute()){
            
                $response["success"]=1;     
                
            }
         $qry = $db_c->prepare("DELETE FROM sch_donations WHERE req_id='$id'");
           if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute()){
            
                $response["success"]=1;     
                
            }
            
    
        $this->db->disconnect($db_c);// wrapper function in db_connect.php
        return json_encode($response);
    }
    
    
function approve_donation($kk,$id){

        $response=array();
        if($kk!=$this->pass){
            $response["success"]=-2;
            return json_encode($response);
        }
       
   
        
        $response["success"]=-1;
        $db_c=$this->db->connect("userdata");
        
        $qry = $db_c->prepare("UPDATE sch_donations SET don_status = '1' WHERE don_id='$id'");
           if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute()){
            
                $response["success"]=1;     
                
            }
         
         $qry = $db_c->prepare("SELECT user_id from sch_donations WHERE don_id='$id'");
           if(!$qry)
            echo "prepare error".$qry;

         if($qry->execute()){
            
            $result=$qry->get_result();
            $response["result"]=array();
            $cnt=0;
            if(mysqli_num_rows($result)>0){
                $response["success"]=1;
          $row = mysqli_fetch_array($result);
                 
                 $user = $row['user_id'];
                 
           
           }         

        }
         $qry = $db_c->prepare("SELECT rating from sch_users WHERE user_id='$user'");
           if(!$qry)
            echo "prepare error".$qry;

         if($qry->execute()){
            
            $result=$qry->get_result();
            $response["result"]=array();
            $cnt=0;
            if(mysqli_num_rows($result)>0){
                $response["success"]=1;
          $row = mysqli_fetch_array($result);
                 
                 $rate = $row['rating'];
                 
           
           }         

        }

        $rate = $rate + 10;
 $response["success"]=-1;
        $db_c=$this->db->connect("userdata");
        
        $qry = $db_c->prepare("UPDATE sch_users SET rating = '$rate' WHERE user_id='$user'");
           if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute()){
            
                $response["success"]=1;     
                
            }


        $this->db->disconnect($db_c);// wrapper function in db_connect.php
        return json_encode($response);
    }
    



     function disapprove_donation($kk,$id){

        $response=array();
        if($kk!=$this->pass){
            $response["success"]=-2;
            return json_encode($response);
        }
       
   
        
        $response["success"]=-1;
        $db_c=$this->db->connect("userdata");
        
        $qry = $db_c->prepare("UPDATE sch_donations SET don_status = '0' WHERE don_id='$id'");
           if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute()){
            
                $response["success"]=1;     
                
            }
         
          
 $qry = $db_c->prepare("SELECT user_id from sch_donations WHERE don_id='$id'");
           if(!$qry)
            echo "prepare error".$qry;

         if($qry->execute()){
            
            $result=$qry->get_result();
            $response["result"]=array();
            $cnt=0;
            if(mysqli_num_rows($result)>0){
                $response["success"]=1;
          $row = mysqli_fetch_array($result);
                 
                 $user = $row['user_id'];
                 
           
           }         

        }
         $qry = $db_c->prepare("SELECT rating from sch_users WHERE user_id='$user'");
           if(!$qry)
            echo "prepare error".$qry;

         if($qry->execute()){
            
            $result=$qry->get_result();
            $response["result"]=array();
            $cnt=0;
            if(mysqli_num_rows($result)>0){
                $response["success"]=1;
          $row = mysqli_fetch_array($result);
                 
                 $rate = $row['rating'];
                 
           
           }         

        }

        $rate = $rate - 10;
 $response["success"]=-1;
        $db_c=$this->db->connect("userdata");
        
        $qry = $db_c->prepare("UPDATE sch_users SET rating = '$rate' WHERE user_id='$user'");
           if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute()){
            
                $response["success"]=1;     
                
            }



    
        $this->db->disconnect($db_c);// wrapper function in db_connect.php
        return json_encode($response);
    }


     function approve_request($kk,$id){

        $response=array();
        if($kk!=$this->pass){
            $response["success"]=-2;
            return json_encode($response);
        }
       
   
        
        $response["success"]=-1;
        $db_c=$this->db->connect("userdata");
        
        $qry = $db_c->prepare("UPDATE sch_requests SET req_status = '1' WHERE req_id='$id'");
           if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute()){
            
                $response["success"]=1;     
                
            }
         
         $qry = $db_c->prepare("SELECT user_id from sch_requests WHERE req_id='$id'");
           if(!$qry)
            echo "prepare error".$qry;

         if($qry->execute()){
            
            $result=$qry->get_result();
            $response["result"]=array();
            $cnt=0;
            if(mysqli_num_rows($result)>0){
                $response["success"]=1;
          $row = mysqli_fetch_array($result);
                 
                 $user = $row['user_id'];
                 
           
           }         

        }
         $qry = $db_c->prepare("SELECT rating from sch_users WHERE user_id='$user'");
           if(!$qry)
            echo "prepare error".$qry;

         if($qry->execute()){
            
            $result=$qry->get_result();
            $response["result"]=array();
            $cnt=0;
            if(mysqli_num_rows($result)>0){
                $response["success"]=1;
          $row = mysqli_fetch_array($result);
                 
                 $rate = $row['rating'];
                 
           
           }         

        }

        $rate = $rate + 10;
 $response["success"]=-1;
        $db_c=$this->db->connect("userdata");
        
        $qry = $db_c->prepare("UPDATE sch_users SET rating = '$rate' WHERE user_id='$user'");
           if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute()){
            
                $response["success"]=1;     
                
            }


        $this->db->disconnect($db_c);// wrapper function in db_connect.php
        return json_encode($response);
    }
    
    function disapprove_request($kk,$id){

        $response=array();
        if($kk!=$this->pass){
            $response["success"]=-2;
            return json_encode($response);
        }
       
   
        
        $response["success"]=-1;
        $db_c=$this->db->connect("userdata");
        
        $qry = $db_c->prepare("UPDATE sch_requests SET req_status = '0' WHERE req_id='$id'");
           if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute()){
            
                $response["success"]=1;     
                
            }
         
          
 $qry = $db_c->prepare("SELECT user_id from sch_requests WHERE req_id='$id'");
           if(!$qry)
            echo "prepare error".$qry;

         if($qry->execute()){
            
            $result=$qry->get_result();
            $response["result"]=array();
            $cnt=0;
            if(mysqli_num_rows($result)>0){
                $response["success"]=1;
          $row = mysqli_fetch_array($result);
                 
                 $user = $row['user_id'];
                 
           
           }         

        }
         $qry = $db_c->prepare("SELECT rating from sch_users WHERE user_id='$user'");
           if(!$qry)
            echo "prepare error".$qry;

         if($qry->execute()){
            
            $result=$qry->get_result();
            $response["result"]=array();
            $cnt=0;
            if(mysqli_num_rows($result)>0){
                $response["success"]=1;
          $row = mysqli_fetch_array($result);
                 
                 $rate = $row['rating'];
                 
           
           }         

        }

        $rate = $rate - 10;
 $response["success"]=-1;
        $db_c=$this->db->connect("userdata");
        
        $qry = $db_c->prepare("UPDATE sch_users SET rating = '$rate' WHERE user_id='$user'");
           if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute()){
            
                $response["success"]=1;     
                
            }



    
        $this->db->disconnect($db_c);// wrapper function in db_connect.php
        return json_encode($response);
    }



        function delete_school($kk,$id){

        $response=array();
        if($kk!=$this->pass){
            $response["success"]=-2;
            return json_encode($response);
        }
       
   
        
        $response["success"]=-1;
        $db_c=$this->db->connect("userdata");
        
        $qry = $db_c->prepare("DELETE FROM sch_school WHERE user_id='$id'");
           if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute()){
            
                $response["success"]=1;     
                
            }
                 $qry = $db_c->prepare("DELETE FROM sch_users WHERE user_id='$id'");
           if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute()){
            
                $response["success"]=1;     
                
            }
                 $qry = $db_c->prepare("DELETE FROM user_details WHERE user_id='$id'");
           if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute()){
            
                $response["success"]=1;     
                
            }
         
            
    
        $this->db->disconnect($db_c);// wrapper function in db_connect.php
        return json_encode($response);
    }
     function update_school($kk,$pk,$id){

        $response=array();
        if($kk!=$this->pass){
            $response["success"]=-2;
            return json_encode($response);
        }

      
  $name = filter_var($pk['sch_name'], FILTER_SANITIZE_STRING);
  $add = filter_var($pk['sch_address'], FILTER_SANITIZE_STRING);
  $contact = filter_var($pk['sch_contact'], FILTER_SANITIZE_STRING);
  $email = filter_var($pk['sch_email'], FILTER_SANITIZE_STRING);
  $website = filter_var($pk['website'], FILTER_SANITIZE_STRING);
  $username = filter_var($pk['username'], FILTER_SANITIZE_STRING);
  $password = filter_var($pk['password'], FILTER_SANITIZE_STRING);


        
        
        $response["success"]=-1;
        $db_c=$this->db->connect("userdata");
        
        $qry = $db_c->prepare("UPDATE user_details SET username='$username', email='$email', password='$password' WHERE user_id='$id'");
           if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute()){
            
                $response["success"]=$id;     
                
            }
          
        
 $qry= $db_c->prepare("UPDATE sch_school SET school_ame='$name', school_address='$add', school_contact='$contact', school_email='$email', school_website='$website' WHERE user_id='$id'");
     
           if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute()){
            
                $response["success"]=1;     
                
            }
        
 
        
       /* $qry= $db_c->prepare("INSERT INTO sch_school(user_id, school_ame, school_address, school_contact, school_email, school_website) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7])");*/
     
            
    
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
             $row = mysqli_fetch_array($result);
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
            array_push($response["result"],$store);
                 
                
            }
            

        }
        $this->db->disconnect($db_c);// wrapper function in db_connect.php
        return json_encode($response);
    }
    
    
        function get_requests($kk){

        $response=array();
        if($kk!=$this->pass){
            $response["success"]=-2;
            return json_encode($response);
        }
        $response["success"]=-1;
        $db_c=$this->db->connect("userdata");
        $qry= $db_c->prepare("SELECT * from (sch_requests join user_details using (user_id)) join sch_users using (user_id)");
        if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute()){
            
            $result=$qry->get_result();
            $response["result"]=array();
            $cnt=0;
            if(mysqli_num_rows($result)>0){
                $response["success"]=1;
            while($row = mysqli_fetch_array($result)){
                   $store=array();
                 $name = $row['full_name'];
                  $store['req_time'] = $row['req_time'];
                 $store['user_id'] = $row['user_id'];
                 $store['username'] = $row['username'];
                 $store['rating'] = $row['rating'];
                 $store['full_name'] = $row['full_name'];
          $store['father_name'] = $row['father_name'];
          $store['course_degree']=$row['course_degree'];
          $store['age'] = $row['age'];
          $store['gender'] = $row['gender'];
          $store['approx_amount'] = $row['approx_amount'];
          $store['school_name']= $row['school_name'];
          $store['req_text'] = $row['req_text'];
          $store['add_info'] = $row['add_info'];
          $store['req_id'] = $row['req_id'];
          $store['req_status'] = $row['req_status'];
                
                
                
                 
            array_push($response["result"],$store);
                 
                }
            }
            

        }
        $this->db->disconnect($db_c);// wrapper function in db_connect.php
        return json_encode($response);
    }
    
 function get_school_requests($kk,$school){


        $response=array();
        if($kk!=$this->pass){
            $response["success"]=-2;
            return json_encode($response);
        }
        $response["success"]=-1;
        $db_c=$this->db->connect("userdata");





        $qry= $db_c->prepare("SELECT * FROM sch_school WHERE user_id='$school'");
        if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute()){
            
            $result=$qry->get_result();
            
            $cnt=0;
            if(mysqli_num_rows($result)>0){
                
          $row = mysqli_fetch_array($result);
                $school_id = $row['school_id'];
  $response["success"]=$school_id;
            }

}




        $qry= $db_c->prepare("SELECT * from (sch_requests join user_details using (user_id)) join sch_users using (user_id) where school_name='$school_id'");
        if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute()){
            
            $result=$qry->get_result();
            $response["result"]=array();
            $cnt=0;
            if(mysqli_num_rows($result)>0){
               // $response["success"]=1;
            while($row = mysqli_fetch_array($result)){
          $store=array();
          $name = $row['full_name'];
          $store['user_id'] = $row['user_id'];
          $store['username'] = $row['username'];
          $store['rating'] = $row['rating'];
          $store['full_name'] = $row['full_name'];
          $store['father_name'] = $row['father_name'];
          $store['course_degree']=$row['course_degree'];
          $store['age'] = $row['age'];
          $store['gender'] = $row['gender'];
          $store['approx_amount'] = $row['approx_amount'];
          $store['school_name']= $row['school_name'];
          $store['req_text'] = $row['req_text'];
          $store['add_info'] = $row['add_info'];
          $store['req_id'] = $row['req_id'];
          $store['req_status'] = $row['req_status'];
          $store['req_time'] = $row['req_time'];
                
                
                
                 
            array_push($response["result"],$store);
                 
                }
            }
            

        }
        $this->db->disconnect($db_c);// wrapper function in db_connect.php
        return json_encode($response);
    }


    

function get_school_donations($kk,$school){


        $response=array();
        if($kk!=$this->pass){
            $response["success"]=-2;
            return json_encode($response);
        }
        $response["success"]=-1;
        $db_c=$this->db->connect("userdata");





        $qry= $db_c->prepare("SELECT * FROM sch_school WHERE user_id='$school'");
        if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute()){
            
            $result=$qry->get_result();
            
            $cnt=0;
            if(mysqli_num_rows($result)>0){
                
          $row = mysqli_fetch_array($result);
                $school_id = $row['school_id'];
  $response["success"]=$school_id;
            }

}




        $qry= $db_c->prepare("SELECT sch_donations.req_id,sch_donations.user_id, don_id,don_status,don_time, don_email,don_contact,don_msg, don_amount,req_time, full_name, father_name, age,gender,approx_amount, course_degree,rating,username,req_status from sch_donations join sch_requests using (req_id) join user_details join sch_users where sch_donations.user_id = user_details.user_id and sch_donations.user_id = sch_users.user_id and sch_requests.school_name='$school_id'");
        if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute()){
            
            $result=$qry->get_result();
            $response["result"]=array();
            $cnt=0;
            if(mysqli_num_rows($result)>0){
               // $response["success"]=1;
            while($row = mysqli_fetch_array($result)){
          $store=array();
         
          $store['username'] = $row['username'];
          $store['donor_id'] = $row['user_id'];
          $store['rating'] = $row['rating'];
          $store['don_id'] = $row['don_id'];
          $store['don_status'] = $row['don_status'];
          $store['don_email'] = $row['don_email'];
          $store['don_contact'] = $row['don_contact'];
          $store['don_amount'] = $row['don_amount'];
          $store['don_msg'] = $row['don_msg'];

          $store['req_id'] = $row['req_id'];
          $store['req_status'] = $row['req_status'];
          $store['req_time'] = $row['req_time'];

          $store['full_name'] = $row['full_name'];
          $store['father_name'] = $row['father_name'];
          $store['course_degree']=$row['course_degree'];
          $store['age'] = $row['age'];
          $store['gender'] = $row['gender'];
          $store['approx_amount'] = $row['approx_amount'];
          $store['don_time'] = $row['don_time'];
      
     
                
                
                
                 
            array_push($response["result"],$store);
                 
                }
            }
            

        }
        $this->db->disconnect($db_c);// wrapper function in db_connect.php
        return json_encode($response);
    }





     function get_requests_by_id($kk,$id){

        $response=array();
        if($kk!=$this->pass){
            $response["success"]=-2;
            return json_encode($response);
        }
        $response["success"]=-1;
        $db_c=$this->db->connect("userdata");
        $qry= $db_c->prepare("SELECT * from (sch_requests join user_details using (user_id)) join sch_users using (user_id) where user_id='$id'");
        if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute()){
            
            $result=$qry->get_result();
            $response["result"]=array();
            $cnt=0;
            if(mysqli_num_rows($result)>0){
                $response["success"]=1;
           while($row = mysqli_fetch_array($result)){
                   $store=array();
                 $name = $row['full_name'];
                 $store['user_id'] = $row['user_id'];
                 $store['req_time'] = $row['req_time'];
                $store['req_id'] = $row['req_id'];
                 $store['username'] = $row['username'];
                 $store['rating'] = $row['rating'];
                 $store['full_name'] = $row['full_name'];
          $store['father_name'] = $row['father_name'];
          $store['course_degree']=$row['course_degree'];
          $store['age'] = $row['age'];
          $store['gender'] = $row['gender'];
          $store['approx_amount'] = $row['approx_amount'];
          $store['school_name']= $row['school_name'];
          $store['req_text'] = $row['req_text'];
          $store['add_info'] = $row['add_info'];
                 $store['req_status'] = $row['req_status'];
                
                
                 
            array_push($response["result"],$store);
           }
                
            }
            

        }
        $this->db->disconnect($db_c);// wrapper function in db_connect.php
        return json_encode($response);
    }
    

function get_request($kk,$id){

        $response=array();
        if($kk!=$this->pass){
            $response["success"]=-2;
            return json_encode($response);
        }
        $response["success"]=-1;
        $db_c=$this->db->connect("userdata");
        $qry= $db_c->prepare("SELECT * from sch_requests where req_id='$id'");
        if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute()){
            
            $result=$qry->get_result();
            $response["result"]=array();
            $cnt=0;
            if(mysqli_num_rows($result)>0){
                $response["success"]=1;
           while($row = mysqli_fetch_array($result)){
                   $store=array();
                 $name = $row['full_name'];
                 $store['user_id'] = $row['user_id'];
                $store['req_id'] = $row['req_id'];
                 
                
                 $store['full_name'] = $row['full_name'];
          $store['father_name'] = $row['father_name'];
          $store['course_degree']=$row['course_degree'];
          $store['age'] = $row['age'];
          $store['gender'] = $row['gender'];
          $store['approx_amount'] = $row['approx_amount'];
          $store['school_name']= $row['school_name'];
          $store['req_text'] = $row['req_text'];
          $store['add_info'] = $row['add_info'];
                
                
                 $store['req_status'] = $row['req_status'];
                 
            array_push($response["result"],$store);
           }
                
            }
            

        }
        $this->db->disconnect($db_c);// wrapper function in db_connect.php
        return json_encode($response);
    }



    
    
    function get_school($kk,$pk){

        $response=array();
        if($kk!=$this->pass){
            $response["success"]=-2;
            return json_encode($response);
        }
        $response["success"]=-1;
        $db_c=$this->db->connect("userdata");
        $qry= $db_c->prepare("SELECT * from sch_school join user_details using (user_id) where user_id='$pk'");
        if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute()){
            
            $result=$qry->get_result();
            $response["result"]=array();
            $cnt=0;
            if(mysqli_num_rows($result)>0){
                $response["success"]=1;
        $row = mysqli_fetch_array($result);
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
        $this->db->disconnect($db_c);// wrapper function in db_connect.php
        return json_encode($response);
    }


function get_school_by_id($kk,$pk){

        $response=array();
        if($kk!=$this->pass){
            $response["success"]=-2;
            return json_encode($response);
        }
        $response["success"]=-1;
        $db_c=$this->db->connect("userdata");
        $qry= $db_c->prepare("SELECT * from sch_school WHERE school_id='$pk'");
        if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute()){
            
            $result=$qry->get_result();
            $response["result"]=array();
            $cnt=0;
            if(mysqli_num_rows($result)>0){
                $response["success"]=1;
        $row = mysqli_fetch_array($result);
                   $store=array();
                    
                $store["school_name"]=$row["school_ame"];
                $store["school_address"]=$row["school_address"];
                $store["school_contact"]=$row["school_contact"];
                $store["school_email"]=$row["school_email"];
                $store["school_website"]=$row["school_website"];
         
            
            array_push($response["result"],$store);
        
                
            }
            

        }
        $this->db->disconnect($db_c);// wrapper function in db_connect.php
        return json_encode($response);
    }

    function get_all_school_names($kk){

        $response=array();
        if($kk!=$this->pass){
            $response["success"]=-2;
            return json_encode($response);
        }
        $response["success"]=-1;
        $db_c=$this->db->connect("userdata");
        $qry= $db_c->prepare("SELECT school_ame,school_address,school_id from sch_school");
        if(!$qry)
            echo "prepare error".$qry;

        if($qry->execute()){
            
            $result=$qry->get_result();
            $response["result"]=array();
            $cnt=0;
            if(mysqli_num_rows($result)>0){
                $response["success"]=1;
       while( $row = mysqli_fetch_array($result)){
                   $store=array();
                    $store["school_id"]=$row["school_id"];
                    $store["school_name"]=$row["school_ame"];
                    $store["school_address"]=$row["school_address"];
               
               
            
            array_push($response["result"],$store);
        
       }
            }
            

        }
        $this->db->disconnect($db_c);// wrapper function in db_connect.php
        return json_encode($response);
    }
}
    ?>