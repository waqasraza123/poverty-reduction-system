<?php

require_once 'common.php';
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

// error
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

<p>Payment Successful! Thank you for ordering</p>
<script>
    window.location = "/authentication/secure/dashboard/modules/problem_sharing/donner"
</script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>

</html>
