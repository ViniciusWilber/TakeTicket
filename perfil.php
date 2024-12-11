<?
session_start();
include_once "conexao.php";

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://kit.fontawesome.com/224a2d2542.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/perfil_usuario.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/header.css">
    <title>Perfil/ViniciusWilber</title>
</head>

<body>
    <?php
    include_once "header_deslogar.php";
    $id = $_SESSION['id_usuario'];
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=taketicket', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Selecionar o texto da tabela
        $stmt = $pdo->prepare('SELECT * FROM usuario WHERE id_usuario = :id');
        $stmt->bindParam('id', $id);
        $stmt->execute();
        $editar = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$editar) {
            die('Nenhum evento encontrado. Insira dados na tabela.');
        }
    } catch (PDOException $e) {
        die('Erro ao conectar ao banco de dados: ' . $e->getMessage());
    }
    

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($_FILES['image']['name']);

        if (!is_dir($uploadDir))
            mkdir($uploadDir, 0777, true);

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
    if ($result && $row = $result->fetch(PDO::FETCH_ASSOC))
        $imagePath = $row['image_path'];
    ?>
      <main class="Perfil">
        <div class="esquerda">
            <div class="elementos">
                <?php if (isset($message)) echo "<p>$message</p>"; ?>
                </form>
                <?php if ($imagePath): ?>
                    <img src="<?= $imagePath ?>" style="max-width: 500px;">
                <?php endif; ?>
                <div class="nome"> <h1><?php echo htmlspecialchars($editar['nome']); ?></h1></div>
    
            </div>
            <div class="botoes">
            <a href="editar_perfil_promotor.php"><button>
  <span class="transition"></span>
  <span class="gradient"></span>
  <span class="label">Editar Perfil</span>
</button></a>
            <a href="cadastroevento.php"><button>
  <span class="transition"></span>
  <span class="gradient"></span>
  <span class="label">Criar Evento</span>
</button></a>
            </div>
            <div class="social-buttons">
  <a href="#" class="social-button facebook">
    <i class="fab fa-facebook-f"></i>
  </a>
  <a href="#" class="social-button instagram">
    <i class="fab fa-instagram"></i>
  </a>
  <a href="#" class="social-button whatsapp">
    <i class="fab fa-whatsapp"></i>
  </a>
</div>




        </div>

        <div class="direita">
            <div class="seusEventos">
                <div class="botoesEvento">
                    <button class="andamento" id="alt">Meus Eventos Comprados</button>
                    <button class="passado" id="btn">Meus Eventos Promovidos</button>
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
                    SELECT evento.nome,evento.descricao,evento.imagens
                    FROM ingresso
                    INNER JOIN evento ON ingresso.evento_id = evento.id
                    WHERE ingresso.id_usuario = ?
                        ";
                        // Prepare e execute a consulta utilizando sua conexão existente
                        $stmt = $conexao->prepare($sql);
                        $stmt->execute([$id_usuario]);
                        foreach ($stmt as $dados) {
                            $caminhosImagens = json_decode($dados['imagens'], true);
                            ?>
                            <div class="emandamento">
                                <img src="<?= htmlspecialchars($caminhosImagens[0] ?? '') ?>" alt="">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Monstre seu ingresso
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: white;">
                                                    QR-CODE do seu ingresso</h1>
                                            </div>
                                            <div class="modal-body">
                                                <img src="imagen/qr-code.jpg" alt="Descrição da imagem" width="300"
                                                    height="200">

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

                    <div class="eventos" id="eventosPassados">
                        <?php
                        include_once "conexao.php";
                        // $stmt = $conexao->prepare("SELECT * FROM evento e, favoritos f WHERE e.id = f.evento_id && f.usuario_id = :id && f.status = 0");
                        // $stmt->bindParam("id", $_SESSION['id_usuario']);
                        // $stmt->execute();
                        // while ($dados = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        //     ?>
                        <div class="emandamento">
                            <!-- //     <img src="imagens/imgPerfil/AdobeStock_293894349.jpg" alt="">
                        //         <p>Como promotor de eventos em São Paulo, moldo espaços para celebrar, deixando meu legado
                        //             na cultura local.
                        //         </p>
                        //         <label><?= $dados["nome"] ?></label>
                        //         <a href="editar.php?id=<?= $dados['id'] ?>"></a><button class="Login">editar</button></a>
                        //         <a href="excluir_evento.php?id=<?= $dados['id'] ?>">rgsvevsevse</a><button
                        //             class="Login">apagar</button></a>
                        //     </div>
                        //     <?php
                        // }
                        

                        if (isset($_SESSION['id_usuario'])) {
                            // Recupera o id_usuario da sessão
                            $id_usuario = $_SESSION['id_usuario'];

                            // Query para buscar os eventos relacionados ao id_usuario
                            $sql = "SELECT * FROM evento WHERE id_usuario = ?"; // Ajuste conforme a estrutura da sua tabela
                        
                            // Prepare a consulta
                            $stmt = $conexao->prepare($sql);

                            // Execute a consulta passando o id_usuario
                            $stmt->execute([$id_usuario]);

                            // Verifique se encontrou resultados
                            if ($stmt->rowCount() > 0) {
                                // Exibe os eventos encontrados
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    echo "Nome do evento: " . $row['nome'] . "<br>";
                                    echo "Descrição do evento: " . $row['descricao'] . "<br>";
                                    // Outros campos que você deseja exibir
                                }
                            } else {
                                echo "Nenhum evento encontrado para este usuário.";
                            }
                        } else {
                            echo "Você precisa estar logado para ver os eventos.";
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