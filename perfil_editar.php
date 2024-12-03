<?php
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die('ID não fornecido ou inválido.');
}

$id = intval($_GET['id']); // Converter o ID para número

try {
    // Conexão com o banco de dados
    $pdo = new PDO('mysql:host=localhost;dbname=taketicket', 'root', ''); // Ajuste as credenciais
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Selecionar o registro com base no ID
    $stmt = $pdo->prepare('SELECT * FROM eventos WHERE id = :id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $evento = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$evento) {
        die('Evento não encontrado.');
    }
} catch (PDOException $e) {
    die('Erro ao conectar ao banco de dados: ' . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Texto</title>
    <link rel="stylesheet" href="css/editar_evento.css">
</head>
<body>
<main class="editar-texto">
        <div class="form-container">
            <h1>Editar Texto</h1>
            <form action="salvar.php" method="post">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($evento['id']); ?>">
                <div class="form-group">
                    <label for="texto">Nome:</label>
                    <input type="text" id="texto" name="texto" value="<?php echo htmlspecialchars($evento['texto']); ?>" required>
                </div>
                <div class="form-buttons">
                    <button type="submit" class="btn-salvar">Salvar</button>
                    <a href="index.php" class="btn-cancelar">Cancelar</a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
