<?php
// composer autoloader
require_once 'vendor/autoload.php';

$stripe = [
    'publishable' => 'pk_test_sPnAMEXENK1ycxsZwj4NlPrb',
    'private' => 'sk_test_BvefXDnddo5SyQMM2XgNTMhV'
];

Stripe::setApiKey($stripe['private']);
?>


