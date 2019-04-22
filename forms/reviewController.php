<?php
/**
 * Created by PhpStorm.
 * User: Jakob
 * Date: 25.03.2019
 * Time: 19:14
 */

include "DBConnect.php";

function getReviewTemplate($name, $code) {
    return '<h4>Rezension verfassen</h4>
                    <div onmousemove="review(event)" class="review-stars stars-outer">
                        <div class="stars-inner" onclick="rate()"></div>
                    </div>
                    <div class="mt-3 mb-4">
                        Ihre Bewertung: <span class="ml-2" id="UserRating">0</span> Sterne
                    </div>

                    <select id="reviewStars" name="review">
                        <option value="0.5">0.5</option>
                        <option value="1">1</option>
                        <option value="1.5">1.5</option>
                        <option value="2">2</option>
                        <option value="2.5">2.5</option>
                        <option value="3">3</option>
                        <option value="3.5">3.5</option>
                        <option value="4">4</option>
                        <option value="4.5">4.5</option>
                        <option value="5">5</option>
                    </select>

                    <label class="mt-3 ">So werden Sie anderen Kunden angezeigt</label>
                    <input id="review-name" type="text" name="review-name" class="form-control" value="'.$name.'">
                    <textarea name="kommentar" class="form-control mt-3" id="kommentar" rows="3" placeholder="Ihr Kommentar"></textarea>
                    <button id="sendReview" class="btn actionbtn mt-3">Rezension absenden</button>
                    <script>
                    $("#sendReview").click(function() {

                        let stars = $("#reviewStars").val();
                        let comment = $("#kommentar").val();
                        let name = $("#review-name").val();
                        $.ajax({
                           url: "forms/reviewProcessing",
                           type: "POST",
                           data: {
                               "stars": stars,
                               "comment": comment,
                               "name": name,
                               "code": "'.$code.'"
                           },
                           success: function(res) {
                               if(res) {
                                   $("#reviewvalid-area").remove();
                                   $("#review-feedback").html("<span class=\'text-success\' >Vielen Dank für ihre Rezension</span>");
                               }
                           }
                        });
                    });
                    let starRating = 5;
                    function getDoubleOfStarRating(rating, ratingsteps) {
                        return Math.ceil(rating / ratingsteps);

                    }
                    function starAnimation(rating, starsWidth) {
                        let ratingsteps = starsWidth / 10;
                        let starrating = getDoubleOfStarRating(rating, ratingsteps);
                        let ratingWidth = starrating * ratingsteps;
                        $(".stars-inner").width(ratingWidth);
                    }
                    //onmousemove event
                    function review(event) {
                        //ny82sm6d
                        let starsLeftSide = $(".review-stars").offset().left;
                        let starsWidth = $(".stars-outer").width();
                        let rating = event.pageX - starsLeftSide;

                        if(rating <= starsWidth) {
                            starAnimation(rating, starsWidth);
                            let HalfStarWidth = starsWidth / 10;
                            starRating = getDoubleOfStarRating(rating, HalfStarWidth) / 2;
                        }
                    }
                    //onclick event
                    function rate() {
                        $("#UserRating").text(starRating);
                        $("#reviewStars").val(starRating);
                    }
                </script>';
}

if($_POST) {
        //Review Validation
        $reviewValue = $_POST["reviewValue"];

        $dbconnect = new DBConnect();

        $codes = $dbconnect->connect()->query("SELECT * FROM reviews");

        $returnObjectTrue = array("isValid"=> true);
        $returnObjectFalse = array("isValid"=> false);

        $codeInValid = true;

        foreach($codes as $code) {
            if($reviewValue == $code['reviewcodes']) {

                $returnObjectTrue["getHTML"] = getReviewTemplate($code["Name"], $reviewValue);

                echo json_encode($returnObjectTrue);
                $codeInValid = false;
            }
        }

        if($codeInValid) {
            echo json_encode($returnObjectFalse);
        }

}
