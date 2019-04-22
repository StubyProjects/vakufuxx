$("#modalreview").iziModal({
    title: "Ihre Rezension",
    headerColor: '#FFC857',
    width: 1000,
    closeButton: true
});

$(document).on('click', '.trigger', function (event) {
    event.preventDefault();
    $('#modalreview').iziModal('open');
});

//retryValidation
function retryValidation() {
    $('#transactionCodeInput').css('display', 'block');
    $("#retrybutton").remove();
    $("#feedback-message").remove();
}

//ReviewCode Validation
$('#activateReview').click(function() {
    let reviewValue = $("#CodeValue").val();

    $.ajax({
        url: 'forms/reviewController.php',
        type: 'post',
        data: {
            'reviewValue': reviewValue
        },
        success: function (responseJSON) {
            let responseAsObj = JSON.parse(responseJSON);

            if(responseAsObj.isValid) {
                $("#transactionCodeInput").remove();
                $("#review-feedback").append('<span class="text-success" >Code akzeptiert</span>');
                $("#reviewvalid-area").append(responseAsObj.getHTML);
            } else {
                $("#transactionCodeInput").css('display', 'none');
                $("#review-feedback").append('<button id="retrybutton" onclick="retryValidation()" class="btn actionbtn">Erneut Versuchen</button>')
                                    .append('<div id="feedback-message" class="text-danger mt-3" >Code abgelehnt</div>');

            }
        }
    });

});
