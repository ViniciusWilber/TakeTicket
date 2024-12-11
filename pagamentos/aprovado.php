<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth = true;                                   //Enable SMTP authentication
    $mail->Username = 'lucascorreia.6570@gmail.com';                     //SMTP username
    $mail->Password = 'zegs jjog yqzl masw';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('ticketttake60@gmail.com', 'taketicket');
    $mail->addAddress($_SESSION['email'], $nome);     //Add a recipient
    //$mail->addAddress($email2, 'nick');               //Name is optional
    $mail->addReplyTo('ticketttake60@gmail.com', 'taketicket');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Pagamento';
    $mail->msgHTML(file_get_contents('conteudo_pagamento.php'), __DIR__);
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if ($mail->send()) {
        echo 'enviado';
    }

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include_once "header.php";
    include_once "conexao.php"
        ?>
    <h1>Pagamento</h1>
    <h2>Dados da sua compra</h2>
    <?php
    $id = $_GET['id'] ?? 0;
    if ($id == 0) {
        header('location: ./');
    }
    $KEY = "TEST-5232080259225545-042515-bfeaf6dff3b3fd59594bb4d9ffe6525f-22727655";
    //$id_unico = uniqid('', true);
    $ch = curl_init('https://api.mercadopago.com/v1/payments/' . $id);//payment_id
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        //'X-Idempotency-Key: ' . $id_unico,
        'Authorization: Bearer ' . $KEY
    ]);
    //curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    $resposta = curl_exec($ch);
    $dados = json_decode($resposta, true);
    curl_close($ch);

    if ($dados) {
        echo '<h3>Detalhes do pedido</h3>';
        echo '<p>ID: ' . $dados['id'] . '</p>';
        echo '<p>Status: ' . $dados['status'] . '</p>';
        echo '<p>descrição: ' . $dados['description'] . '</p>';
        echo '<p>Valor pago: ' . $dados['transaction_amount'] . '</p>';
    } else {
        echo "Seu pedido não foi encontrado!";
    }

    ?>
    <h1>Seu ingresso</h1>
     <img src="imagen/qr-code.jpg" alt="Descrição da imagem" width="300" height="200">
    <?php
    include_once "footer.php"
        ?>
</body>

</html>