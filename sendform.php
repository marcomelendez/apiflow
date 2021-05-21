<?php
//

require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


function createFormat(array $value)
{
    if(count($value) == 0){

        return false;
    }

    $body  = "<h1>Creacion de membresia</h1>";

    $body .= "<table>";

    foreach($value as $v1 => $v2){
        $body .= "<tr>";
        $body .= "<td>".strtoupper($v1)."</td>";
        $body .= "<td>".$v2."</td>";
        $body .= "</tr>";
    }

    $body .= "</table>";

    return $body;
}




function sendEmail($post)
{

    $body = createFormat($post);

    /* Send email */

    $mail = new PHPMailer(true);

    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = Config::get("EMAIL_HOST");                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = Config::get("EMAIL_USER");                     // SMTP username
        $mail->Password   = Config::get("EMAIL_PASS");              // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom(Config::get("EMAIL_USER") , 'Nueva membresia');
        $mail->addAddress(Config::get("EMAIL_DEFAULT"), Config::get("EMAIL_USER"));     // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = "Nueva registro de membresia";
        $mail->Body    = $body;
        $mail->send();
        echo 'OK';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


$params =['name' =>'Marco Melendez',
          'email'=>'marcomelendezn@gmail.com',
          'externalId'=>'123445',
          'direccion'=>'rwerwerewr',
          'comuna' =>"",
          'region' =>"",
          'telefono'=>'543243211233'];


return sendEmail($params);