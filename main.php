<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$email = "rafaelwaifu@gmail.com";
$email2 = "Nikeg2011@gmail.com";



require 'vendor/autoload.php';


$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'lucascorreia.6570@gmail.com';                     //SMTP username
    $mail->Password   = 'zegs jjog yqzl masw';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('lucascorreia.6570@gmail.com', 'LUCAS');
    $mail->addAddress($email, 'rafa');     //Add a recipient
    $mail->addAddress($email2, 'nick');               //Name is optional
    $mail->addReplyTo('lucascorreia.6570@gmail.com', 'lucas');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Teste de PHPmailer';
    $mail->msgHTML(file_get_contents('conteudo.php'), __DIR__);
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if($mail->send()){
        echo 'enviado';
    }

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
// if(mail($email, "Teste de email", "Estou testando a função mail ()")){
//     echo"Foi enviado o email para o $email";
// }else {
//     echo "Não foi enviado o email, deu ruim";
// }


