if($(".cookie-banner").length) {
    $(".cookie-banner").slideDown("fast");
}

$("#cookiebtn").click(() =>{
    $.ajax({
        url: 'index.php',
        type: 'GET',
        data: 'accept-cookies',
        success: function() {
            if($(".cookie-banner").length) {
                $(".cookie-banner").slideToggle("fast");
            }
        }
    });
});

