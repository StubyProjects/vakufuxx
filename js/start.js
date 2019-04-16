
// jQuery
jQuery(document).ready(function($) {
    let quotes = ["Verlieren Sie nichts mehr im Staubsauger",
        "Ein innovativer Staubsaugeraufsatz",
        "Revolutionieren Sie ihr Staubsaugerlebnis",
        "Verloren gegangene Schätze ohne Risiko ansaugen",
        "Passt genau auf ihren Staubsauger"
    ];

    function getRandom() {
        return Math.round(Math.random() * quotes.length);
    }

    function hideAnimation() {
        $("#quotes").toggleClass("hideQuote");
    }

    function changeQuote() {
        $("#quotes").html(quotes[getRandom()]);
        setTimeout(hideAnimation, 5000);
        setTimeout(hideAnimation, 7000);
    }
    changeQuote();
    setInterval(changeQuote, 7000);

    //reviewscroll

    function scrollToReviewEvent() {
        if(screen.width > 1000) {
            $("html, body").animate({"scrollTop": 1000},800,"swing");
        } else {
            $("html, body").animate({"scrollTop": 800},800,"swing");
        }

    }

    if(location.hash === '#reviews') {
        scrollToReviewEvent();
    }

  //Scrollevent
    $(function(){

        $("a[href^='#']").click(function(e){
            e.preventDefault();

            let target = this.hash;
            let $target = $(target);

                let abstand_top = $target.offset().top - 80;

                $("html, body").animate({"scrollTop": abstand_top},800,"swing");
        });

        //Navigationanimation
        $(window).scroll(function() {
          
          let abstandtop = $(window).scrollTop();
          let navbar = $("#navigation");
          let navlist = $(".nav-link");

          if(abstandtop <= 150) {
            navbar.removeClass("nav-scroll");
            navlist.removeClass("scroll");
          }

          if(abstandtop >= 150) {
            navbar.addClass("nav-scroll");
            navlist.addClass("scroll");
          }
        });
    });
});
