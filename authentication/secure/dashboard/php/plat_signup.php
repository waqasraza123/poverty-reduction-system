<?php
$_POST = json_decode(file_get_contents('php://input'), true);

    $response=array();
    $response["success"]=-1;
//    $response["errors"]=array();
if (isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"])){
    
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $response["errors"]="Email Error!";
    echo json_encode($response);
    exit();
}
else if (preg_match('/\s/',$_POST["username"])){
    $response["errors"]="Username incorrect!";
    echo json_encode($response);
    exit();
}
else if(preg_match('/\s/',$_POST["password"])){
    $response["errors"]="Password has spaces!";
    echo json_encode($response);
    exit();
}else if(strlen($_POST["password"])<6){
    $response["errors"]="Password should be at least 6 character long!";
    echo json_encode($response);
    exit();
}
    require_once __DIR__ . '/db_connect.php';
    $email= $_POST["email"];
    $fname=$_POST["firstname"];
    $lname=$_POST["lastname"];
    $username=$_POST["username"];
    $pass=$_POST["password"];
    $db= new DB_CONNECT();
    $db_c= $db->connect("userdata");
    $qry= $db_c->prepare("SELECT * from user_details where email= ? OR username=?");
    // fist argument tells format of each parameter
    $qry->bind_param("ss",$email,$username);
    $qry->execute();
    $result=$qry->get_result();
    if(mysqli_num_rows($result) == 0){
       $qry= $db_c->prepare("INSERT INTO user_details (username,firstname,lastname,email,password) VALUES(?,?,?,?,?)");
        // fist argument tells format of each parameter
        $temp=sha1($pass);
        $qry->bind_param("sssss",$username,$fname,$lname,$email,$temp);
        $qry->execute();
        
        if($qry->affected_rows>0){
            $response["success"]=1;
            session_start();
//            setcookie("user_id", $qry->insert_id, time() + (86400 * 30), "/");
            
            $_SESSION["session_name"] = $qry->insert_id;
            $qry= $db_c->prepare("INSERT INTO an_users (user_id,user_role) VALUES(?,?)");
        // fist argument tells format of each parameter
            $username=$_SESSION["session_name"];
            $fname="student";
        $qry->bind_param("ss",$username,$fname);
        $qry->execute();
//            $qry= $db_c->prepare("INSERT INTO sr_users (user_id,user_role) VALUES(?,?)");
//            $qry->bind_param("ss",$username,$fname);
//        $qry->execute();
        }
    }else{
    
        $response["errors"]="Email or username already exits";
    echo json_encode($response);
    exit();
        
    }
    mysqli_close($db_c);
}
 echo json_encode($response);
?>