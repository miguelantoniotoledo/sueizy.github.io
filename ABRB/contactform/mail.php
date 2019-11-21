<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$option = $_POST['option'];
$city = $_POST['city'];
$message = $_POST['message'];
$subject = $_POST['subject'];
$content="Cliente: $name \n E-mail: $email \n Telefone: $phone \n Motivo do Contato: $option \n Cidade: $city \n Mensagem: $message";
$recipient = "msueizy@gmail.com";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $content, $mailheader) or die("Error!");
echo "Email enviado!";
?>