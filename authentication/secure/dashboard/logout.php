<?php

	//starting session
	session_start();

	//flushing saved session
	session_destroy();

	//redirecting to login
    echo("<script>window.location = '../login?msg=logout'</script>");

    //stopping php
    exit();

?>