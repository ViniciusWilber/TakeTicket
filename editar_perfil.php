<?php
session_start(); // Iniciar a sessão
include_once "header_deslogar.php";

// Verificar se o usuário está logado
if (!isset($_SESSION['id_usuario'])) {
    header("Location: perfil_usuario.php"); // Redirecionar se a sessão não estiver ativa
    exit;
}

$id = $_SESSION['id_usuario'];

try {
    $pdo = new PDO('mysql:host=localhost;dbname=taketicket', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Selecionar dados do usuário
    $stmt = $pdo->prepare('SELECT * FROM usuario WHERE id_usuario = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $editar = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die('Erro ao conectar ao banco de dados: ' . $e->getMessage());
}

// Processar envio de imagem e edição do nome
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['image'])) {
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($_FILES['image']['name']);

        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

        $ext = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
        if (in_array($ext, ['jpg', 'png']) && move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            try {
                $stmt = $pdo->prepare("INSERT INTO images (image_path) VALUES (:image_path)");
                $stmt->bindParam(':image_path', $uploadFile);
                $stmt->execute();
            } catch (PDOException $e) {
                $message = "Erro ao salvar no banco de dados: " . $e->getMessage();
            }
        } else {
            $message = "Erro ao enviar imagem ou formato inválido.";
        }
    }

    if (!empty($_POST['nome'])) {
        $novoNome = htmlspecialchars($_POST['nome']);
        try {
            $stmt = $pdo->prepare("UPDATE usuario SET nome = :nome WHERE id_usuario = :id");
            $stmt->bindParam(':nome', $novoNome);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            $message = "Erro ao atualizar o nome: " . $e->getMessage();
        }
    }

    header("Location: perfil_usuario.php");
    exit;
}

// Recuperar a última imagem enviada
$imagePath = '';
$result = $pdo->query("SELECT image_path FROM images ORDER BY id DESC LIMIT 1");
if ($result && $row = $result->fetch(PDO::FETCH_ASSOC)) {
    $imagePath = $row['image_path'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
            margin: 20px 0;
        }

        .editar {
            max-width: 500px;
            margin: 30px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input[type="file"], input[type="text"] {
            padding: 10px;
            font-size: 16px;
        }

        button {
            padding: 10px 15px;
            font-size: 16px;
            color: white;
            background: #1BB0AC;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #148784;
        }

        p {
            text-align: center;
            font-size: 14px;
            color: red;
        }

        img {
            display: block;
            max-width: 300px;
            margin: 20px auto;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="editar">
        <!-- Mensagem de erro ou sucesso -->
        <?php if (isset($message)): ?>
            <p><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>

        <!-- Formulário para envio de imagem e edição de nome -->
        <form method="POST" enctype="multipart/form-data">
            <h1>Imagem:</h1>
            <input type="file" name="image" accept="image/*">
            <h1>Nome:</h1>
            <input type="text" name="nome" value="<?= htmlspecialchars($editar['nome'] ?? '') ?>" placeholder="Editar nome">
            <button type="submit">Enviar</button>
        </form>

        <!-- Exibição da imagem mais recente -->
        <?php if ($imagePath): ?>
            <img src="<?= htmlspecialchars($imagePath) ?>" alt="Imagem do perfil">
        <?php endif; ?>
    </div>
</body>
</html>
