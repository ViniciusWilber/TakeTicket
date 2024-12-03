<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['id'], $_POST['texto']) || empty($_POST['id'])) {
        die('Dados inválidos.');
    }

    $id = intval($_POST['id']);
    $texto = trim($_POST['texto']);

    try {
        // Conexão com o banco de dados
        $pdo = new PDO('mysql:host=localhost;dbname=taketicket', 'root', ''); // Ajuste as credenciais
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Atualizar o texto
        $stmt = $pdo->prepare('UPDATE eventos SET texto = :texto WHERE id = :id');
        $stmt->bindParam(':texto', $texto, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        header('Location: perfil_usuario.php?mensagem=Texto atualizado com sucesso!');
    } catch (PDOException $e) {
        die('Erro ao salvar: ' . $e->getMessage());
    }
} else {
    die('Método não permitido.');
}
