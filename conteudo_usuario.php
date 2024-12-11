<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Desenvolvimento de Soluções Web</title>
    <link rel="stylesheet" href="css/header.css">
</head>

<body style="font-family: Arial, sans-serif;margin: 0;padding: 0;background-color: #f4f4f4;">
    <div
        style="max-width: 600px;margin: 15px auto;background-color: #ffffff;border-radius: 8px;box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        </head>
        <header>
            <a href="#" class="logo"><img src="imagens/imgIndex/LogoSletras.png" alt=""></a>
        </header>


        <?php
        include_once "conexao.php"
            ?>
        <div style="padding: 15px;">
            <?php
            $pdo = new PDO('mysql:host=localhost;dbname=taketicket', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Certifique-se de que o ID do usuário está armazenado na sessão após o login
            if (!isset($_SESSION['id_usuario'])) {
                die('Usuário não autenticado. Faça login para acessar.');
            }

            $id = $_SESSION['id_usuario'];
            
            // Selecionar os dados do usuário logado
            $stmt = $pdo->prepare('SELECT * FROM usuario WHERE id_usuario = :id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $editar = $stmt->fetch(PDO::FETCH_ASSOC);
            ?>
            <h2 style="color: #333333;">Seja muito bem vindo(a) <?= $editar['nome'] ?></h2>
            <a href="login.php"><button class="Login" >Confirmação do email</button></a>
        </div>
        <?php
        include_once "footer.php"
            ?>
    </div>
</body>

</html>