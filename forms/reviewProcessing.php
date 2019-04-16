<?php
/**
 * Created by PhpStorm.
 * User: Jakob
 * Date: 26.03.2019
 * Time: 23:49
 */
include_once "DBConnect.php";

if($_POST) {

    $reviewStars = $_POST['stars'];
    $reviewComments = $_POST['comment'];
    $reviewName = $_POST['name'];
    $reviewCode = $_POST['code'];

    $dbconnect = new DBConnect();

    $sqlInsertStatement = "UPDATE reviews SET Name = ?, stars = ?, comment = ? WHERE reviewcodes = ?";

    $initiateInsertion = $dbconnect->connect()->prepare($sqlInsertStatement);
    $initiateInsertion->execute([$reviewName, $reviewStars, $reviewComments, $reviewCode]);

    if($initiateInsertion->rowCount()) {
        echo true;
    } else {
        echo false;
    }

}


