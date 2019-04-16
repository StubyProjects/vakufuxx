<?php
  if($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: ../index');
    exit();
  }
  require 'vendor/autoload.php';
  require 'env.php';


$gateway = new Braintree_Gateway([
    'environment' => 'sandbox',
    'merchantId' => getenv('MERCHANT_ID_PD'),
    'publicKey' => getenv('PUBLIC_KEY_PD'),
    'privateKey' => getenv('PRIVATE_KEY_PD')
]);

/*
  $gateway = new Braintree_Gateway([
      'environment' => 'production',
      'merchantId' => getenv('MERCHANT_ID_PD'),
      'publicKey' => getenv('PUBLIC_KEY_PD'),
      'privateKey' => getenv('PRIVATE_KEY_PD')
  ]);
*/

?>