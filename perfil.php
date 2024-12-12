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
    <style>
        .promovidos{
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 3%;
            width: 100%;
            border: 1px solid rgba(114, 114, 114, 0.267);
            flex-direction: column;
        }
    </style>
</head>

<body>
    <?php
    include_once "header_deslogar.php";
    include_once "conexao.php";
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
                <?php if (isset($message))
                    echo "<p>$message</p>"; ?>
                </form>
                <?php if ($imagePath): ?>
                    <img src="<?= $imagePath ?>" style="max-width: 500px;">
                <?php endif; ?>
                <div class="nome">
                    <h1><?php echo htmlspecialchars($editar['nome']); ?></h1>
                </div>

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

                <div class="eventos" id="eventosComprados">
                    <?php

                    if (isset($_SESSION['id_usuario'])) {
                        $id_usuario = $_SESSION['id_usuario'];
                        $sql = "
        SELECT evento.nome, evento.descricao, evento.imagens
        FROM ingresso
        INNER JOIN evento ON ingresso.evento_id = evento.id
        WHERE ingresso.id_usuario = ?
        ";
                        $stmt = $conexao->prepare($sql);
                        $stmt->execute([$id_usuario]);
                        foreach ($stmt as $dados) {
                            $caminhosImagens = json_decode($dados['imagens'], true);
                            ?>
                            <div class="emandamento">
                                <img src="<?= htmlspecialchars($caminhosImagens[0] ?? '') ?>" alt="">
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Monstre seu ingresso
                                </button>
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
                <div class="eventosPassados" id="eventosPromovidos">
                    <div class="promovidos">
                        <?php
                        if (isset($_SESSION['id_usuario'])) {
                            $id_usuario = $_SESSION['id_usuario'];
                            $sql = "SELECT evento.*
            FROM evento
            INNER JOIN promotores ON evento.id_promotor = promotores.id
            WHERE promotores.id_usuario = :id_usuario";
                            $stmt = $conexao->prepare($sql);
                            if ($stmt) {
                                $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                                $stmt->execute();
                                $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                if ($resultados) {
                                    foreach ($resultados as $dados) {
                                        $caminhosImagens = json_decode($dados['imagens'], true);
                                        ?>
                                        <div class="emandamento">
                                            <p><?= $dados["nome"] ?></p>
                                            <img src="<?= htmlspecialchars($caminhosImagens[0] ?? '') ?>" alt="">
                                            <a href="editar.php?id=<?= $dados['id'] ?>"><button
                                            class="reserva">Reservar</button></a>
                                        </div>
                                        <?php
                                    }
                                } else {
                                }
                            } else {
                                echo "Erro ao preparar a consulta.";
                            }
                        } else {
                            echo "Usuário não está logado.";
                        }
                        ?>
                    </div>
                </div>

            </div>

            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const altButton = document.getElementById('alt');
                    const btnButton = document.getElementById('btn');
                    const eventosComprados = document.getElementById('eventosComprados');
                    const eventosPromovidos = document.getElementById('eventosPromovidos');

                    if (altButton && btnButton && eventosComprados && eventosPromovidos) {
                        altButton.addEventListener('click', () => {
                            eventosComprados.style.display = 'block';
                            eventosPromovidos.style.display = 'none';
                        });
                        btnButton.addEventListener('click', () => {
                            eventosComprados.style.display = 'none';
                            eventosPromovidos.style.display = 'block';
                        });
                    } else {
                        console.error('Elementos não encontrados.');
                    }
                });
            </script>







</body>

</html>