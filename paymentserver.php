<?php
if($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: index');
    exit();
}
require "vendor/autoload.php";
require_once "env.php";
require "forms/transactionMail.php";
require "forms/boot.php";
include_once "forms/DBConnect.php";
require "sendReviewRequestMail.php";
require "addToSendGrid.php";

//DATENÜBERMITTLUNG
$configdata = $_POST["configdata"];
$payload = $_POST["payload"];

//BEZAHLINFO KUNDE
$methodnonce = $payload["nonce"];
$details = $payload["details"];
$firstName = $details["firstName"];
$lastName = $details["lastName"];
$streetAdress = $details["shippingAddress"]["line1"];
$costumerEmail = $details["email"];

/*versichert dass weitere Adressinfo übergeben wurde */
function line2() {
  global $details;
  if(isset($details["shippingAddress"]["line2"])) {
    return $details["shippingAddress"]["line2"];
  } else {
    return "";
  }
}

$city = $details["shippingAddress"]["city"];
$postalCode = $details["shippingAddress"]["postalCode"];
$countryCode = $details["shippingAddress"]["countryCode"];
$state = $details["shippingAddress"]["state"];

//Konfiguration
$amount = $configdata["amount"];
$anzahl = $configdata["anzahl"];
$farbe = $configdata["farbe"];
$modell = $configdata["modell"];
$gitter = $configdata["gitter"];

function sendTransactionMail($content, $bestellnummer) {
    global $costumerEmail;
    global $firstName;

    $email = new \SendGrid\Mail\Mail();
    $email->setFrom("bestellung@vakufuxx.de", "Vakufuxx");
    $email->setSubject("Vielen Dank für ihre Bestellung");
    $email->addTo($costumerEmail, $firstName);
    $email->addTo("bestellung@vakufuxx.de", "Firma");
    $email->addContent("text/html", $content);

    $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
    try {
        $response = $sendgrid->send($email);
        echo 'Vielen Dank für ihre Bestellung! <br /> 
                    Ihre Bestellnummer lautet: '.$bestellnummer.'<br />
                    <br/>
                    <p>Ihre Bestellung wurde erfolgreich verarbeitet. <br />
                       Sie erhalten in Kürze eine E-Mail mit ihren Bestelldaten.
                    </p>';
    } catch (Exception $e) {
        echo 'Caught exception: '. $e->getMessage() ."\n";
    }
}

$info = "Price: ". $amount . " , Anzahl: ". $anzahl . " , Farbe: " . $farbe . " , Modell: " . $modell . " , Gitter: ". $gitter;

$result = $gateway->transaction()->sale([
  'amount' => $amount,
  'paymentMethodNonce' => $methodnonce,
  'shipping' => [
    'firstName' => $firstName,
    'lastName' => $lastName,
    'streetAddress' => $streetAdress,
    'extendedAddress' => line2(),
    'locality' => $city,
    'region' => $state,
    'postalCode' => $postalCode,
    'countryCodeAlpha2' => $countryCode
  ],
  'options' => [
      'submitForSettlement' => True,
      'paypal' => [
          'customField' => $info,
          'description' => "Vielen Dank für ihren Einkauf"
       ],
    ],
  ]);

  if($result->success) {
      $dbconnect = new DBConnect();

      $bestellnummer = $result->transaction->id;
      $content = processEmail($details, $configdata, $bestellnummer);

      $sql = "INSERT INTO reviews(reviewcodes, Name) VALUES(:code, :name)";
      $safeNewCostumer = $dbconnect->connect()->prepare($sql);
      $safeNewCostumer->execute(['code' => $bestellnummer, 'name' => $firstName]);

      $request_body = json_decode('[
          {
            "email": "'.$costumerEmail.'",
            "first_name": "'.$firstName.'",
            "last_name": "'.$lastName.'",
            "is_customer": "true"
          }
        ]');

      sendTransactionMail($content, $bestellnummer);
      sendScheduledReviewMail($firstName, $costumerEmail, time());
      addToSendGrid($request_body);

  } else {
    print_r("Error Message: " . $result->message);
  }

  ?>