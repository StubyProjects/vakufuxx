<?php

include_once 'forms/DBConnect.php';

if($_POST) {

    $codeToCheck = $_POST['discountCode'];

    $checkCodeSql = "SELECT * from discount WHERE promocode = :code";

    $dbconnect = new DBConnect();

    $prepareCodeCheck = $dbconnect->connect()->prepare($checkCodeSql);

    $prepareCodeCheck->execute(["code" => $codeToCheck]);

    $sqlResult = $prepareCodeCheck->fetch(PDO::FETCH_ASSOC);

    if($sqlResult) {

        if(!$sqlResult["used_code"]) {

            echo $sqlResult["promocode"];
        }


    } else {
        echo "Dieser Code ist ungültig";
    }
}