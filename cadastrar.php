<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;//email
use PHPMailer\PHPMailer\SMTP;//email
use PHPMailer\PHPMailer\Exception;//email
require 'vendor/autoload.php';//email


include "conexao.php";
// Verifica se as imagens foram enviadas corretamente
if (isset($_FILES["imagens"]) && count($_FILES["imagens"]["name"]) > 0) {
    $diretorioDestino = "./img/";

    // Verifica se a pasta existe, caso contrário, cria
    if (!is_dir($diretorioDestino)) {
        mkdir($diretorioDestino, 0777, true);  // Permissões de escrita
    }

    $imagens = [];  // Array para armazenar os caminhos das imagens

    // Loop para processar as imagens
    foreach ($_FILES["imagens"]["name"] as $index => $nomeImagem) {
        // Caminho completo onde a imagem será salva
        $caminhoImagem = $diretorioDestino . $nomeImagem;

        // Verifica se o arquivo foi enviado corretamente
        if ($_FILES["imagens"]["error"][$index] == 0) {
            // Tenta mover o arquivo para o diretório de destino
            if (move_uploaded_file($_FILES["imagens"]["tmp_name"][$index], $caminhoImagem)) {
                // Adiciona o caminho da imagem no array
                $imagens[] = $caminhoImagem;

            } else {
            }
        } else {

        }
    }
} else {
    $imagens = [];  // Se nenhuma imagem foi enviada ou houve erro
}

// Recebe os dados do formulário via POST
$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$data_inicio = $_POST["data_inicio"];
$hora_inicio = $_POST["hora_inicio"];
$hora_fim = $_POST["hora_fim"];
$data_fim = $_POST["data_fim"];
$promotor_id = $_POST["id_promotor"];  // Recebe o ID do promotor do formulário
$valor = $_POST["valor"];
$cidade = $_POST["cidade"];
$logradouro = $_POST["logradouro"];
$CEP = $_POST["CEP"];
$bairro = $_POST["bairro"];
$numero = $_POST["numero"];
$estado = $_POST["estado"];
$complemento = $_POST["complemento"];
$referencia = $_POST["referencia"];
$nome_categoria = $_POST["nome_categoria"];



// Depuração: Exibir os valores que serão inseridos

// Prepara a consulta SQL
$sql = "INSERT INTO evento (
        nome,
        descricao,
        data_inicio,
        hora_inicio,
        hora_fim,
        data_fim,
        id_promotor,
        valor,
        cidade,
        logradouro,
        CEP,
        bairro,
        numero,
        estado,
        complemento,
        imagens,
        referencia,
        nome_categoria
    ) VALUES (
        :nome,
        :descricao,
        :data_inicio,
        :hora_inicio,
        :hora_fim,
        :data_fim,
        :id_promotor,
        :valor,
        :cidade,
        :logradouro,
        :CEP,
        :bairro,
        :numero,
        :estado,
        :complemento,
        :imagens,
        :referencia,
        :nome_categoria
    )";

// Executa a inserção no banco de dados
try {
    $pdo = new PDO('mysql:host=localhost;dbname=TakeTicket', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare($sql);

    // Atribui os valores às variáveis na consulta
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':data_inicio', $data_inicio);
    $stmt->bindParam(':hora_inicio', $hora_inicio);
    $stmt->bindParam(':hora_fim', $hora_fim);
    $stmt->bindParam(':data_fim', $data_fim);
    $stmt->bindParam(':id_promotor', $promotor_id);
    $stmt->bindParam(':valor', $valor);
    $stmt->bindParam(':cidade', $cidade);
    $stmt->bindParam(':logradouro', $logradouro);
    $stmt->bindParam(':CEP', $CEP);
    $stmt->bindParam(':bairro', $bairro);
    $stmt->bindParam(':numero', $numero);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':complemento', $complemento);
    $stmt->bindParam(':referencia', $referencia);
    $stmt->bindParam(':nome_categoria', $nome_categoria);



    // Como você tem várias imagens, converte para uma string JSON
    $imagensJson = json_encode($imagens);  // Converte o array de imagens para JSON
    $stmt->bindParam(':imagens', $imagensJson);

    // Executa a inserção
    if ($stmt->execute()) {
        echo "Dados inseridos com sucesso!";
        
        $mail = new PHPMailer(true);

            try {
                $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
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
                $mail->Subject = 'Teste de PHPmailer';
                $mail->msgHTML(file_get_contents('conteudo_evento.php'), __DIR__);
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                if ($mail->send()) {
                    echo 'enviado';
                }

            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        header("Location: index.php");
        exit;
    } else {
        echo "Erro ao inserir os dados. Erro SQL: " . implode(", ", $stmt->errorInfo());
    }

} catch (PDOException $e) {
    // Captura erro de PDO e exibe
    echo "Erro: " . $e->getMessage();
}
?>"UPDATE evento SET