<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://kit.fontawesome.com/224a2d2542.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/perfil_usuario.css">
    <title>Perfil/ViniciusWilber</title>
</head>
<body>
<?php
  include_once "header_deslogar.php";
  try {
    // Conexão com o banco de dados
    $pdo = new PDO('mysql:host=localhost;dbname=taketicket', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Certifique-se de que o ID do usuário está armazenado na sessão após o login
    if (!isset($_SESSION['id_usuario'])) {
        die('Usuário não autenticado. Faça login para acessar.');
    }

    $id = $_SESSION['id_usuario']; // Pegar o ID do usuário da sessão

    // Selecionar os dados do usuário logado
    $stmt = $pdo->prepare('SELECT * FROM usuario WHERE id_usuario = :id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $editar = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$editar) {
        die('Usuário não encontrado no banco de dados.');
    }
} catch (PDOException $e) {
    die('Erro ao conectar ao banco de dados: ' . $e->getMessage());
}

  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . basename($_FILES['image']['name']);
    
    if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
    
    $ext = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
    if (in_array($ext, ['jpg', 'png']) && move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
        $stmt = $pdo->prepare("INSERT INTO images (image_path) VALUES (:image_path)");
        $stmt->bindParam(':image_path', $uploadFile);
        $stmt->execute();
        $message = "Imagem enviada com sucesso!";
    } else {
        $message = "Erro ao enviar imagem ou formato inválido.";
    }
  }

  $imagePath = '';
  $result = $pdo->query("SELECT image_path FROM images ORDER BY id DESC LIMIT 1");
  if ($result && $row = $result->fetch(PDO::FETCH_ASSOC)) $imagePath = $row['image_path'];
?>
    <main class="Perfil">
        <div class="esquerda">
            <div class="elementos">
                <?php if (isset($message)) echo "<p>$message</p>"; ?>
                </form>
                <?php if ($imagePath): ?>
                    <img src="<?= $imagePath ?>" style="max-width: 500px;">
                <?php endif; ?>
                <h1><?php echo htmlspecialchars($editar['nome']); ?></h1>
            </div>
            <div class="form-footer">
                <p>Já é promotor?<a href="cadastropromotor.php">Promotor</a></p>
            </div>
            <a href="editar_perfil.php"><button>Editar Perfil</button></a>
        </div>

        <div class="direita">
            <div class="seusEventos">
                <div class="botoesEvento">
                    <button class="andamento" id="alt">Meus Eventos Comprados</button>
                    <button class="passado" id="btn">Meus Eventos Concluídos</button>
                </div>
                <div class="eventos" id="eventos">
                <?php
                    include_once "conexao.php";

                    // Verifique se o id_usuario existe na sessão
                    if (isset($_SESSION['id_usuario'])) {
                        // Pega o id_usuario da sessão
                        $id_usuario = $_SESSION['id_usuario'];

                        // Consulta utilizando INNER JOIN para buscar nome do evento e foto
                        $sql = "
                    SELECT evento.nome,evento.descricao
                    FROM ingresso
                    INNER JOIN evento ON ingresso.evento_id = evento.id
                    WHERE ingresso.id_usuario = ?
                        ";

                        // Prepare e execute a consulta utilizando sua conexão existente
                        $stmt = $conexao->prepare($sql);
                        $stmt->execute([$id_usuario]);
                        foreach ($stmt as $dados) {
                            ?>
                            <div class="emandamento">
                                <img src="imagens/imgPerfil/AdobeStock_293894349.jpg" alt="">
                                <p><?= $dados["descricao"] ?></p>
                                <label><?= $dados["nome"] ?></label>
                            </div>
                            <?php
                        }
                    } else {
                        echo "Nenhum evento encontrado.";
                    }
                    ?>
                </div>
                
                <div class="eventosPassados" id="eventosPassados">
                    <!-- Eventos passados aqui -->

                    <div class="eventos" id="eventos">
                    <?php
                    include_once "conexao.php";
                    $stmt = $conexao->prepare("SELECT * FROM evento e, favoritos f WHERE e.id = f.evento_id && f.usuario_id = :id && f.status = 0");
                    $stmt->bindParam("id", $_SESSION['id_usuario']);
                    $stmt->execute();
                    while ($dados = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <div class="emandamento">
                            <img src="imagens/imgPerfil/AdobeStock_293894349.jpg" alt="">
                            <p>Como promotor de eventos em São Paulo, moldo espaços para celebrar, deixando meu legado na cultura local.
                            </p>
                            <label><?= $dados["nome"] ?></label>
                            <a href="editar.php?id=<?= $dados['id'] ?>"></a><button class="Login">editar</button></a>
                            <a href="excluir_evento.php?id=<?= $dados['id'] ?>"></a><button class="Login">apagar</button></a>
                        </div>
                    <?php
                    }
                    ?>
                   
                </div>
                </div>
            </div>
        </div>
        
    </main>
    <?php include_once "footer.php" ?>

    <script>
        $(document).ready(() => {
            $('#alt').click(() => {
                $('#eventos').show();
                $('#eventosPassados').hide();
            });
            $('#btn').click(() => {
                $('#eventos').hide();
                $('#eventosPassados').show();
            });
        });
    </script>
</body>
</html>
