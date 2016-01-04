<?php
	session_start();
	session_destroy();
	header('Location: ../../portal.php');
	//header('Location: index.php');
	exit; 
?>