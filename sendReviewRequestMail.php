<?php
if($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: index');
    exit();
}

require "vendor/autoload.php";
require 'env.php';

function sendScheduledReviewMail($name, $recipientMail, $timestamp) {
    $email = new \SendGrid\Mail\Mail();
    $email->setFrom("info@vakufuxx.de", "Vakufuxx");
    $email->addTo(
        $recipientMail,
        $name,
        [
            "name" => $name,
        ]
    );
    $email->setTemplateId("d-ca784e7a4bf14edd88816f449644cbef");
    $email->setSendAt($timestamp + 1000000);

    $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
    try {
       $sendgrid->send($email);
    } catch (Exception $e) {
        echo 'Caught exception: '.  $e->getMessage(). "\n";
    }
}



