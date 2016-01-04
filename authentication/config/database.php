<?php

	$servername = "localhost";
	$username = "root";
	$password = "seecs@123";

	//make connection
	$conn = new mysqli($servername, $username, $password);

	//checking connection
	if ($conn->connect_error){

	    die("ERROR ESTABLISHING DB CONNECTION ");
	} 

	//selecting db
	if(!$conn->select_db('test1'))
 		die("ERROR SELECTING DB");
            
?>