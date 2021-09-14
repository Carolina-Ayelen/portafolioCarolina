<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
     //variables form
     if (isset($_POST['enviar'])){

     $nombre = $_POST['nombre'];
     $email = $_POST['email'];
     $telefono = $_POST['telefono'];
     $asunto = $_POST['asunto'];
     $consulta = $_POST['consulta'];
    //Server settings
   // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth = true;                                   //Enable SMTP authentication
    $mail->Username = 'carolinaayelencalvino@gmail.com';                     //SMTP username
    $mail->Password = 'carolina2112';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($email);
    $mail->addAddress('carolinaayelencalvino@gmail.com');     //Add a recipient
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Mensaje de DDC WEB';
    $mail->Body    = 'Nombre: '.$nombre  .'<br>'. 'Email: '. $email . '<br>'. 'Teléfono: ' . $telefono . '<br>'.'Asunto: ' . $asunto . '<br>'. 'Mensaje: ' . $consulta;

    $mail->send();
    echo 'Mensaje enviado con exito';
    echo'<script type="text/javascript">
    window.location.href="https://www.ddcweb.com.ar/confirmar.html";</script>';    }
} catch (Exception $e) {
    echo "Error al enviar su mensaje: {$mail->ErrorInfo}";
}

?>

