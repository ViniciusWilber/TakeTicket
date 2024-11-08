<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <title>Header da página</title>
</head>
<body>
    <main>
        <header>
            <a href="index.php" class="logo"><img src="imagens/imgIndex/LogoSletras.png" alt=""></a>
            <ul class="botoes">
                <?php if (isset($_SESSION["id_usuario"])): ?>
                    <a href="perfil_usuario.php"><button class="Login">Perfil</button></a>
                <?php else: ?>
                    <a href="login.php"><button class="Login">Login</button></a>
                <?php endif; ?>
            </ul>   
        </header>
    </main>
</body>
</html>
