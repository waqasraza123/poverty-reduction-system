<?php
require_once 'common.php';
$amount_entered = $_POST["amount"] * 100;
$custom_message = "Amount for donation module";

?>
<?php 
    include "../donor_header_footer.php";
?>

<html>
<head>
    <title> Checkout </title>
    <link rel="stylesheet" type="text/css" href="css/master-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link href="css/master-ui.css" rel="stylesheet">
    <style type="text/css">
        form{
            align: center;
        }
    </style>
</head>

<body>
<p>Please enter your Visa card details for Payment.</p>

<div style="margin:auto;  border:1px solid #000; margin-top:20%; padding:5%; width:270px; border:1px sloid #676767; box-shadow: 0 0 17px #000;background:#333;">
<form action="charge.php" method="POST" >
    <input type="hidden" name="amount" value= "<?php echo $amount_entered;?>">
    <input type="hidden" name="custom_mess" value= "<?php echo $custom_message;?>">
    <input type="hidden" name="problemcode" value="<?php echo $_POST["problemcode"]?>">

    <script
        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key="pk_test_sPnAMEXENK1ycxsZwj4NlPrb"
        data-image="insert_thelogo_of_our_project_here"
        data-name="BESE-4A Payment Module"
        data-description="Product Payment"
        data-currency = "PKR"
        data-amount="<?php echo $amount_entered;
        ?>"
        data-locale="auto">
    </script>
</form>
</div>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>

</html>
