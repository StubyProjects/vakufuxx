<?php
/**
 * Created by PhpStorm.
 * User: Jakob
 * Date: 30.12.2018
 * Time: 17:55
 */


function getShippingDate() {
    setlocale(LC_ALL,"de_DE.utf8");
    $moment = time();
    $fourdayslater = $moment + (60*60*24*4);
    $shippingdate = strftime("%A, %e. %B" ,$fourdayslater);

    //Wenn Sonntag ist wird Montag ausgegeben
    if(date('N', $fourdayslater) == 7) {
        return strftime("%A, %e. %B" ,$fourdayslater + (60*60*24));
    } else {
        return $shippingdate;
    }
}


function processEmail($details, $configdata, $transactionID) {
    $firstName = $details["firstName"];
    $lastName = $details["lastName"];
    $streetAddress = $details["shippingAddress"]["line1"];
    $postalCode = $details["shippingAddress"]["postalCode"];
    $city = $details["shippingAddress"]["city"];

    $amount = $configdata["amount"];

    $preisOhneUSTunformatiert = round( $amount / 1.19, 2);
    $preisOhneUST = sprintf("%.2f", $preisOhneUSTunformatiert);
    
    $USt = round($amount * (1-1/1.19), 2);
    $anzahl = $configdata["anzahl"];
    $farbe = $configdata["farbe"];
    $modell = $configdata["modell"];
    $gitter = $configdata["gitter"];


    return $emailTemplate =
        '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Billing e.g. invoices and receipts</title>

    <style>img {
        max-width: 100%;
    }
    body {
        -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em;
    }
    body {
        background-color: #f6f6f6;
    }
    @media only screen and (max-width: 640px) {
        body {
            padding: 0 !important;
        }
        h1 {
            font-weight: 800 !important; margin: 20px 0 5px !important;
        }
        h2 {
            font-weight: 800 !important; margin: 20px 0 5px !important;
        }
        h3 {
            font-weight: 800 !important; margin: 20px 0 5px !important;
        }
        h4 {
            font-weight: 800 !important; margin: 20px 0 5px !important;
        }
        h1 {
            font-size: 22px !important;
        }
        h2 {
            font-size: 18px !important;
        }
        h3 {
            font-size: 16px !important;
        }
        .container {
            padding: 0 !important; width: 100% !important;
        }
        .content {
            padding: 0 !important;
        }
        .content-wrap {
            padding: 10px !important;
        }
        .invoice {
            width: 100% !important;
        }
    }
    </style></head>

<body style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em; margin: 0;" bgcolor="#f6f6f6">

<table class="body-wrap" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; margin: 0;" bgcolor="#f6f6f6">
    <tr style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
        <td class="container" width="600" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
            <div class="content" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                <table class="main" width="100%" cellpadding="0" cellspacing="0" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; margin: 0; border: 1px solid #e9e9e9;" bgcolor="#fff">
                    <tr style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                        <td class="content-wrap aligncenter" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0; padding: 20px;" align="center" valign="top">
                            <div class="header" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; margin: 0 0 20px;">
                                <a href="https://vakufuxx.de" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; color: #FFC857; text-decoration: none; margin: 0;">
                                    <img alt="Vakufuxx.de" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; max-width: 100%; margin: 0;" src="https://vakufuxx.de/Bilder/Logo/Logo2.png" width="200px" height="50px" align="left" />

                                </a>
                            </div>
                            <table width="100%" cellpadding="0" cellspacing="0" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                <tr style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                    <td class="content-block invoice" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; width: 80%; margin: 40px auto; padding: 0 0 20px;" align="left" valign="top">
                                        <h1 class="aligncenter" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif; box-sizing: border-box; font-size: 32px; color: #000; line-height: 1.2em; font-weight: 500; margin: 40px 0 0;" align="center">
                                            Vielen Dank für ihre Bestellung!
                                        </h1>
                                    </td>
                                </tr>
                               
                                <tr style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                    <td class="content-block aligncenter" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0; padding: 0 0 20px;" align="center" valign="top">
                                        <table class="invoice" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; text-align: left; width: 80%; margin: 40px auto;">
                                            <tr style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0; padding: 5px 0;" valign="top">
                                                    <h4 style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; font-weight: 600; margin: 0;">Die Sendung geht an:</h4>
                                                    '.$firstName.' '.$lastName.'
                                                    <br style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;" />
                                                    '.$streetAddress.'
                                                    <br style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;" />
                                                    '.$postalCode.'
                                                    <br style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;" />
                                                    '.$city.'
                                                </td>
                                            </tr>
                                        </table>
                                        <table class="invoice" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; text-align: left; width: 80%; margin: 40px auto;">

                                            <tr style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0; padding: 5px 0;" valign="top">
                                                    <h4 style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; font-weight: 600; margin: 0;">Vorraussichtliche Zustellung</h4>
                                                    '.getShippingDate().'
                                                </td>
                                            </tr>

                                        </table>
                                        
                                        <table class="invoice" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; text-align: left; width: 80%; margin: 40px auto;">
                                            <tr style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0; padding: 5px 0;" valign="top">
                                                    <h4>Ihre Bestellnummer: '.$transactionID.'<h4>
                                                </td>
                                            </tr>
                                        </table>
                                        
                                        <table class="invoice" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; text-align: left; width: 80%; margin: 40px auto;">

                                            <h2 style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif; box-sizing: border-box; font-size: 24px; color: #000; line-height: 1.2em; font-weight: 400; margin: 40px 0 0;"> Ihre Konfiguration</h2>

                                            <tr style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0; padding: 5px 0;" valign="top">
                                                    <table class="invoice-items" cellpadding="0" cellspacing="0" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; margin: 0;">
                                                        <tr style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                            <td style="font-weight: bold; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" valign="top">Farbe</td>
                                                            <td class="alignright" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" align="right" valign="top">'.$farbe.'</td>
                                                        </tr>
                                                        <tr style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                            <td style="font-weight: bold; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" valign="top">Ihr Modell</td>
                                                            <td class="alignright" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" align="right" valign="top">'.$modell.'</td>
                                                        </tr>
                                                        <tr style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                            <td style="font-weight: bold; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" valign="top">Anzahl</td>
                                                            <td class="alignright" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" align="right" valign="top">'.$anzahl.'</td>
                                                        </tr>
                                                        <tr style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                            <td style="font-weight: bold; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" valign="top">Gittertyp</td>
                                                            <td class="alignright" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" align="right" valign="top">'.$gitter.'</td>
                                                        </tr>
                                                    </table>

                                                    <table class="invoice-items" cellpadding="0" cellspacing="0" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; margin: 0;">

                                                        <tr style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                            <td style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" valign="top">Zwischensumme ohne USt. </td>
                                                            <td class="alignright" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" align="right" valign="top">EUR '.$preisOhneUST.'</td>
                                                        </tr>

                                                        <tr style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                            <td style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" valign="top">Umsatzsteuer</td>
                                                            <td class="alignright" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" align="right" valign="top">EUR '.$USt.'</td>
                                                        </tr>

                                                        <tr class="total" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                            <td style="font-weight: bold; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; border-top-width: 2px; border-top-color: #333; border-top-style: solid; border-bottom-width: 2px; border-bottom-color: #333; border-bottom-style: solid; margin: 0; padding: 5px 0;" valign="top">Gesamt</td>
                                                            <td class="alignright" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; border-top-width: 2px; border-top-color: #333; border-top-style: solid; border-bottom-width: 2px; border-bottom-color: #333; border-bottom-style: solid; font-weight: 700; margin: 0; padding: 5px 0;" align="right" valign="top">EUR '.$amount.'</td>
                                                        </tr>

                                                    </table>

                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                </table>
                <div class="footer" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; clear: both; color: #999; background-color: #1d2124; margin: 0; padding: 20px;">
                    <table width="100%" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                        <tr style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                            <td class="aligncenter content-block" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 12px; margin: 0; padding: 0 0 20px;" align="center" valign="top">Wollen Sie das Produkt zurücksenden ? <a href="https://vakufuxx.de/forms/widerrufsformular.pdf" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 12px; color: #FFC857; text-decoration: none; margin: 0;">Rücksendeformular</a></td>
                        </tr>
                        <tr style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                            <td class="aligncenter content-block" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 12px; margin: 0; padding: 0 0 20px;" align="center" valign="top">Haben Sie Fragen? Email <a href="mailto: info@vakufuxx.de" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 12px; color: #FFC857; text-decoration: none; margin: 0;">info@vakufuxx.de</a></td>
                        </tr>
                    </table>
                    <table width="100%" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                        <tr style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                            <td class="aligncenter content-block" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 12px; margin: 0; padding: 0 0 20px;" align="center" valign="top"><a href="https://vakufuxx.de/Datenschutz" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 12px; color: #FFC857; text-decoration: none; margin: 0;">Datenschutz</a></td>
                            <td class="aligncenter content-block" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 12px; margin: 0; padding: 0 0 20px;" align="center" valign="top"><a href="https://vakufuxx.de/AGB" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 12px; color: #FFC857; text-decoration: none; margin: 0;">AGB</a></td>
                            <td class="aligncenter content-block" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 12px; margin: 0; padding: 0 0 20px;" align="center" valign="top"><a href="https://vakufuxx.de/Impressum" style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 12px; color: #FFC857; text-decoration: none; margin: 0;">Impressum</a></td>
                        </tr>
                    </table>
                </div></div>
        </td>
        <td style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;" valign="top"></td>
    </tr>
</table>

</body>
</html>';
}