<?php
session_start();
include_once "conexao.php";  // Inclua o arquivo de conexão

if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

$id_usuario = $_SESSION['id_usuario']; // Obtém o ID do usuário logado

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $sobre = $_POST['sobre'];

    // Atualiza o nome e sobre do usuário
    $sql = "UPDATE usuario SET nome = :nome, sobre = :sobre WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':sobre', $sobre);
    $stmt->bindParam(':id', $id_usuario, PDO::PARAM_INT);

    // Verifica se a foto foi enviada e processa
    if (!empty($_FILES['foto']['name'])) {
        $foto_perfil = $_FILES['foto']['name'];
        $foto_tmp = $_FILES['foto']['tmp_name'];
        $caminho_destino = "imagens/imgPerfil_usuario/" . $foto_perfil;
        move_uploaded_file($foto_tmp, $caminho_destino);

        // Atualiza a foto do usuário
        $sql = "UPDATE usuario SET foto_perfil = :foto WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':foto', $foto_perfil);
        $stmt->bindParam(':id', $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
    }

    $stmt->execute();
    header("Location: perfil_usuario.php");
}
?>
