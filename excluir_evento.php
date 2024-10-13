<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Evento</title>
</head>
<body>
<?php
    try {
        // Conexão com o banco de dados usando PDO
        $pdo = new PDO('mysql:host=localhost;dbname=TakeTicket', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Verifica se o ID foi passado via GET e se é numérico
        if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
            $id = $_GET["id"];

            // Preparando a query de DELETE
            $stmt = $pdo->prepare("DELETE FROM evento WHERE id = ?");
            
            // Vinculando o parâmetro corretamente e executando a query
            if ($stmt->execute([$id])) {
                echo "Evento deletado com sucesso.";
            } else {
                echo "Erro ao deletar o evento.";
            }
        } else {
            echo "ID inválido.";
        }
    } catch (PDOException $e) {
        // Tratamento de erro
        echo "Erro: " . $e->getMessage();
    }
?>
</body>
</html>

