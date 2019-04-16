//NAV LIST
window.addEventListener("load", function() {

    let navburger = document.getElementById("opennav");
    navburger.addEventListener("click", function() {

        let navslidein = document.getElementById("opennavlist");
        navslidein.classList.toggle("navslideleft");

        let navburgertransform = document.getElementById("opennav");
        navburgertransform.classList.toggle("active");

        let restpage = document.getElementById("dimrest");
        restpage.classList.toggle("dim-main");

    },false);

},false);

function hidenavlist() {
    let slideout = document.getElementById("opennavlist");
    slideout.classList.remove("navslideleft");
  
    let navburgertransform = document.getElementById("opennav");
    navburgertransform.classList.remove("active");
  
    let restpage = document.getElementById("dimrest");
    restpage.classList.toggle("dim-main");
  
    let navfixtop = document.querySelector(".navbar");
    navfixtop.classList.add("fixed-top");
  }

