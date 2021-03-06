<?php include "views/layout/header.php"; ?>
<?php include "forms/reviewEvaluation.php"; ?>
<?php if(isset($_GET["accept-cookies"])) {
    setcookie("accept-cookies", "true", time() + (60*60*24+365));
}

?>

<div id=dimrest class="nonavmain" onclick="hidenavlist()"></div>
<nav id="navigation" class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navlogo nav-link" href="#start">
      VAKUFUXX
    </a>

    <ul class="navbar-nav ml-auto responsenav">
      <li class="nav-item">
        <a href="#produkt" class="nav-link"> PRODUKT </a>
      </li>

      <li class="nav-item">
        <a href="#warum" class="nav-link"> WARUM</a>
      </li>

      <li class="nav-item">
        <a href="#shop" class="nav-link"> SHOP </a>
      </li>

      <li class="nav-item">
        <a href="#Kontakt" class="nav-link"> KONTAKT </a>
      </li>
    </ul>
  </div>

</nav>

<div class="burgernav">
  <div id="opennav" class="iconburger">
    <div class="burger"></div>
  </div>
</div>

<div id="opennavlist" class="menuopen navlistresponse">

   <ul class="navlist">
      <li>
        <a href="#produkt">
          PRODUKT
        </a>
      </li>
      <li>
        <a href="#warum">
          WARUM
        </a>
      </li>
      <li>
        <a href="#shop">
          SHOP
        </a>
      </li>
      <li>
        <a href="#Kontakt">
          KONTAKT
        </a>
      </li>
    </ul>

</div>

<!-- Start Bereich -->

<div id="start" class="hrlinevid container-fluid">

    <div class="backgroundwrap">
      <div class="videotext">
          <h1>VAKUFUXX</h1>
          <p class="slogan"> clean relaxed.</p>

          <p id="quotes" class="quotes bannertext"></p>
          <a href="#produkt"><button class="btn actionbtn">Mehr erfahren</button></a>
      </div>
    </div>

</div>

<div class="container-fluid mt-5">
    <div id="newsletter" class="container cardborder">
        <div class="p-5">
            <h1 class="text-left mt-3">Tragen Sie sich in unseren Newsletter ein!</h1>

            <p class="lead para">
                Hier werden wir Sie über News,
                Innovationen und neue Produktideen auf dem laufenden halten. <br/> Sie erhalten eine <b class="gilroy">kostenlose Beratung</b> und wir zeigen Ihnen detaillierte Anwendungsmöglichkeiten für den <b class="gilroy">VAKUFUXX</b>.
                <br/>Darüber hinaus erhalten Sie einen <b class="gilroy">15% Gutschein!</b>
            </p>


            <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
            <style type="text/css">
                #mc_embed_signup{background:#fff; clear:left;}
                /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
                   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
            </style>
            <div id="mc_embed_signup">
                <form action="https://web.us3.list-manage.com/subscribe/post?u=f23e4338f0227c42c1fa07a43&amp;id=23f9623fa8" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                    <div id="mc_embed_signup_scroll">

                        <div class="indicates-required"><span class="asterisk">*</span> Pflichtfeld</div>
                        <div class="mc-field-group">
                            <label for="mce-EMAIL">Email Adresse <span class="asterisk">*</span>
                            </label>
                            <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                        </div>
                        <div class="mc-field-group">
                            <label for="mce-FNAME">Vorname </label>
                            <input type="text" value="" name="FNAME" class="" id="mce-FNAME">
                        </div>
                        <div class="mc-field-group">
                            <label for="mce-LNAME">Nachname </label>
                            <input type="text" value="" name="LNAME" class="" id="mce-LNAME">
                        </div>


                        </div>	<div id="mce-responses" class="clear">
                            <div class="response" id="mce-error-response" style="display:none"></div>
                            <div class="response" id="mce-success-response" style="display:none"></div>
                        </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_f23e4338f0227c42c1fa07a43_23f9623fa8" tabindex="-1" value=""></div>
                        <div class="clear"><input type="submit" value="Abonnieren" name="subscribe" id="mc-embedded-subscribe" class="btn actionbtn"></div>
                    </div>
                </form>
            </div>
            <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
            <!--End mc_embed_signup-->

        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="container section-padding">
        <p class="bannertext quotes">Das sagen unsere Kunden</p>
        <p id="reviewCount" style="font-size: 1.7rem"> </p>

        <p id="comments" class="bannertext"  style="font-size: 1.4rem"></p>

        <div class="stars-outer">
            <div class="stars-inner">
            </div>
        </div>
        <span id="number-rating"></span>
        <div>
            <button class="trigger btn actionbtn mt-3 ">Rezension abgeben</button>
        </div>
        <div id="modalreview">
            <div>
                <div id="reviewForm" class="emailform container">
                    <h1 class="mb-5">
                        Ihre Kundenrezension
                    </h1>
                    <div id="transactionCodeInput">
                        <h5 class="mb-2">
                            Geben Sie ihren Transaktionscode ein
                        </h5>
                        <div class="form-group">
                            <input id="CodeValue" type="text" name="CodeValue" class="form-control" placeholder="Ihr Transaktionscode">
                        </div>
                        <button id="activateReview" class="btn actionbtn">Code aktivieren</button>
                    </div>
                    <div id="review-feedback" class="mt-3">
                    </div>
                    <div id="reviewvalid-area" class="mt-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Produktbeschreibung-->

<div id="produkt" class="container-fluid section-padding banner">
    <h1 class="text-center heading">
      VAKUFUXX: Der Staubsaugeraufsatz
    </h1>
</div>

<hr class="hrline">

<div class="container-fluid section-padding">
    <div class="container">
      <div class="row justify-content-between">

        <div class="col-12 hideonpc mb-5">
          <img src="Bilder/Produktbeschreibung/default.png" width="350" height="350">
        </div>

        <div class="col-sm-5 col-12 ml-2">
          <h1> Das Produkt </h1>
            <p class="lead para">
                Der <span class="gilroy">VAKUFUXX</span> ist ein einfacher Aufsatz für jeden handelsüblichen Staubsauger.

                  <ul class="lead para">
                      <li> <p> Filtert Staub und Schmutz aufgrund des angebrachten Gitters an der Vorderseite </p> </li>

                      <li> <p> Gegenstände wie Legosteine, Kontaktlinsen, Ohrringe etc. werden nicht eingesaugt! </p> </li>

                      <li> <p> Simpler und stabiler Aufbau </p> </li>
                  </ul>
            </p>
        </div>

        <div class="col-sm-5 hideonmobile mt-5">
          <img src="Bilder/Produktbeschreibung/default.png" width="350" height="350">
        </div>
      </div>
    </div>
</div>

<div class="container-fluid">
  <div class="container">
    <div class="row justify-content-between">

      <div class="col-12 hideonpc mb-5">
        <img class="imgborder" src="Bilder/Produktbeschreibung/3DPrint.jpg" width="300" height="200">
      </div>

      <div class="col-5 hideonmobile mt-5">
        <img class="imgborder" src="Bilder/Produktbeschreibung/3DPrint.jpg" width="400" height="300">
      </div>

      <div class="col-sm-5 col-12 mt-lg-3">
        <h1> Material und Fertigung </h1>
        <p class="lead para">
          Aktuell wird der <span class="gilroy">VAKUFUXX</span> per 3D-Druck hergestellt.
          <ul class="lead para">

            <li> <p>Elastisches Material sorgt für Stabilität </p> </li>

            <li> <p>Einfache, individuelle Herstellungsmöglichkeiten </p> </li>

            <li> <p>Verschiedene Farben, Größen und Gittervarianten erhältlich</p> </li>

          </ul>
        </p>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid section-padding mt-lg-5">
    <div class="container">
      <div class="row justify-content-between">

        <div class="col-12 hideonpc mb-5">
          <img src="Bilder/Produktbeschreibung/aufgesteckt.png" width="350" height="350">
        </div>

        <div class="col-sm-5 col-12 mt-5">
          <h1>Maße und Gewicht</h1>

            <ul class="lead para">
              <li> <p> Abmessungen:<br />
                      Länge: 50mm <br />
                      Breite: 34-42mm
                  </p> </li>

              <li> <p> Gewicht: 14-17g </p> </li>

              <li> <p> Innendurchmesser: 32-40mm </p> </li>

            </ul>
          </p>
        </div>

        <div class="col-5 hideonmobile">
          <img src="Bilder/Produktbeschreibung/aufgesteckt.png" width="350" height="350">
        </div>


      </div>

    </div>

</div>

<hr>

<!-- Warum -->

<div id="warum" class="container-fluid section-padding banner">
  <h1 class="text-center heading">
    Warum VAKUFUXX?
  </h1>
</div>

<hr class="hrline">

<div class="container-fluid openup section-padding">
    <div class="container fitter">

        <div class="row rowsmart cardborder">
          <div class="col-lg-7 col-12 picturefit">
            <img class="rounded-left img-fluid" src="Bilder/warum1.jpg" width="650" height="350" alt="Responsive image">
          </div>

          <div class="col-lg-5 col-12 benefit">
            <h1>Nichts mehr verlieren!</h1>
            <p class="lead">Gegenstände, die nicht in den Staubsauger gehören, werden auch nicht eingesaugt
            </p>
          </div>
        </div>

        <div class="row rowsmart cardborder">

          <div class="col-lg-5 col-12 benefit">
            <h1>Entspannter Staubsaugen!</h1>
            <p class="lead">Bücken Sie sich nicht mehr nach ihren Schätzen, einfach aufsaugen und bequem vom <span class="gilroy">VAKUFUXX</span> entfernen.
            </p>
          </div>

          <div class="col-lg-7 col-12 picturefit">
              <video class="rounded-right embed-responsive" loop autoplay muted>
                  <source src="Bilder/relaxed.mp4" type="video/mp4">
              </video>
          </div>

        </div>

        <div class="row rowsmart cardborder">

            <div class="col-lg-7 col-12 picturefit">
                <video class="rounded-left embed-responsive" loop autoplay muted>
                    <source src="Bilder/passt.mp4" type="video/mp4">
                </video>
            </div>

            <div class="col-lg-5 col-12 benefit">
                <h1>Passt genau!</h1>
                <br />
                <p class="lead">Konfigurieren Sie ihren <span class="gilroy">VAKUFUXX</span> im Shop, oder geben Sie ihr Modell an und wir fertigen einen passgenauen Aufsatz für Sie!
                </p>
            </div>

        </div>

        <div style="margin-bottom: 0" class="row rowsmart cardborder">

          <div class="col-lg-5 col-12 benefit">
            <h1>Verstopftes Gitter?</h1>
            <br><p class="lead">Falls das Gitter verstopft, einfach mit dem Staubsauger absaugen.<br/>
                  Dabei sind verschiedene Gittergrößen erhältlich, wobei bei grober Gittergröße dieses seltener verstopft
              </p>
          </div>

            <div class="col-lg-7 col-12 picturefit">
                <video class="rounded-right embed-responsive" loop autoplay muted>
                    <source src="Bilder/gitter.mp4" type="video/mp4">
                </video>
            </div>

        </div>

        <div class="container vorteile">
            <h1>Ihre Vorteile</h1>
            <div class="row vorteile">

                <div class="col-12 col-md picturefit">
                    <div class="media">
                        <img class="icon-vorteile" src="Bilder/warum/leicht.png" alt="einfach-icon">
                        <div class="media-body">
                            <h5>Sehr einfache Handhabung</h5>
                            <p>Der <span class="gilroy">VAKUFUXX</span> ist sehr einfach anwendbar.<br />
                                Einfach aufstecken und staubsaugen.</p>
                        </div>
                    </div>

                </div>


                <div class="col-12 col-md picturefit">
                    <div class="media">
                        <img class="icon-vorteile" src="Bilder/warum/konfiguriert.png" alt="einfach-icon">
                        <div class="media-body">
                            <h5>Perfekt konfiguriert</h5>
                            <p>Angepasst an ihren Staubsauger und ihre Staubsaugsituation - frisch für Sie aus dem <span class="gilroy">3D Drucker</span>.</p>
                        </div>
                    </div>

                </div>

            </div>
            <div class="row vorteile">

                <div class="col-12 col-md picturefit">
                    <div class="media">
                        <img class="icon-vorteile" src="Bilder/warum/stabil.png" alt="einfach-icon">
                        <div class="media-body">
                            <h5>Widerstandsfähiges Material</h5>
                            <p>Dank dem elastischen Material, ist der Aufsatz praktisch unzerstörbar. <br />
                                Dadurch hält der Aufsatz auch größerem Druck stand.
                            </p>
                        </div>
                    </div>

                </div>

                <div class="col-12 col-md picturefit">
                    <div class="media">
                        <img class="icon-vorteile" src="Bilder/warum/kundenservice.png" alt="einfach-icon">
                        <div class="media-body">
                            <h5>Kundenservice</h5>
                            <p>Egal ob Sie Fragen zur Bestellung, Lieferprobleme oder andere Anliegen haben. <br />
                                <span class="gilroy">Kontaktieren</span> Sie uns einfach!</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>



    </div>
</div>

<!-- SHOP -->

<div class="container-fluid section-padding banner">
<h1 class="text-center heading">
    SHOP
  </h1>
</div>

<hr class="hrline">

<div id="shop" class="container-fluid section-padding">

  <div class="container cardborder">

    <div class="row nomargin">

      <div  class="ani col-md-6 col-12">

        <div class="row nomargin">

          <div class="col-md-9 col-12 productview">
            <img id="productimage" src="Bilder/Shop/schwarz/standard/standart_schwarz.png" width="345" height="345">
          </div>

          <div id="productimgplate" class="col-md-3 col-12">
            <ul class="productpiclist">
              <li>
                <img onclick="viewchange({view: 'standart', gitter: true});" id="standartbox" class="standartbox imageborder" src="Bilder/Shop/schwarz/standard/standart_schwarz.png" width="60" height="60">
              </li>
              <li>
                <img onclick="viewchange({view: 'front', gitter: true});" id="frontbox" class="frontbox imageborder" src="Bilder/Shop/schwarz/standard/front_schwarz.png" width="60" height="60">
              </li>
              <li>
                <img onclick="viewchange({view: 'seite', gitter: false});" id="sidebox" class="sidebox imageborder" src="Bilder/Shop/schwarz/seite_schwarz.png" width="60" height="60">
              </li>
              <li>
                <img onclick="viewchange({view: 'aufgesteckt', gitter: false});" id="backbox" class="backbox imageborder" src="Bilder/Shop/schwarz/aufgesteckt_schwarz.png" width="60" height="60">
              </li>
            </ul>

          </div>

        </div>

      </div>

      <div class="ani col-md-6 col-12 productconfig">
          <div class="row itemheading">
              <div class="col-6">
                  <h1 style="margin-top: 30px">VAKUFUXX</h1>
              </div>

              <!-- Modal -->
              <div class="modal fade" id="modal">
                  <div class="modal-dialog modal-dialog-centerot" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title">Ihr eigener VAKUFUXX</h5>
                              <button type="button" class="close" id="closemodal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <p>
                                  Haben Sie gewisse Vorstellungen wie ihr VAKUFUXX aussehen soll, oder passen die hier aufgeführten Größen nicht auf ihren Staubsauger ?
                              </p>
                              <hr>
                              <p>
                                  Kontaktieren Sie uns und nennen Sie uns ihre Bestellkonfiguration. <br/> Wir werden uns darum kümmern!
                                  <br/>
                              <hr>
                              <a href="#Kontakt"> <button id="contact" class="btn actionbtn mt-3"> Kontakt </button></a>
                              </p>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="col-6">
                  <p id="disprice" class="gilroyL">9.99 €</p>
                  <p class="text-success shipping"> Versandkostenfrei </p>
              </div>

          </div>
          <h1 class="warranty"> 60 Tage Geld zurück Garantie </h1>
          <div class="shopline"></div>

          <div class="productproperty">
              <h1 class="propertyheading">
                  Beschreibung
              </h1>
              <p id="productdescription">
                  Der Vakufuxx mit grobem Gitter ist top geeignet für enstpanntes Staubsaugen im Wohnzimmer:
                  Das Gitter verstopft nicht und Sie bücken sich nach nichts mehr!<br/> Gut geeignet für dicke Staubklumpen.
              </p>
          </div>


          <div class="productproperty">
              <h1 id="dia" class="propertyheading">
                  Haben Sie einen Rabattcode ?
              </h1>

              <input class="form-control" type="text" id="discountCode" name="discount" placeholder="Ihr Rabattcode">
              <div id="codefeedback" class="invalid-feedback">
                  Dieser Code ist ungültig
              </div>

              <div class="mt-2" style="text-align: start">
                  <div id="checkDiscount" class="btn actionbtn">Rabattcode aktivieren</div>
                  <a class="gilroyL" href="#newsletter">So bekomme ich einen Rabattcode</a>
              </div>
          </div>

	    <div class="shopline"></div>

          <form id="payment" action="checkout.php" method="post">

              <div class="row">
                  <div class="col-lg-7">
                      <div style="" class="product-color productproperty">
                          <h1 class="propertyheading">
                              Wählen Sie eine Farbe
                          </h1>
                          <div id="color-choose" class="color-choose">
                              <div>
                                  <input data-image="schwarz" type="radio" id="schwarz" name="color" value="schwarz" checked>
                                  <label onclick="colorchange('schwarz');" for="schwarz"><span></span></label>
                              </div>
                              <div>
                                  <input data-image="grau" type="radio" id="grau" name="color" value="grau">
                                  <label onclick="colorchange('grau');" for="grau"><span></span></label>
                              </div>
                              <div>
                                  <input data-image="blau" type="radio" id="blau" name="color" value="blau">
                                  <label onclick="colorchange('blau');" for="blau"><span></span></label>
                              </div>
                              <div>
                                  <input data-image="grün" type="radio" id="grün" name="color" value="grün">
                                  <label onclick="colorchange('grün');" for="grün"><span></span></label>
                              </div>
                              <div>
                                  <input data-image="gelb" type="radio" id="gelb" name="color" value="gelb">
                                  <label onclick="colorchange('gelb');" for="gelb"><span></span></label>
                              </div>
                              <div>
                                  <input data-image="rot" type="radio" id="rot" name="color" value="rot">
                                  <label onclick="colorchange('rot');" for="rot"><span></span></label>
                              </div>
                              <div>
                                  <input data-image="weiß" type="radio" id="weiß" name="color" value="weiß">
                                  <label onclick="colorchange('weiß');" for="weiß"><span></span></label>
                              </div>
                          </div>
                      </div>
                  </div>

                 <div class="col-lg-5">
                     <div class="productproperty">
                         <h1 class="propertyheading">
                             Gittergröße
                         </h1>
                         <select class="custom-select my-1 mr-sm-2" id="gittergröße" name="gittergröße">
                             <option value="standard">standard</option>
                             <option value="fein">fein</option>
                             <option value="extrafein">extrafein</option>
                         </select>
                     </div>
                 </div>
              </div>

              <input type="hidden" id="priceAfterDiscount" name="priceAfterDiscount" value="1">

              <input type="hidden" id="validDiscountCode" name="validDiscountCode" value="">

              <div class="row">
                  <div class="col-lg-7">
                      <div class="secondrow">
                          <h1 class="propertyheading">
                              Ihr Staubsaugermodell<span class="tooltiptext">Bitte tragen Sie hier ihr Modell ein und wir werden ihnen einen passenden Aufsatz zukommen lassen.</span>
                          </h1>
                          <input type="text" name="modell" class="form-control" id="modell" placeholder="Modell">
                          <div id="modellfeedback" class="invalid-feedback">
                              Bitte geben Sie ihr Modell ein.
                          </div>
                      </div>
                  </div>

                <div class="col-lg-5">
                    <div class="secondrow">
                        <h1 class="propertyheading">
                            Anzahl
                        </h1>
                        <select class="custom-select my-1 mr-sm-2" id="anzahl" name="anzahl">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                        </select>
                    </div>
                </div>
              </div>


              <div class="productproperty">
                  <h1 id="dia" class="propertyheading">
                     Innendurchmesser (mm)<span class="tooltiptext">Dieser enspricht dem Außendurchmesser ihres Staubsaugerrohrs</span>
                  </h1>
                  <select class="custom-select my-1 mr-sm-2" id="durchmesser" name="durchmesser">
                      <option value="">keine Angabe</option>
                      <option value="32 mm">32</option>
                      <option value="33 mm">33</option>
                      <option value="34 mm">34</option>
                      <option value="35 mm">35</option>
                      <option value="36 mm">36</option>
                      <option value="37 mm">37</option>
                      <option value="38 mm">38</option>
                      <option value="39 mm">39</option>
                      <option value="40 mm">40</option>
                  </select>
              </div>

              <div class="productproperty">
                  <button class="actionbtn btn" type="submit"> ZUR KASSE </button> <span id="disclaimer">?</span>
              </div>

        </form>
        <!--/form-->


      </div>

    </div>

  </div>

</div>

<!-- Kontakt -->

<div id="Kontakt" class="container-fluid section-padding banner">
  <h1 class="text-center heading">
    KONTAKT
  </h1>
</div>

<div class="container section-padding">

    <div class="emailform container cardborder">

        <h1 class="mb-5">
          Haben Sie Fragen oder Anregungen?
        </h1>

        <form id="emailformular" action="forms/contactform.php"  method="post" novalidate>

          <div class="form-group">
            <label>Ihr Name</label>
            <input type="text" name="name" class="form-control" id="Name" aria-describedby="emailHelp" placeholder="Name">

            <div id="namefeedback" class="invalid-feedback">

            </div>
          </div>

          <div class="form-group">
            <label>Ihre E-Mail Adresse</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="E-Mail">

            <div id="emailfeedback" class="invalid-feedback">
              Bitte geben Sie eine vorhandene E-Mail Adresse ein.
            </div>
          </div>

          <div class="form-group">
              <textarea name="text" class="form-control" id="text" rows="3" placeholder="Ihre Nachricht"></textarea>
              <div id="textfeedback" class="invalid-feedback">
                Text sollte mindestens 10 Zeichen enthalten.
              </div>
          </div>

          <button type="submit" class="btn actionbtn">Senden</button>
          <div id="msgdiv" class="mt-3">

          </div>

        </form>

      </div>

</div>
<?php
if(!isset($_COOKIE["accept-cookies"])) { ?>
    <div class="container-fluid cookie-banner">
        <div class="cookie-container">
            <p> Vakufuxx.de benutzt Cookies um bestmögliche Funktionalität bieten zu können.<a href="Datenschutz"> Mehr erfahren </a></p>
            <a id="cookiebtn" style="color: #333333" class="actionbtn btn mt-3"> Verstanden </a>
        </div>
    </div>
<?php } ?>


<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/start.js"></script>
<script src="js/navigation.js"></script>
<script src="js/shopUI.js"></script>
<script src="js/emailform.js"></script>
<script src="js/cookiebanner.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/js/iziModal.min.js"></script>
<script src="js/reviewVerification.js"></script>
<script>

    let discountCode = $("#discountCode");

    $("#checkDiscount").click(function() {
        $.ajax({
            url: 'discountChecker.php',
            type: 'post',
            data: {
                'discountCode': discountCode.val()
            },
            success: function(validCode) {

                console.log(validCode);

                if(discountCode.val() === validCode) {

                    discountCode.addClass("is-valid");
                    discountCode.removeClass("is-invalid");
                    $("#codefeedback").css("display", "none");

                    $("#priceAfterDiscount").val(0.85);

                    $("#validDiscountCode").val(validCode);

                    let quantity = $('#anzahl').val();
                    let price = quantity * 6;

                    $('#disprice').text(Number((price + 3.99) * .85).toFixed(2) + " €");

                } else {

                    discountCode.removeClass("is-valid");
                    discountCode.addClass("is-invalid");
                    $("#codefeedback").css("display", "block");

                }
            }
        });
    });

    let rating = <?php echo getEvaluation() ?>;
    let reviewCount = <?php echo getCountOfTotalReviews() ?>;
    let comments = <?php echo getComments() ?>;
    let commentCount = comments.length;
    const maxStars = 5;

    function getRandomCommentIndex() {
        return Math.floor(Math.random() * commentCount);
    }
    function getComment() {
        let randomIndex = getRandomCommentIndex();
        let comment = comments[randomIndex]["comment"];
        let name = comments[randomIndex]["Name"];
        return comment+" - " + name;
    }

    function hideAnimation() {
        $("#comments").toggleClass("hideQuote");
    }

    function changeQuote() {
        $("#comments").html(getComment());
        setTimeout(hideAnimation, 13000);
        setTimeout(hideAnimation, 15000);
    }
    changeQuote();
    setInterval(changeQuote, 15000);




    //returns the ratingspercentage for css width
    function getRating() {

        let starPercentage = (rating/maxStars) * 100;

        //round to nearest 10;
        starPercentageRounded = `${Math.round(starPercentage / 10) * 10}%`;
        return starPercentageRounded;

    }

    document.querySelector(".stars-inner").style.width = getRating();

    document.querySelector("#number-rating").innerHTML = rating + " Sterne";

    document.querySelector("#reviewCount").innerHTML = reviewCount + " Kundenrezension(en)";


</script>

<?php include "views/layout/footer.php"; ?>
