<?php
session_start();
include_once "conexao.php";
$id = $_GET['id_usuario'];
$stmt = $conexao->prepare("SELECT * FROM evento WHERE id=?");
$stmt->execute([$id]);
$results = $stmt->fetch(PDO::FETCH_ASSOC);
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
                <div class="form-group">
                      <label for="imagem">Imagem:</label>
                      <input type="file" id="imagem" name="imagem" accept="image/*" required>
               </div>
                <div class="form-group">
                    <label for="texto">Nome:</label>
                    <input type="text" id="texto" name="texto" value="<?php echo $results ['nome']; ?>" required>
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
