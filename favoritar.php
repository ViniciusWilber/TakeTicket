<?php
session_start();

// Verifique se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    echo "Você precisa estar logado para favoritar um evento.";
    exit;
}

// Verifique se o ID do evento foi passado na URL
if (isset($_GET['id'])) {
    $eventoId = $_GET['id'];
    $usuarioId = $_SESSION['usuario_id']; // ID do usuário logado

    // Conecte ao banco de dados
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=TakeTicket', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Verifique se o evento já foi favoritado pelo usuário
        $stmt = $pdo->prepare("SELECT * FROM favoritos WHERE usuario_id = :usuario_id AND evento_id = :evento_id");
        $stmt->bindParam(':usuario_id', $usuarioId);
        $stmt->bindParam(':evento_id', $eventoId);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "Você já favoritou este evento.";
        } else {
            // Insira o evento na tabela favoritos
            $stmt = $pdo->prepare("INSERT INTO favoritos (usuario_id, evento_id, data_favorito) VALUES (:usuario_id, :evento_id, NOW())");
            $stmt->bindParam(':usuario_id', $usuarioId);
            $stmt->bindParam(':evento_id', $eventoId);
            $stmt->execute();

            echo "Evento favoritado com sucesso!";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
} else {
    echo "Evento não encontrado.";
}
?>
