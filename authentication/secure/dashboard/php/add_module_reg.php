<?php

$_POST = json_decode(file_get_contents('php://input'), true);

    $response=array();
    $response["success"]=-1;
//    $response["errors"]=array();
if (isset($_POST["url"]) && isset($_POST["fields"]) ){
    
    require_once __DIR__ . '/db_connect.php';
    $url=$_POST["url"];
    $fields=$_POST["fields"];
    $str = file_get_contents('../modules/cw_fields.json');
    $str =json_decode($str);
    $str=$str->item;
    session_start();
    $_ID=$_SESSION["session_name"];
    $url=$_POST["url"];
//    echo $_ID;
    $db= new DB_CONNECT();
    $db_c= $db->connect("userdata");
    $qry;
//    echo $fields["isdonor"];
    switch ($url){
            
        case "./problem_sharing":
            if(!preg_match('/([9][2][3])([0-9]{9})$/',$fields["phonenumber"])){
                $response["errors"]="Incorrect phone number!";
                echo json_encode($response);
                exit();
            }
            else if($fields["isdonor"]>1 ||$fields["isdonor"]<0){
                $response["errors"]="error!".$fields["isdonor"];
                echo json_encode($response);
                exit();
            }
            $qry= $db_c->prepare("INSERT INTO cw_users(user_id,isdonor,phonenumber) VALUES (?,?,?)");
////                    // fist argument tells format of each parameter
                    if($qry)
                    $qry->bind_param("sss",$_ID,$fields["isdonor"],$fields["phonenumber"]);
                    else
                        echo "not prepared";
                    if($qry->execute()){
                        $qry= $db_c->prepare("INSERT INTO registered_modules(user_id,module_id) VALUES (?,?)");
////                    // fist argument tells format of each parameter
                        $oi=addslashes($url);
                    $qry->bind_param("ss",$_ID,$oi);
                    if($qry->execute()){
                         $response["success"]=1;
                        $response["url"]="./modules/".$url;
                    }
                    }
            break;
        case "./food_sustenance":
            if(!preg_match('/([9][2][3])([0-9]{9})$/',$fields["phonenumber"])){
                $response["errors"]="Incorrect phone number!";
                echo json_encode($response);
                exit();
            }
            else if($fields["role"]>1 || $fields["role"]<0){
                $response["errors"]="error!";
                echo json_encode($response);
                exit();
            }
            $qry= $db_c->prepare("INSERT INTO mr_users(user_id,role,contact) VALUES (?,?,?)");
////                    // fist argument tells format of each parameter
                    $qry->bind_param("sss",$_ID,$fields["role"],$fields["phonenumber"]);
                    if($qry->execute()){
                        $qry= $db_c->prepare("INSERT INTO registered_modules(user_id,module_id) VALUES (?,?)");
////                    // fist argument tells format of each parameter
                        $wer=addslashes($url);
                    $qry->bind_param("ss",$_ID,$wer);
                    if($qry->execute()){
                         $response["success"]=1;
                        $response["url"]="./modules/".$url;
                    }
                    }
            break;
        case "./donations":
            if(!preg_match('/([9][2][3])([0-9]{9})$/',$fields["phonenumber"])){
                $response["errors"]="Incorrect phone number!";
                echo json_encode($response);
                exit();
            }
            else if($fields["donor"]>1 || $fields["donor"]<0){
                $response["errors"]="error!";
                echo json_encode($response);
                exit();
            }
            else if(strlen($fields["address"])<1){
                $response["errors"]="error home address!";
                echo json_encode($response);
                exit();
            }
                $qry= $db_c->prepare("INSERT INTO mh_users(user_id,contact_number,address,is_donor) VALUES (?,?,?,?)");
////                    // fist argument tells format of each parameter
                    $qry->bind_param("ssss",$_ID,$fields["phonenumber"],$fields["address"],$fields["donor"]);
                    if($qry->execute()){
                        $qry= $db_c->prepare("INSERT INTO registered_modules(user_id,module_id) VALUES (?,?)");
////                    // fist argument tells format of each parameter
                        $tt=addslashes($url);
                    $qry->bind_param("ss",$_ID,$tt);
                    if($qry->execute()){
                        $qry= $db_c->prepare("SELECT * from user_details where  user_id=$_ID");
                        
//                        $qry->execute();
                         if($qry->execute()){
                            $result=$qry->get_result();
                             if(mysqli_num_rows($result) == 1){
                                 $row = mysqli_fetch_array($result);
                                $qry=$db_c->prepare("INSERT INTO mh_user_data(user_first_name, user_last_name,user_email,
                                        user_donor, user_password, user_address, user_contact_number) VALUES (?,?,?,?,?,?,?) ");
                         $qry->bind_param("sssssss",$row["firstname"],$row["lastname"],$row["email"],
                                          $fields["donor"],$row["password"],$fields["address"],$fields["phonenumber"]);
                                 if($qry->execute()){
                         $response["success"]=1;
                        $response["url"]="./modules/".$url;
                             }
                             }
                         }
                    }
                    }
        break;
        case "./academic_scholorships":
            $qry= $db_c->prepare("INSERT INTO registered_modules(user_id,module_id) VALUES (?,?)");
////                    // fist argument tells format of each parameter
                    $uy=addslashes($url);
                    $qry->bind_param("ss",$_ID,$uy);
                    if($qry->execute()){
                         $response["success"]=1;
                        $response["url"]="./modules/".$url;
                    }
            break;case "./d2quiz":
            $qry= $db_c->prepare("INSERT INTO registered_modules(user_id,module_id) VALUES (?,?)");
////                    // fist argument tells format of each parameter
                $ty=addslashes($url);
                    $qry->bind_param("ss",$_ID,$ty);
                    if($qry->execute()){
                         $response["success"]=1;
                        $response["url"]="./modules/".$url;
                    }
            break;
        case "./drixel":
            $qry= $db_c->prepare("INSERT INTO an_users(user_id,user_role) VALUES (?,?)");
////                    // fist argument tells format of each parameter
            $tt="student";
                    $qry->bind_param("ss",$_ID,$tt);
                    if($qry->execute()){
            $qry= $db_c->prepare("INSERT INTO registered_modules(user_id,module_id) VALUES (?,?)");
////                    // fist argument tells format of each parameter
            $yt=addslashes($url);
                    $qry->bind_param("ss",$_ID,$yt);
                    if($qry->execute()){
                         $response["success"]=1;
                        $response["url"]="./modules/".$url;
                    }
                    }
            break;
        case "./school_management":
            if($fields["role"]>1 || $fields["role"]<0){
                $response["errors"]="error!";
                echo json_encode($response);
                exit();
            }
//            ./school_management
            $qry= $db_c->prepare("INSERT INTO sr_users(user_id,user_role) VALUES (?,?)");
////                    // fist argument tells format of each parameter
                    $qry->bind_param("ss",$_ID,$fields["role"]);
                    if($qry->execute()){
            $qry= $db_c->prepare("INSERT INTO registered_modules(user_id,module_id) VALUES (?,?)");
////                    // fist argument tells format of each parameter
                        $rt=addslashes($url);
                    $qry->bind_param("ss",$_ID,$rt);
                    if($qry->execute()){
                         $response["success"]=1;
                        $response["url"]="./modules/".$url;
                    }
                    }
            break;
        case "./p2p_ecommerce":
                    if(!preg_match('/([9][2][3])([0-9]{9})$/',$fields["phonenumber"])){
                $response["errors"]="Incorrect phone number!";
                echo json_encode($response);
                exit();
            }
            $qry= $db_c->prepare("INSERT INTO hw_users(user_id,phone_number) VALUES (?,?)");
////                    // fist argument tells format of each parameter
                    $qry->bind_param("ss",$_ID,$fields["phonenumber"]);
                    if($qry->execute()){
                        $qry= $db_c->prepare("INSERT INTO registered_modules(user_id,module_id) VALUES (?,?)");
////                    // fist argument tells format of each parameter
                        $temp=addslashes($url);
                    $qry->bind_param("ss",$_ID,$temp);
                    if($qry->execute()){
                         $response["success"]=1;
                        $response["url"]="./modules/".$url;
                    }
                    }
            break;
        case "./school_renovation":
                     if(!preg_match('/([9][2][3])([0-9]{9})$/',$fields["phonenumber"])){
                $response["errors"]="Incorrect phone number!";
                echo json_encode($response);
                exit();
            }
                    if(str_word_count($fields["bio"],0)>500){
                        $response["errors"]="maximum 500 word!";
                        echo json_encode($response);
                        exit();
                    }
                    if(str_word_count($fields["more_info"],0)>500){
                        $response["errors"]="maximum 500 word!";
                        echo json_encode($response);
                        exit();
                    }
                    if(strlen($fields["occupation"])<1){
                        $response["errors"]="Occupation required!";
                        echo json_encode($response);
                        exit();
                    }
            $qry= $db_c->prepare("INSERT INTO mmm_users(user_id,phone_number,bio,more_info,occupation) VALUES (?,?,?,?,?)");
////                    // fist argument tells format of each parameter
                    $qry->bind_param("sssss",$_ID,$fields["phonenumber"],$fields["bio"],$fields["more_info"],$fields["occupation"]);
                    if($qry->execute()){
                        $qry= $db_c->prepare("INSERT INTO registered_modules(user_id,module_id) VALUES (?,?)");
////                    // fist argument tells format of each parameter
                        $temp=addslashes($url);
                    $qry->bind_param("ss",$_ID,$temp);
                    if($qry->execute()){
                         $response["success"]=1;
                        $response["url"]="./modules/".$url;
                    }
                    }
            $qry= $db_c->prepare("INSERT INTO mm_users(user_id,phone_number,bio,more_info,occupation,name) VALUES (?,?,?,?,?,?)");
////                    // fist argument tells format of each parameter
                    $nm=$fields["firstname"].$fields["lastname"];
                    $qry->bind_param("ssssss",$_ID,$fields["phonenumber"],$fields["bio"],$fields["more_info"],$fields["occupation"],$nm);
                    if($qry->execute()){
                        $qry= $db_c->prepare("INSERT INTO registered_modules(user_id,module_id) VALUES (?,?)");
////                    // fist argument tells format of each parameter
                        $temp=addslashes($url);
                    $qry->bind_param("ss",$_ID,$temp);
                    if($qry->execute()){
                         $response["success"]=1;
                        $response["url"]="./modules/".$url;
                    }
                    }
            break;
        case "./blood_donations":
            if(!preg_match('/([9][2][3])([0-9]{9})$/',$fields["phonenumber"])){
                $response["errors"]="Incorrect phone number!";
                echo json_encode($response);
                exit();
            }
            else if($fields["role"]>1 || $fields["role"]<0){
                $response["errors"]="error!";
                echo json_encode($response);
                exit();
            }
            $qry= $db_c->prepare("INSERT INTO ua_users(user_id,phonenumber,role) VALUES (?,?,?)");
////                    // fist argument tells format of each parameter
                    $qry->bind_param("sss",$_ID,$fields["phonenumber"],$fields["role"]);
                    if($qry->execute()){
            $qry= $db_c->prepare("INSERT INTO registered_modules(user_id,module_id) VALUES (?,?)");
////                    // fist argument tells format of each parameter
                        $qq=addslashes($url);
                    $qry->bind_param("ss",$_ID,$qq);
                    if($qry->execute()){
                         $response["success"]=1;
                        $response["url"]="./modules/".$url;
                    }
                    }
            break;
        case "./ngos":
                     if(!preg_match('/([9][2][3])([0-9]{9})$/',$fields["phonenumber"])){
                $response["errors"]="Incorrect phone number!";
                echo json_encode($response);
                exit();
            }
                    if (!filter_var($fields["ngoemail"], FILTER_VALIDATE_EMAIL)) {
                    $response["errors"]="Invalid email";
                    echo json_encode($response);
                        exit();
                    }
                    if(strlen($fields["ngoname"])<1){
                        $response["errors"]="Name requried!";
                        echo json_encode($response);
                        exit();
                    }
            $qry= $db_c->prepare("INSERT INTO am_users(user_id,phonenumber,ngoname,ngoemail) VALUES (?,?,?,?)");
////                    // fist argument tells format of each parameter
                    $qry->bind_param("ssss",$_ID,$fields["phonenumber"],$fields["ngoname"],$fields["ngoemail"]);
                    if($qry->execute()){
                        $qry= $db_c->prepare("INSERT INTO registered_modules(user_id,module_id) VALUES (?,?)");
////                    // fist argument tells format of each parameter
                        $temp=addslashes($url);
                    $qry->bind_param("ss",$_ID,$temp);
                    if($qry->execute()){
                         $response["success"]=1;
                        $response["url"]="./modules/".$url;
                    }
                    }
            break;
        default:
             
            
    }
    echo json_encode($response);
 
}
?>
