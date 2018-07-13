<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$origem = 'msueizy@gmail.com'
$senha = 'Legionarios*18'

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = $origem                                // SMTP username
    $mail->Password = $senha                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($origem, 'Mediato');
    $mail->addReplyTo( $email_address, $name);

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Novo e-mail da Mediato.com.br';
    $mail->Body    = 'Email novo! De: '$name' Contato: '$email_address','$phone' Mensagem: '$message;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}