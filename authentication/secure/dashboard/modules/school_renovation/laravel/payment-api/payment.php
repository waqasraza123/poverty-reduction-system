<?php
require_once 'common.php';
$amount_entered = $_POST["amount"] * 100;
$custom_message = "Amount for donation module";

?>

<html>
<head>
    <title> Checkout </title>
    <link rel="stylesheet" type="text/css" href="css/master-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>

<body>
<p>Please enter your Visa card details for Payment.</p>
<form action="charge.php" method="POST">
    <input type="hidden" name="amount" value= "<?php echo $amount_entered;?>">
    <input type="hidden" name="custom_mess" value= "<?php echo $custom_message;?>">


    <script
        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key="pk_test_sPnAMEXENK1ycxsZwj4NlPrb"
        data-image="insert_thelogo_of_our_project_here"
        data-name="BESE-4C Payment Module"
        data-description="Product Payment"
        data-currency = "PKR"
        data-amount="<?php echo $amount_entered;
        ?>"
        data-locale="auto">
    </script>
</form>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>

</html>
