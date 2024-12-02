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
