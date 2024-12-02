<?php
@session_start();
include_once "conexao.php";
include_once "header.php"; 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/editar_perfil.css">
    <title>Editar Perfil</title>
</head>
<body>
    <main class="editar-perfil">
        <div class="form-container">
            <h1>Editar Perfil</h1>
            <form action="salvar_edicao.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" value="Elma Maria" required>
                </div>
                <div class="form-group">
                    <label for="senha">Nova Senha</label>
                    <input type="password" id="senha" name="senha">
                </div>
                <div class="form-group">
                    <label for="foto">Foto de Perfil</label>
                    <input type="file" id="foto" name="foto" accept="image/*">
                </div>
                <div class="form-buttons">
                    <button type="submit" class="btn-salvar">Salvar Alterações</button>
                    <a href="perfil_usuario.php" class="btn-cancelar">Cancelar</a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
