<?php
/**
 * Created by PhpStorm.
 * User: Jakob
 * Date: 31.03.2019
 * Time: 10:53
 */
include_once "DBConnect.php";

$dbconnect = new DBConnect();
$comments = $dbconnect->connect()->prepare("SELECT Name, comment FROM reviews WHERE comment != ?");
$comments->execute([""]);
$getComments = $comments->fetchAll(PDO::FETCH_CLASS);


$stars = $dbconnect->connect()->query("SELECT SUM(stars), COUNT(stars) FROM reviews");
$getStarRatingInfo = $stars->fetch(PDO::FETCH_ASSOC);


function getCountOfTotalReviews() {
    global $getStarRatingInfo;
    return $getStarRatingInfo["COUNT(stars)"];
}

function getEvaluation() {
    global $getStarRatingInfo;
    $totalstarCount = $getStarRatingInfo["SUM(stars)"];
    $totalRowCount = getCountOfTotalReviews();

    return sprintf("%.1f", $totalstarCount / $totalRowCount);
}

function getComments() {
    global $getComments ;
    return json_encode($getComments);
}