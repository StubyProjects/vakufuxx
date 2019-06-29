let currentColor = "schwarz";
let currentGitter = "standard";

let changeImageList = function() {
    let imagebox = document.querySelectorAll(".productpiclist li img");
    imagebox[0].src = `Bilder/Shop/${currentColor}/${currentGitter}/standart_${currentColor}.png`;
    imagebox[1].src = `Bilder/Shop/${currentColor}/${currentGitter}/front_${currentColor}.png`;
    imagebox[2].src = `Bilder/Shop/${currentColor}/seite_${currentColor}.png`;
    imagebox[3].src = `Bilder/Shop/${currentColor}/aufgesteckt_${currentColor}.png`;
}

let colorchange = function(color) {
    currentColor = color;
    //changes the product image
    let img = document.getElementById("productimage");
    img.src = `Bilder/Shop/${color}/${currentGitter}/standart_${color}.png`;

    //changes the productpicturelist
    changeImageList();
}

//@param viewControl Object als Ansichtkontrolle
let viewchange = function(viewControl) {
    let img = document.getElementById("productimage");
    if(viewControl.gitter) {
        img.src =`Bilder/Shop/${currentColor}/${currentGitter}/${viewControl.view}_${currentColor}.png`;
    } else {
        img.src =`Bilder/Shop/${currentColor}/${viewControl.view}_${currentColor}.png`;
    }
}


let descriptionObj = {
    fein: "Der Vakufuxx mit feinem Gitter ist top geeignet fürs Kinderzimmer oder um Kleinteile unter dem Sofa hervorzuholen. Legosteine und Ohrringe werden in Zukunft nicht mehr im Sauger landen.",
    standard: "Der Vakufuxx mit grobem Gitter ist top geeignet für enstpanntes Staubsaugen im Wohnzimmer: Das Gitter verstopft nicht und Sie bücken sich nach nichts mehr!<br/> Gut geeignet für dicke Staubklumpen.",
    extrafein: "Der Vakufuxx mit extrafeinem Gitter ist top geeignet für Modellbau. Kleinteile verlieren Sie hier garantiert nicht!"
}


let gitterControl = document.getElementById("gittergröße");

gitterControl.onchange = () => {

    currentGitter = gitterControl.value;
    let img = document.getElementById("productimage");
    img.src = `Bilder/Shop/${currentColor}/${currentGitter}/standart_${currentColor}.png`;
    changeImageList();

    let description = document.getElementById("productdescription");
    description.innerHTML = descriptionObj[currentGitter];

}

jQuery(document).ready(function($) {

  $('#disclaimer').click(function() {
    $("#modal").css("display", "block");
    $("#modal").addClass("show");
    $("body").addClass("disableScroll");
  });

  $('#closemodal').click(() => {
    $("#modal").css("display", "none");
    $("#modal").removeClass("show");
    $("body").removeClass("disableScroll");
  });

  $('#contact').click(() => {
    $("#modal").css("display", "none");
    $("#modal").removeClass("show");
    $("body").removeClass("disableScroll");
  });

  $('.color-choose input').on('click', function() {
    $('.active').removeClass('active');
    $(this).addClass('active');
  });

  //Preis = Startpreis + 4*(anzahl - 1) -> Mengenrabattberechung

  $('#anzahl').change(function() {
    let quantity = $('#anzahl').val();

    let discount = $('#priceAfterDiscount').val();

    let price = quantity * 6;

    $('#disprice').text(Number((price + 3.99) * discount).toFixed(2) + " €");
  });
});
