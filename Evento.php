<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/evento.css">
    <title>Evento</title>
    <style>
        /* Estilos para a mensagem flutuante */
        .login-message {
            position: fixed;
            top: 20%;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 15px 25px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
            z-index: 1000;
            display: none;
            /* Inicialmente oculta */
        }

        .login-message a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <?php
    include_once "header.php";
    include_once "conexao.php"
        ?>
    <main>
        <?php
        $pdo = new PDO('mysql:host=localhost;dbname=TakeTicket', 'root', '');
        $id = $_GET["id"];

        $stmt = $pdo->query("SELECT * FROM evento where id= $id");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results)
            // Decodificar o campo 'imagens' para obter as URLs
        
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
        <form action="pagamento.php">

            <?php
            foreach ($results as $dados) {
                $caminhosImagens = json_decode($dados['imagens'], true);
                ?>
                <section class="sec1">

                    <div class="titulo">
                        <h1><?= $dados["nome"] ?></h1>
                    </div>
                    <?php
                    ?>
                    <div class="imagensInicio">
                        <?php if (!empty($caminhosImagens)): ?>
                            <img src="<?= htmlspecialchars($caminhosImagens[0] ?? '') ?>" alt="Imagem do evento" class="foto_1">
                            <img src="<?= htmlspecialchars($caminhosImagens[1] ?? '') ?>" alt="Imagem do evento" class="foto_2">
                            <img src="<?= htmlspecialchars($caminhosImagens[2] ?? '') ?>" alt="Imagem do evento" class="foto_3">
                            <img src="<?= htmlspecialchars($caminhosImagens[3] ?? '') ?>" alt="Imagem do evento" class="foto_4">
                        <?php else: ?>
                            <p>Imagem não encontrada.</p>
                        <?php endif; ?>
                    </div>
                    <div class="titulo2">
                        <h2><?= $dados["nome"] ?></h2>
                    </div>

                </section>
                <section class="sec2">
                    <div class="info">
                        <div class="conteudo">
                            <div class="caracteristicas">
                                <div class="sobre1">
                                    <img src="imagens/imgEvento/New Ticket.png" alt="">
                                    <p>50 milhões de ingressos vendidos</p>
                                </div>
                                <div class="sobre2">
                                    <img src="imagens/imgEvento/Master.png" alt="">
                                    <p>Mais de 10 milhões de pessoas já foram ao MASP</p>
                                </div>
                            </div>
                            <div class="gerais">

                            <div class="promotor">

    <div class="infos">
    <?php
$conexao = $pdo->prepare("
    SELECT promotores.nome
    FROM evento
    INNER JOIN promotores ON evento.id_promotor = promotores.id
    WHERE evento.id = :id
");
$conexao->bindParam(':id', $id, PDO::PARAM_INT);
$conexao->execute();
// Obtendo o resultado
$results = $conexao->fetch(PDO::FETCH_ASSOC);

// Verificando se retornou algo
if ($results && isset($results['nome'])) {
    $nome_promotor = htmlspecialchars($results['nome']);
} else {
    $nome_promotor = "Nenhum promotor encontrado.";
}
?>
<div class="promotor">
    <?php if ($imagePath): ?>
        <img src="<?= htmlspecialchars($imagePath) ?>" class="imagem-arredondada">
    <?php endif; ?>

    <div class="infos">
        <h1 class="name"><?php echo $nome_promotor; ?></h1>
        <h3 class="sobrePromote">Promotor a mais de 5 anos</h3>
    </div>
</div>
    </div>
</div>
                                </div>
                                <hr>
                                <div class="infoEvento">
                                    <div class="localizacao">
                                        <img src="imagens/imgMASP/PlaceMarker.png" alt="">
                                        <h1>Localização</h1>
                                    </div>
                                    <a class="paulista" href=""> <?= $dados["logradouro"] ?>,<?= $dados["numero"] ?> -
                                        <?= $dados["bairro"] ?>, <?= $dados["cidade"] ?> - <?= $dados["estado"] ?>,
                                        <?= $dados["CEP"] ?></a>
                                    <div class="sobreEvento">
                                        <img src="imagens/imgMASP/Medal.png" alt="">
                                        <h1>Sobre o evento</h1>
                                    </div>
                                    <p class="masp"><?= $dados["descricao"] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cartaValor">
                        <h1>Reservar</h1>
                        <h3><?= $dados["data_inicio"] ?></h3>
                        <p></p>
                        <div class="valorEvento">
                            <p>R$<?= $dados["valor"] ?></p>
                        </div>
                        <P>Dia unico</P>
                        <a href="pagamento.php?id=<?= $dados['id'] ?>&nome=<?= urlencode($dados['nome']) ?>" class="compra"
                            id="comprarLink" style="text-decoration: none;">Comprar +</a>

                        <!-- Div flutuante para a mensagem de login -->
                        <div id="loginMessage" class="login-message" style="display: none;">
                            <p>Você precisa estar logado para realizar a compra, <a href="login.php">faça login aqui.</a>
                            </p>
                        </div>
                    </div>
                </section>
                <section>
                </section>
                <div class="contato">
                </div>
                <section class="Mapa">
                    <h1>Onde ira acontercer</h1>
                    <div class="maps">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.191156797823!2d-46.656639899999995!3d-23.561577099999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce59a982d7d41b%3A0x817f5ffa0b46dec7!2sAv.%20Paulista%2C%201578%20-%20Bela%20Vista%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2001310-200!5e0!3m2!1spt-BR!2sbr!4v1714169100917!5m2!1spt-BR!2sbr"
                            width="1200" height="650" style="border:0; border-radius: 1rem;" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div>
                        <a class="linkMaps"
                            href="https://www.google.com/maps/place/Museu+de+Arte+de+S%C3%A3o+Paulo+Assis+Chateaubriand/@-23.561414,-46.6558819,15z/data=!4m6!3m5!1s0x94ce59ceb1eb771f:0xe904f6a669744da1!8m2!3d-23.561414!4d-46.6558819!16zL20vMDJfazR2?entry=ttu"
                            target="_blank">Click aqui para ver o local</a>
                    </div>
                    <h2>Museu de Arte de São Paulo encontra-se desde 7 de novembro de 1968 na Avenida Paulista, cidade de
                        São
                        Paulo</h2>

                </section>
            </form>
            <?php
            }
            ?>
    </main>
    <?php
    include_once "footer.php"
        ?>
    <script>
        document.getElementById('comprarLink').addEventListener('click', function (event) {
            // Verifique se o usuário está logado
            <?php if (isset($_SESSION['id_usuario'])): ?>
                // O usuário está logado, permite o clique e segue o link
                // Não fazemos nada aqui, o link funcionará normalmente
            <?php else: ?>
                // O usuário não está logado, impede o clique e mostra a mensagem flutuante
                event.preventDefault();  // Impede o redirecionamento
                document.getElementById('loginMessage').style.display = 'block';  // Exibe a mensagem flutuante

                // Após 5 segundos, a mensagem desaparece
                setTimeout(function () {
                    document.getElementById('loginMessage').style.display = 'none';
                }, 5000);
            <?php endif; ?>
        });

    </script>
</body>

</html>