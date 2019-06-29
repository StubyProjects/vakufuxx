
<?php
//header("Content-Security-Policy: script-src 'self' 'unsafe-inline' https://www.google-analytics.com https://js.braintreegateway.com https://www.paypalobjects.com https://www.paypal.com https://www.googletagmanager.com");

if($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: index');
    exit();
}
/**
 * Es fehlt noch:
 * 2. Amount Übergabe
 * 3. Konfigurationsübergabe
 * 4. E-Mail Logik
 * 5. Benutzerfreundliche Success-Message
 */?>
<?php
include "views/layout/header.php";
require "forms/boot.php";
?>

<link rel="stylesheet" type="text/css" href="css/successmodal.css">
<script type="text/javascript" src="https://js.braintreegateway.com/web/dropin/1.14.0/js/dropin.min.js"></script>
<!-- Load PayPal's checkout.js Library. -->
<script type="text/javascript" src="https://www.paypalobjects.com/api/checkout.js" data-version-4 ></script>
<!-- Load the client component. -->
<script type="text/javascript" src="https://js.braintreegateway.com/web/3.39.0/js/client.min.js"></script>
<!-- Load the PayPal Checkout component. -->
<script type="text/javascript" src="https://js.braintreegateway.com/web/3.39.0/js/paypal-checkout.min.js"></script>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5LR7VNP"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<nav class="navbar navbar-expand-lg nav-scroll">
    <div class="container">
        <a class="navlogorecht" href="index">
            VAKUFUXX
        </a>
    </div>
</nav>

<?php

$farbe = $_POST["color"];

$modell = $_POST["modell"];

$durchmesser = $_POST["durchmesser"];

$modellmitdurchmesser = $modell." ".$durchmesser;

$anzahl = $_POST["anzahl"];

$gitter = $_POST["gittergröße"];

$calculatePrice = $anzahl * 6;

$preis = $calculatePrice + 3.99;

if(true) {

    $preis = 8.49;


}

?>

<div class="container-fluid section-padding mt-5">

    <div class="container cardborder">
        <h1 style="padding-top: 30px" class="itemheading">
            IHRE BESTELLUNG
        </h1>

        <div class="shopline"></div>
        <!-- MODAL -->
        <div id="transaction" class="modal fade">

            <div class="modal-dialog modal-dialog-centered modal-confirm" role="document">

                <div class="modal-content">

                    <div class="modal-header">

                        <div class="icon-box">
                            <i class="fas fa-check"></i>
                        </div>

                    </div>

                    <div class="modal-body text-center">
                        <h4>Vielen Dank!</h4>
                        <div class="mt-3 successmsg">

                        </div>

                        <a href="index" style="color: #333333" class="actionbtn btn">
                            Weiter
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <form id="payment" action="checkout.php" method="post">
                    <div class="product-color productproperty">
                        <h1 class="propertyheading">
                            Ihre Farbe
                        </h1>
                        <div class="color-choose">
                            <div>
                                <input data-image="<?php echo $farbe ?>" type="radio" id="<?php echo $farbe ?>" name="color" value="<?php echo $farbe ?>" checked>
                                <label for="<?php echo $farbe ?>"><span></span></label>
                                <input class="form-control" type="text" id="farbecheck" name="farbe" disabled="disabled" value="<?php echo $farbe ?>">
                            </div>
                        </div>
                    </div>

                    <div class="productproperty">
                        <h1 id="dia" class="propertyheading">
                            Ihr Modell
                        </h1>
                        <input class="form-control" type="text" id="modell" name="modell" disabled="disabled" value="<?php echo $modellmitdurchmesser ?>">
                    </div>

                    <div class="productproperty">
                        <h1 id="dia" class="propertyheading">
                            Anzahl
                        </h1>
                        <input class="form-control" type="text" id="anzahl" name="anzahl" disabled="disabled" value="<?php echo $anzahl ?>">
                    </div>

                    <div class="productproperty">
                        <a href="index#shop" style="color: #333333" class="actionbtn btn">
                            Zurück zur Konfiguration
                        </a>
                    </div>
            </div>

            <div class="col-md-6">
                <div class="productproperty">
                    <h1 class="propertyheading">
                        Gitter:
                    </h1>
                    <input class="form-control" style="width: 40%"  type="text" id="gitter" name="gitter" disabled="disabled" value="<?php echo $gitter ?>">
                </div>

                <div class="productproperty">
                    <h1 class="propertyheading">
                        Gesamtpreis: <p class="display-4 mt-2"><?php echo $preis ?> €</p>
                        <small class="shipping text-success"> inkl. Mehrwertsteuer und Versandkosten
                        </small>
                        <br />

                    </h1>
                </div>

                <div class="productproperty">
                    <div id="paypal-button"> <div class="spinner buttonload"></div> </div>
                </div>

                <div class="productproperty">
                    <p style="font-size: .9em">
                        Hiermit akzeptieren Sie, dass Sie unsere <a href="https://vakufuxx.de/AGB">AGBs</a> und <a href="https://vakufuxx.de/Datenschutz">Datenschutzbestimmungen</a> gelesen haben.
                        <br/>Hinweis: Ihre Lieferdaten werden über PayPal an uns vermittelt.
                        Andere Zahlungsanbieter werden bald hinzugefügt!
                    </p>
                </div>
            </div>
            <!--Loader-->

            <div class="overlays">
                <div class="spinner"></div>
            </div>

            </form>
            <!--/form-->
        </div>

    </div>

</div>

</div>

<script src="js/jquery-3.1.1.min.js"></script>

<script type="text/javascript">

    jQuery(document).ready(function($) {

        let client_token = "<?php echo($gateway->ClientToken()->generate());?>";

        let loaderOff = () => {
            $(".buttonload").remove();
        };

        let transactionLoader = () => {
            $(".overlays").css("display", "block");
            $(".spinner").css("position", "absolute");
        };

        let collectTransactionData = (transactionID) => {
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({
                'event': 'purchase',
                'transactionId': transactionID,
                'transactionTotal': <?php echo $preis ?>,
                'transactionProducts': [{
                    'sku': '1',
                    'name': 'Vakufuxx <?php echo $farbe?>' ,
                    'price': 9.99,
                    'quantity': <?php echo $anzahl ?>
                }]
            });
        };

        //Konfiguration
        let anzahl = $('#anzahl').val();
        let farbe = $('#<?php echo $farbe ?>').val();
        let modell = $("#modell").val();
        let gitter = $("#gitter").val();
        let price = <?php echo $preis ?>;


        braintree.client.create({
            authorization: client_token,
        }, function (clientErr, clientInstance) {

            //Loader an
            $(".buttonload").css("display", "block");

            // Stop if there was a problem creating the client.
            // This could happen if there is a network error or if the authorization
            // is invalid.
            if (clientErr) {
                console.error('Error creating client:', clientErr);
                return;
            }

            // Create a PayPal Checkout component.
            braintree.paypalCheckout.create({
                client: clientInstance
            }, function (paypalCheckoutErr, paypalCheckoutInstance) {
                // Stop if there was a problem creating PayPal Checkout.
                // This could happen if there was a network error or if it's incorrectly
                // configured.
                if (paypalCheckoutErr) {
                    console.error('Error creating PayPal Checkout:', paypalCheckoutErr);
                    return;
                }
                loaderOff();
                // Set up PayPal with the checkout.js library
                paypal.Button.render({
                    env: 'production' , // or  'sandbox',
                    commit: true,
                    style: {
                        color: 'gold',
                        size: "responsive",
                        shape: "rect",
                        label: "pay",
                        tagline: false
                    },
                    payment: function () {
                        return paypalCheckoutInstance.createPayment({
                            flow: 'checkout', // Required
                            amount: price, // Required
                            currency: 'EUR', // Required
                            enableShippingAddress: true,
                            shippingAddressEditable: true,
                            locale: 'de_DE'
                        });
                    },

                    onAuthorize: function (data) {
                        let info = {
                            'amount': price,
                            'anzahl': anzahl,
                            'farbe': farbe,
                            'gitter': gitter,
                            'modell': modell
                        };

                        return paypalCheckoutInstance.tokenizePayment(data, function (err, payload) {
                            //LoaderAnimation
                            transactionLoader();
                            $.ajax({
                                url: 'paymentserver.php',
                                type: 'POST',
                                data: {
                                    'payload': payload,
                                    'configdata': info,
                                },
                                success: function(res) {
                                    collectTransactionData(data.orderID);
                                    //zweite Bezahlmöglichkeit verhindern
                                    paypalCheckoutInstance.teardown(function () {
                                        //Loader entfernen
                                        $(".overlays").css("display", "none");

                                        //Modal mit Successmessage
                                        $("#transaction").css("display", "block").addClass("show");
                                        $("body").addClass("disableScroll");
                                        $('.successmsg').html(res);
                                    });

                                }
                            });
                        });
                    },

                    onCancel: function (data) {
                        console.log('checkout.js payment cancelled', JSON.stringify(data, 0, 2));
                    },

                    onError: function (err) {
                        console.error('checkout.js error', err);
                    }
                }, "#paypal-button").then(function () {

                });

            });

        });
    });

</script>

<?php
include "views/layout/footer.php";
?>