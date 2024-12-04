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
    $stmt = $pdo->prepare('SELECT * FROM editar_nome WHERE id = :id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $editar = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$editar) {
        die('Evento não encontrado.');
    }
} catch (PDOException $e) {
    die('Erro ao conectar ao banco de dados: ' . $e->getMessage());
}
?>
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
    $stmt = $pdo->prepare('SELECT * FROM editar_sobre WHERE id = :id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $editar2 = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$editar2) {
        die('Evento não encontrado.');
    }
} catch (PDOException $e) {
    die('Erro ao conectar ao banco de dados: ' . $e->getMessage());
}
?>
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
    $stmt = $pdo->prepare('SELECT * FROM editar_imagem WHERE id = :id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $editar2 = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$editar2) {
        die('imagem não encontrada.');
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
    <link rel="stylesheet" href="css/perfil_editar.css">
</head>
<body>
<main class="editar-texto">
        <div class="form-container">
            <h1>Editar Texto</h1>
            <form action="salvar_perfil.php" method="post">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($editar['id']); ?>">
                <div class="form-group">
                      <label for="imagem">Imagem:</label>
                      <input type="file" id="imagem" name="imagem" accept="image/*" required>
               </div>

                <div class="form-group">
                    <label for="texto">Nome:</label>
                    <input type="text" id="texto" name="texto" value="<?php echo htmlspecialchars($editar['texto']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="sobre">sobre:</label>
                    <input type="text" id="sobre" name="sobre" value="<?php echo htmlspecialchars($editar2['sobre']); ?>" required>
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
