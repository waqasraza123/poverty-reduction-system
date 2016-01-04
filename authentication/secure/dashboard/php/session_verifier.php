<?php

if (isset($_POST["project_id"]) ){
    
    session_start();
    if(isset($_SESSION['session_name']){
        echo $_SESSION['session_name'];
    }
    else
       echo null;
}

?>