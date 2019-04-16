<?php 
if($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: ../index');
    exit();
}

    if($_POST) {

        $emails = $_POST["email"];
        $name = $_POST["name"];
        $text = $_POST["text"];

        require '../vendor/autoload.php';
        require '../env.php';

        $email = new \SendGrid\Mail\Mail();

          $email->setFrom($emails, $name);
          $email->setSubject("Kundenrückmeldung");
          $email->addTo("info@vakufuxx.de", "Vakufuxx");
          $email->addContent("text/plain", $text);
          $email->addContent(
              "text/html", "<strong>$text</strong>"
          );
          $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
          try {
              $response = $sendgrid->send($email);
              echo '<div class="alert alert-success"><p>Nachricht gesendet. Wir antworten Ihnen so schnell wie möglich </p></div>';
          } catch (Exception $e) {
              echo '<div class="alert alert-danger">
                    <p> Die Nachricht konnte nicht gesendet werden. Ein Fehler ist aufgetreten. </p> 
                    </div>';;
          }

    }
    
?>