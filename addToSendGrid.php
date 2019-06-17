<?php
require "vendor/autoload.php";
require_once "env.php";

function addToSendGrid($request_body) {
    $apiKey = getenv('SENDGRID_MARKETING_KEY');
    $sg = new \SendGrid($apiKey);

    try {
        $sg->client->contactdb()->recipients()->post($request_body);
    } catch (Exception $e) {
        echo 'Caught exception: ', $e->getMessage(), "\n";
    }
}
