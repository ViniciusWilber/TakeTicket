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

        .myModa {

            background: black;
        }

        body {}

        dialog {
            margin-left: 16%;
            margin-top: 1%;
        }

        .close-btn {
            cursor: pointer;
            background-color: #f44336;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
        }

        .no-scroll {
            overflow: hidden;
        }
    </style>
</head>
<header>
    <a href="index.php" class="logo"><img src="imagens/imgIndex/LogoSletras.png" alt=""></a>
    <ul class="botoes">
    <?php
    // Inicie a sessão, se ainda não estiver iniciada
    include_once "conexao.php";
 
    // Verifique se o id_usuario existe na sessão
    if (isset($_SESSION['id_usuario'])) {
        // Utilize a conexão existente
        $id_usuario = $_SESSION['id_usuario'];
 
        // Prepare e execute a consulta usando a conexão existente
        $stmt = $conexao->prepare("SELECT * FROM promotores WHERE id_usuario = ?");
        $stmt->execute([$id_usuario]);
 
        // Verifique se o id_usuario está na tabela promotores
        if ($stmt->rowCount() > 0): ?>
            <a href="perfil.php"><button class="Login">Perfil</button></a>
        <?php else: ?>
            <a href="perfil_usuario.php"><button class="Login">Perfil</button></a>
        <?php endif;
    } else { ?>
        <a href="login.php"><button class="Login" id="openModalBtn">Login</button></a>
    <?php } ?>

    </ul>
</header>
<dialog id="myModal">
    <div id="modalContent"></div>
</dialog>

</html>





<!-- Modal usando dialog -->

<script>
    // Referências dos elementos
    const openModalBtn = document.getElementById('openModalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const myModal = document.getElementById('myModal');
    const modalContent = document.getElementById('modalContent');

    // Função para abrir o modal
    openModalBtn.addEventListener('click', async () => {
        try {
            const response = await fetch('modal-content.php');
            const content = await response.text();
            modalContent.innerHTML = content;
            myModal.showModal();
            document.body.classList.add('no-scroll'); // Adiciona a classe para desabilitar a rolagem
        } catch (error) {
            modalContent.innerHTML = 'Erro ao carregar conteúdo.';
        }
    });

    // Fechar o modal
    closeModalBtn.addEventListener('click', () => {
        myModal.close();
        document.body.classList.remove('no-scroll'); // Remove a classe para habilitar a rolagem novamente
    });

</script>

</body>

</html>