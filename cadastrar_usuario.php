<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



require 'vendor/autoload.php';
include_once "conexao.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $erro = "";
    $nome = $_POST['nome'];
    $padraoSenha = '~^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*\(\)\_\+\[\]\{\}\|\:\"\<\>\.\,\/\?\-]).{8,}$~';
    if(empty($nome) || strlen($nome) < 3) {
        $erro .= "digite um nome <br>";
    }
    
    $email = $_POST['email'];
    if(empty($email)){
        $erro .="digite um email <br>";
    }else{
        $selectEmail = $conexao->prepare("SELECT email FROM usuario WHERE email = :email");
        $selectEmail->bindParam('email', $email);
        $selectEmail->execute();
        //$verificaEmail = $selectEmail->fetch(PDO::FETCH_ASSOC);
        if($selectEmail->rowCount()){
            $erro .= "Email já cadastrado!<br>";
        }
    }

    $senha = $_POST['senha'];

    if (!preg_match($padraoSenha, $senha)){
    $erro .= "Digite no minimo 8 caracteres <br>Com pelo menos uma letra maiuscula <br>Um caracter especial <br> E pelo menos um número";
    }else {
        $senhaCripto = password_hash($senha, PASSWORD_DEFAULT);
    }
    echo $erro;
    if($erro == ""){
        $novo = [
            'nome' => $nome,
            'email' => $email,
            'senha' => $senhaCripto
        ];
     
        $insert = $conexao->prepare("INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)");
        // $insert->bindParam(':nome', $nome);
        // $insert->bindParam(':email', $email);
        // $insert->bindParam(':cpf', $cpf);
        // $insert->bindParam(':senha', $senha);
        if($insert->execute($novo)) {
            // header('location: cadastro.php?status=ok');

            $_SESSION['senha'] = $senha;
            $_SESSION['email'] = $email;
            $_SESSION['id_usuario'] = $conexao->lastInsertId();
            echo "cadastrado com sucesso";




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
    $mail->setFrom('lucascorreia.6570@gmail.com', '$nome');
    $mail->addAddress($_SESSION['email'], $nome);     //Add a recipient
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



        } else {
            // header('location: cadastro.php?status=error');
            $erro = "<div>
            <p> erro</p>
            </div>";
        }
    }
}