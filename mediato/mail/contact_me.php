<?php
    require 'phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    try {
        $mail->SetLanguage('br'); // Traduzir para pt-BR
        $mail->isSMTP(); // Seta para usar SMTP
        $mail->SMTPAuth = true; // Libera a autenticação
        $mail->SMTPDebug = 2; // Debug
        $mail->SMTPOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            ]
        ];
        $mail->Host = 'smt.dominio.com.br'; // SMTP Server
        $mail->Username = 'login@dominio.com.br'; // Usuário SMTP
        $mail->Password = 'senha'; // Senha do usuário
        $mail->Port = 587; // Porta do SMTP
        $mail->setFrom('nao-reponda@dominio.com.br', 'Nome'); // Email e nome de quem enviara o e-mail
        $mail->addReplyTo('atendimento@dominio.com.br', 'Nome'); // E-mail e nome de quem responderá o e-mail
        $mail->addAddress('destino@dominio.com.com', 'Nome do destino'); // Email e nome do destino
        //$mail->addCC('copia@dominio.com.br'); // Enviar cópiar do e-mail
        //$mail->addBCC('copiaoculta@dominio.com.br'); // Enviar uma cópia oculta
        //$mail->addAttachment('image.jpg', 'imagem.jpg'); // Anexa um arquivo
        $mail->isHTML(true); // Seta o envio em HTML
        $mail->CharSet = 'UTF-8'; // Charset da mensagem
        $mail->Subject = 'Título da mensagem'; // Título da mensagem
        $mail->Body = '<b>Olá mundo!</b>'; // Mensagem
        $mail->AltBody = 'Ative o HTML da sua conta.'; // Mensagem alternativa
        $enviar = $mail->send(); // Envia e-mail
        if($enviar):
            echo 'Mensagem enviada com sucesso!';
        else:
            echo 'Erro ao enviar mensagem!<br>';
            echo 'Erro: '.$mail->ErrorInfo;
        endif;
    }catch(Exception $e){
        echo 'Erro ao enviar mensagem!';
        echo 'Erro: '.$mail->ErrorInfo;
    }
//codigo abaixo para verificação e incremento do de cima
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
// Create the email and send the message
$to = 'marcella_sueizy@hotmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Contato:  $name";
$email_body = "Nova mensagem.\n\n"."Detalhes:\n\nNome: $name\n\nEmail: $email_address\n\nTelefone: $phone\n\nMenssagem:\n$message";
$headers = "De: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Responda a: $email_address";
mail($to,$email_subject,$email_body,$headers);
return true;
?>
