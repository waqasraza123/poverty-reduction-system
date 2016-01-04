<?php
session_start();
if(isset($_SESSION['dashboard_login_username'])){
    
        echo("<script>window.location = './dashboard'</script>");
}
    //redirecting to login
    echo("<script>window.location = 'login'</script>");

    //stopping php
    exit();

?>