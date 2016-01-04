<?php

require_once 'common.php';
include "../db_config_values.php";
$var_value = $_POST['amount'];
$custom_message = $_POST['custom_mess'];



if (isset($_POST['stripeToken']))
{
    $token = $_POST['stripeToken'];

    try{
        Stripe::setApiKey("sk_test_BvefXDnddo5SyQMM2XgNTMhV");
        Stripe_Charge::create([
            "amount" => $var_value,
            "currency" => "PKR",
            "source" => "$token", // obtained with Stripe.js
            "description" => $custom_message
        ]);
    }
    catch(Stripe_CardError $e){
        
    }
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    $xxx = $_POST["problemcode"];

    $sql = "update monetary_donation set money_recieved = money_recieved + $var_value/100 where problem_id=$xxx;";
            if ($conn->query($sql) === TRUE) {
                //echo "<script>alert('Record updated successfully')</script>";
                echo "<script>window.location = '../monetary_problem.php?problemcode=$xxx&payment=done'; </script>";
            }
            else {
                echo "<script>window.location = 'monetary_help.php'; </script>";
                echo "alert('An error occoured. Please try again later') ";
            }    
}

     ?>


<html>
<head>
    <title> Check out </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/master-ui.css">

</head>

<body>
<p>Payment Successful! Thank you for donating</p>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>

</html>
