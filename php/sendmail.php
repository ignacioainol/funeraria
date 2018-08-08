<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST['sendmail'])){
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $asunto  = $_POST['subject'];
    $mensaje = $_POST['message'];

    $bodyMessage =<<<EOF
        <h4>Nuevo mensaje de Contacto!</h4>
        <p><strong>{$name}</strong> desea ponerse en contacto contigo</p>
        <p>Su correo electr&oacute;nico eso <strong>{$email}</strong></p>
        <strong>Mensaje: </strong>
        <p>{$mensaje}</p>

EOF;

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        //$mail->Username = 'cyraxchile@gmail.com';                 // SMTP username
        $mail->Username = 'contacto@funerariaconcepto.cl';                 // SMTP username
        $mail->Password = 'funeraria@concepto';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('contacto@funerariaconcepto.cl', 'Clientes desde Formulario');
        $mail->addAddress('contacto@funerariaconcepto.cl', 'Funeraria Concepto');     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $asunto;
        $mail->Body    = $bodyMessage;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Nos contactaremos con ud. lo antes posible.';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}else{
    echo "Geh weg von hier !! ";
}

// if(isset($_POST['sendmail'])){
//     $name    = $_POST['name'];
//     $email   = $_POST['email'];
//     $asunto  = $_POST['subject'];
//     $mensaje = $_POST['message'];



// //     $textomail = <<<cyrax
// //         La persona {$name}, email: {$email}, quiere comunicarse con uds por el sigte motivo.<br>
// //         {$mensaje}
// // cyrax;

//     $mail = new PHPMailer(true);                              // Passing `true` enables exceptions


//         //Server settings
//         //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
//         $mail->isSMTP();                                      // Set mailer to use SMTP
//         $mail->Host = 'smtp.gmail.com';                        // Specify main and backup SMTP servers
//         $mail->SMTPAuth = true;                               // Enable SMTP authentication
//         $mail->Username = 'ignacio.ainolrivera@gmail.com';      // SMTP username
//         $mail->Password = 'undostrespormI7';                    // SMTP password
//         $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
//         $mail->Port = 587;                                    // TCP port to connect to

//         //Recipients
//         $mail->setFrom('ignacio.ainolrivera@gmail.com', ' Ignacio_Cyrax');
//         $mail->addAddress('cyraxchile@gmail.cl', 'Joe User');     // Add a recipient
//         //$mail->addAddress('ellen@example.com');               // Name is optional
//         //$mail->addReplyTo('info@example.com', 'Information');
//         //$mail->addCC('cc@example.com');
//         //$mail->addBCC('bcc@example.com');

//         //Attachments
//         //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//         //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

//         //Content
//         $mail->isHTML(true);                                  // Set email format to HTML
//         $mail->Subject = 'Here is the subject';
//         $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
//         $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

//         $mail->send();
//  }

