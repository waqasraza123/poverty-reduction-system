<?php

$user_name = "root";
$password = "seecs@123";
$database = "test1";
$server = "localhost"; 
$db_handle = mysqli_connect($server, $user_name, $password);
$db_found = mysqli_select_db($db_handle,$database) or die("no db_found");