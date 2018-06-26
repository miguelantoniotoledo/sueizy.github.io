<?php
//INICIO CODIGO ORIGINAL
// Check for empty fields
/*if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$to = 'adm@ronnycarlos.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "Nova mensagem do seu site!\n\n"."Detalhes:\n\nName: $name\n\nE-mail: $email_address\n\nTelefone: $phone\n\nMensagem:\n$message";
$headers = "From: adm@ronnycarlos.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";   
mail($to,$email_subject,$email_body,$headers);
return true;*/
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
// FIM DO CÓDIGO ORIGINAL

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'http://smtp.gmail.com';  			  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'sistemas@ronnycarlos.com';         // SMTP username
    $mail->Password = 'mm3sGsrc';                         // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 25;                                     // TCP port to connect to

	  $name = strip_tags(htmlspecialchars($_POST['name']));
	  $email_address = strip_tags(htmlspecialchars($_POST['email']));
	  $phone = strip_tags(htmlspecialchars($_POST['phone']));
	  $message = strip_tags(htmlspecialchars($_POST['message']));

    //Recipients
    $mail->setFrom('sistemas@mediatomultiagencia.com.br', 'Mediato Multiagência');
    $mail->addAddress($email, $name);                    // Add a recipient
    $mail->addReplyTo('adm@mediatomultiagencia.com.br', 'Administrativo Mediato Multiagência');

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Nova mensagem de e-mail!';
    $mail->Body    = "<h1>Nova mensagem de e-mail!</h1><p>Nome: $name </p><p>E-mail: $email </p>
    <p>Telefone: $phone</p><p>Mensagem: $message</p>";
 // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Mensagem enviada!';
} catch (Exception $e) {
    echo 'Mensagem não enviada! Erro: ', $mail->ErrorInfo;         
?>