<?php

  if($_POST['tokenId']) {

    require_once('vendor/autoload.php');
  
    //stripe secret key or revoke key
    $stripeSecret = 'sk_test_51J3WRVFXIkqDBFQnFpdwGQUMb0PxGPesRSNILcpdtU5r39HJGCd5KiW9TYr9muPOFjKGHb52AS0XmjS67Gw8LDFd00d3rDaRnu';

    // See your keys here: https://dashboard.stripe.com/account/apikeys
    \Stripe\Stripe::setApiKey($stripeSecret);

    // Get the payment token ID submitted by the form:
    $token = $_POST['tokenId'];

    // Charge the user's card:
    $charge = \Stripe\Charge::create(array(
      "amount" => $_POST['amount'],
      "currency" => "usd",
      "description" => "stripe integration in PHP with source code - tutsmake.com",
      "source" => $token,
    ));exit;

    // after successfull payment, you can store payment related information into your database

    $data = array('success' => true, 'data'=> $charge);

    echo json_encode($data); 
  }
