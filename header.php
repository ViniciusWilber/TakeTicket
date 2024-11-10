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
    <style>
        /* Estilos básicos para a modal */
        .modal {
            display: none;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: none;
    border: none;
}

        .close-btn {
            cursor: pointer;
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <main>
        <header>
            <a href="index.php" class="logo"><img src="imagens/imgIndex/LogoSletras.png" alt=""></a>
            <ul class="botoes">
                <?php if (isset($_SESSION["id_usuario"])): ?>
                    <a href="perfil_usuario.php"><button class="Login">Perfil</button></a>
                <?php else: ?>
                    <button class="Login" id="openModalBtn">Login</button>
                <?php endif; ?>
            </ul>  
            <dialog id="myModal" class="modal">
        <dialog class="modal-content">
            <div id="modalData">
                
            </div>
                </dialog>
    </div> 
        </header>

    </main>
    <script src="js/modal.js"></script>
    <script src="js/login.js"></script>
</body>
</html>
