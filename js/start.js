
// jQuery
jQuery(document).ready(function($) {
    let quotes = ["Verlieren Sie nichts mehr im Staubsauger",
        "Ein innovativer Staubsaugeraufsatz",
        "Revolutionieren Sie ihr Staubsaugerlebnis",
        "Verloren gegangene Schätze ohne Risiko ansaugen",
        "Lösen Sie das Problem bevor es passiert",
        "Passt genau auf ihren Staubsauger"
    ];

    function hideAnimation() {
        $("#quotes").toggleClass("hideQuote");
    }

    //changes quote on start page, fades out after 5 seconds and fades back in after 7 seconds while changeQuote is getting executed
    function setQuote(quoteNumber) {
        $("#quotes").html(quotes[quoteNumber]);
        setTimeout(hideAnimation, 5000);
        setTimeout(hideAnimation, 7000);
    }

    //initial execution of setQuote
   setQuote(0);
    (function changeQuote (i) {
        //After 7 seconds the quote gets changed in a recursive call dependent on the size of the quote array.
        //It restarts after the last element of the array is shown
        setTimeout(function () {
            //recursive call of setQuote
            setQuote(i);
            i++;
            //while i is within the range of the array the changeQuote function gets called till the last element is shown
            if(i < quotes.length) {
                changeQuote(i);
            } else {
                //after the last quote shows the recursion will start over
                changeQuote(0);
            }
        }, 7000);
        //parameter 1 is the first index because 0 already is passed above and in the else block.
    })(1);

    //newsletterscroll

    function scrollToReviewEvent() {
        if(screen.width > 1000) {
            $("html, body").animate({"scrollTop": 1300},800,"swing");
        } else {
            $("html, body").animate({"scrollTop": 800},800,"swing");
        }
    }

    if(location.hash === '#newsletter') {
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
