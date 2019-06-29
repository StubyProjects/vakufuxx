<?php

include_once 'forms/DBConnect.php';

if($_POST) {

    $addSql = "INSERT INTO discount(email, promocode) VALUES(:email, :promocode)";

    $fetchSql = "SELECT promocode from discount WHERE email = :email";

    $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    $discountCode = "";
    for ($i = 0; $i < 10; $i++) {
        $discountCode .= $chars[mt_rand(0, strlen($chars)-1)];
    }

    $dbconnect = new DBConnect();
    $submittedMail = $_POST['emailvalue'];

    $addNewDisCount = $dbconnect->connect()->prepare($addSql);

    try {

        $addNewDisCount->execute(['email' => $submittedMail, 'promocode' => $discountCode]);
        echo $discountCode;

    } catch(Exception $e) {

        $getCodePrep = $dbconnect->connect()->prepare($fetchSql);

        $getCodePrep->execute(["email" => $submittedMail]);

        $getCode = $getCodePrep->fetch(PDO::FETCH_ASSOC);

        echo $getCode["promocode"];

    }

}