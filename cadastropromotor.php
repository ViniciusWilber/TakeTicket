<?php
session_start();
include_once "conexao.php";
include_once "header.php"; 
?>

<?php
$usuario = 'root';
$senha = '';
$database = 'taketicket';
$host = 'localhost';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if ($mysqli->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $mysqli->connect_error);
}

$mensagem_erro = ''; // Variável para armazenar mensagens de erro

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se todos os campos foram enviados
    if (isset($_POST['nome'], $_POST['email'], $_POST['idade'], $_POST['numero'], $_POST['info'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $idade = $_POST['idade'];
        $numero = $_POST['numero'];
        $info = $_POST['info'];
        $id_usuario = $_SESSION['id_usuario'];

        // Verifica se o email já está cadastrado
        $sql_check = "SELECT * FROM promotores WHERE email = ?";
        $stmt_check = $mysqli->prepare($sql_check);
        $stmt_check->bind_param('s', $email);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        if ($result_check->num_rows > 0) {
            $mensagem_erro = "E-mail já cadastrado!";
        } else {
            // Realiza a inserção no banco de dados
            $sql = "INSERT INTO promotores (nome, email, idade, numero, info, id_usuario) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param('ssisss', $nome, $email, $idade, $numero, $info, $id_usuario);

            if ($stmt->execute()) {
                // Redireciona após cadastro bem-sucedido
                header("Location: index.php");
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
                $mail->setFrom('lucascorreia.6570@gmail.com', '$nome');
                $mail->addAddress($_SESSION['email'], $nome);     //Add a recipient
                //$mail->addAddress($email2, 'nick');               //Name is optional
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

                if ($mail->send()) {
                    echo 'enviado';
                }

            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
                exit; // Interrompe a execução do código após o redirecionamento
            } else {
                $mensagem_erro = "Erro ao cadastrar: " . $stmt->error;
            }
        }
    } else {
        $mensagem_erro = "Erro: Todos os campos do formulário são obrigatórios.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Promotor</title>
    <link rel="stylesheet" href="./css/cadastropromotor.css">
</head>
<body>
    <div class="container">
        <h1>Cadastro de Promotor</h1>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="nome">Nome Completo</label>
                <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo" value="<?php echo isset($_POST['nome']) ? $_POST['nome'] : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Digite seu email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="idade">Idade</label>
                <input type="number" id="idade" name="idade" placeholder="Digite sua idade" min="1" max="120" value="<?php echo isset($_POST['idade']) ? $_POST['idade'] : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="telefone">Número de Telefone</label>
                <input type="tel" id="telefone" name="numero" placeholder="(XX) XXXXX-XXXX" value="<?php echo isset($_POST['numero']) ? $_POST['numero'] : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="info">Por que quer ser promotor?</label>
                <textarea id="info" name="info" placeholder="Explique brevemente..." rows="4" required><?php echo isset($_POST['info']) ? $_POST['info'] : ''; ?></textarea>
            </div>
            <button type="submit" class="btn-submit">Tornar-se Promotor</button>
        </form>

        <!-- Exibe a mensagem de erro, se houver -->
        <?php if ($mensagem_erro): ?>
            <div class="erro-mensagem"><?php echo $mensagem_erro; ?></div>
        <?php endif; ?>

        <div class="form-footer">
            <p>Já possui uma conta? <a href="login.html">Entrar</a></p>
        </div>
    </div>
</body>
</html>
