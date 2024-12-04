<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['id'], $_POST['texto']) || empty($_POST['id'])) {
        die('Dados inválidos.');
    }

    $id = intval($_POST['id']);
    $texto = trim($_POST['texto']);
    $sobre = trim($_POST['sobre']);
    
    // Processar a imagem (se houver uma nova)
    $imagem = null;
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $imagemTmp = $_FILES['imagem']['tmp_name'];
        $imagemNome = $_FILES['imagem']['name'];
        $imagemTipo = $_FILES['imagem']['type'];

        // Verificar se o arquivo é uma imagem válida (tipo de arquivo)
        $extensaoValida = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($imagemTipo, $extensaoValida)) {
            die('Formato de imagem inválido. Apenas JPG, PNG e GIF são permitidos.');
        }

        // Gerar um nome único para a imagem para evitar sobrescrição
        $imagemDestino = 'uploads/' . uniqid() . '-' . basename($imagemNome);

        // Mover a imagem para a pasta de uploads
        if (!move_uploaded_file($imagemTmp, $imagemDestino)) {
            die('Erro ao fazer upload da imagem.');
        }

        $imagem = $imagemDestino;  // Armazenar o caminho da imagem
    }

    try {
        // Conexão com o banco de dados
        $pdo = new PDO('mysql:host=localhost;dbname=taketicket', 'root', ''); // Ajuste as credenciais
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Atualizar o texto
        $stmt = $pdo->prepare('UPDATE editar_nome SET texto = :texto WHERE id = :id');
        $stmt->bindParam(':texto', $texto, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Atualizar o 'sobre'
        $stmt2 = $pdo->prepare('UPDATE editar_sobre SET sobre = :sobre WHERE id = :id');
        $stmt2->bindParam(':sobre', $sobre, PDO::PARAM_STR);
        $stmt2->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt2->execute();

        // Se houver uma nova imagem, atualizar o banco com o caminho da imagem
        if ($imagem) {
            $stmt3 = $pdo->prepare('UPDATE editar_nome SET imagem = :imagem WHERE id = :id');
            $stmt3->bindParam(':imagem', $imagem, PDO::PARAM_STR);
            $stmt3->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt3->execute();
        }

        header('Location: perfil_usuario.php?mensagem=Texto e imagem atualizados com sucesso!');
    } catch (PDOException $e) {
        die('Erro ao salvar: ' . $e->getMessage());
    }
} else {
    die('Método não permitido.');
}
?>
