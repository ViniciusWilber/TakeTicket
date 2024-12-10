<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/224a2d2542.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <title>Take Ticket</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/carde.css">
    <style>
        .img1{
            width: 54rem;
        }
        .img2{
        width: 16rem;
            }.img3{
        width: 37.5rem;}
        </style>
</head>

<body>
    <?php
    include_once "header.php";
    include "conexao.php"
        ?>
    <main>
        <section class="primeira">
            <div class="texto1">
                <p>Com mais de 10000 eventos realizados</p>
                <h1 class="tituloIndex">Uma forma diferente de encontrar seu </h1>
                <h1 class="tituloCor">Passeio Cultural em São Paulo.</h1>
            </div>
            <div class="imagens">
                <img src="imagens/imgIndex/Rectangle 36.png" alt="" class="img1">
                <div>
                <img src="imagens/imgIndex/Rectangle 38.png" alt="" class="img2">
                <img src="imagens/imgIndex/Rectangle 37.png" alt="" class="img3">
                </div>
            </div>
        </section>
        <div class="campoDeBusca">
            <div class="search">
                <div class="search-box">
                    <div class="search-field">
                        <!--input do pesquisar--><input placeholder="Search..." class="input"
                            type="text"><!--input do pesquisar-->
                        <div class="search-box-icon">
                            <button class="btn-icon-content">
                                <i class="search-icon">
                                    <svg xmlns="://www.w3.org/2000/svg" version="1.1" viewBox="0 0 512 512">
                                        <path
                                            d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"
                                            fill="#fff"></path>
                                    </svg>
                                </i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <section class="navegacao">
            <nav class="navg">
                <button id="click1" class="meu-botao"><img src="imagens/imgIcon/Exhibition.png"
                        alt="">Destaques</button>
                <button id="click2" class="meu-botao"><img src="imagens/imgIcon/University.png" alt="">Museus</button>
                <button id="click3" class="meu-botao"><img src="imagens/imgIcon/UNESCO.png" alt="">Sociais</button>
                <button id="click4" class="meu-botao"><img src="imagens/imgIcon/Adventures.png"
                        alt="">Excursões</button>
                <button id="click5" class="meu-botao"><img src="imagens/imgIcon/Trekking.png" alt="">Trilhas</button>
                <button id="click6" class="meu-botao"><img src="imagens\imgIcon\Airplane-Take-Off.ico"
                        alt="">Viagens</button>
                <button id="click7" class="meu-botao"><img src="imagens/imgIcon/Sun Lounger.png" alt="">Ferias</button>
                <button id="click8" class="meu-botao"><img src="imagens/imgIcon/Movie Projector.png"
                        alt="">Atrações</button>
            </nav>
            <div class="conjunto1">
                <div class="cartas">
                    <div class="cartasTema">
                        <?php
                       
                        $stmt = $conexao->query("SELECT * FROM evento");
                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        // Percorre cada evento e exibe os dados
                        foreach ($results as $dados) {
                            $caminhosImagens = json_decode($dados['imagens'], true);
                            ?>
                            <div class="carta1">
                                <?php if (!empty($caminhosImagens)): ?>
                                    <img src="<?= htmlspecialchars($caminhosImagens[0] ?? '') ?>" alt="Imagem do evento"
                                        class="cartaimg">
                                <?php else: ?>
                                    <p>Imagem não encontrada.</p>
                                <?php endif; ?>
                                <div class="grupo">
                                    <div class="textocarta">
                                        <h1> <?= $dados["nome"] ?></h1>
                                        <p><?= $dados["data_inicio"] ?></p>
                                        <h2><?= $dados["valor"] ?></h2>
                                    </div>
                                    <div class="iconcard">
                                        <button class="favoritar" id="favoritar<?= $dados["id"] ?>"><i id="coracao"
                                                class="fa fa-solid fa-heart" style="font-size: 25px;"></i></button>
                                        <a href=""><i id="link" class="fa fa-share-alt"></i></a>
                                    </div>
                                </div>
                                <div class="butao">
                                    <a href="Evento.php?id=<?= $dados['id'] ?>"><button
                                            class="reserva">Reservar</button></a>
                                </div>
                            </div>
                            <?php
                        } // Fim do foreach
                        ?>
                    </div>
                </div>
                <div class="cartasMuseus">
                    <div class="cartasTema">
                        <?php
                        include "conexao.php"
                            ?>
                        <?php
                         // SELECT * FROM `evento` WHERE 1
                         if (!isset($_GET['nome_evento'])) {
                            header("location:index.php");
                        }

                        $nome = "%".trim($_GET['nome_evento'])."%";

                        $dbh = new PDO('mysql:host=127.0.0.1;dbname=taketicket', 'root', 'root1234');

                        $sth =  $dbh->prepare('SELECT * FROM evento WHERE `nome` LIKE :nome');
                        $sth->bindParam(':nome', $nome, PDO::PARAM_STR);
                        $sth->execute();

                        $resultados = $sth->fetchAll(PDO::FETCH_ASSOC);

                        print_r($resultados); exit;

                        $stmt = $conexao->query("SELECT * FROM evento WHERE nome_categoria = 'Museus'");
                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        // Percorre cada evento e exibe os dados
                        foreach ($results as $dados) {
                            ?>
                            <div class="carta1">
                                <img class="cartaimg" src="imagens/imgPerfil/AdobeStock_369248728.jpg" alt="">
                                <div class="grupo">
                                    <div class="textocarta">
                                        <h1> <?= $dados["nome"] ?></h1>
                                        <p><?= $dados["data_inicio"] ?></p>
                                        <h2><?= $dados["valor"] ?></h2>
                                    </div>
                                    <div class="iconcard">
                                        <a href=""><i id="coracao" class="fa-solid fa-heart"></i></a>
                                        <a href=""><i id="link" class="fa fa-share-alt"></i></a>
                                    </div>
                                </div>
                                <div class="butao">
                                    <a href="Evento.php?id=<?= $dados['id'] ?>"><button
                                            class="reserva">Reservar</button></a>
                                </div>
                            </div>
                            <?php
                        } // Fim do foreach
                        ?>
                    </div>
                </div>
                <div class="cartasSociais">
                    <div class="cartasTema">
                        <?php
                        $stmt = $conexao->query("SELECT * FROM evento WHERE nome_categoria = 'Sociais'");
                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        // Percorre cada evento e exibe os dados
                        foreach ($results as $dados) {
                            ?>
                            <div class="carta1">
                                <img class="cartaimg" src="imagens/imgPerfil/AdobeStock_369248728.jpg" alt="">
                                <div class="grupo">
                                    <div class="textocarta">
                                        <h1> <?= $dados["nome"] ?></h1>
                                        <p><?= $dados["data_inicio"] ?></p>
                                        <h2><?= $dados["valor"] ?></h2>
                                    </div>
                                    <div class="iconcard">
                                        <a href=""><i id="coracao" class="fa-solid fa-heart"></i></a>
                                        <a href=""><i id="link" class="fa fa-share-alt"></i></a>
                                    </div>
                                </div>
                                <div class="butao">
                                    <a href="Evento.php?id=<?= $dados['id'] ?>"><button
                                            class="reserva">Reservar</button></a>
                                </div>
                            </div>
                            <?php
                        } // Fim do foreach
                        ?>
                    </div>
                </div>
                <div class="cartasExcursoes">
                    <div class="cartasTema">s
                        <?php
                        $stmt = $conexao->query("SELECT * FROM evento WHERE nome_categoria = 'Excursões'");
                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        // Percorre cada evento e exibe os dados
                        foreach ($results as $dados) {
                            ?>
                            <div class="carta1">
                                <img class="cartaimg" src="imagens/imgPerfil/AdobeStock_369248728.jpg" alt="">
                                <div class="grupo">
                                    <div class="textocarta">
                                        <h1> <?= $dados["nome"] ?></h1>
                                        <p><?= $dados["data_inicio"] ?></p>
                                        <h2><?= $dados["valor"] ?></h2>
                                    </div>
                                    <div class="iconcard">
                                        <a href=""><i id="coracao" class="fa-solid fa-heart"></i></a>
                                        <a href=""><i id="link" class="fa fa-share-alt"></i></a>
                                    </div>
                                </div>
                                <div class="butao">
                                    <a href="Evento.php?id=<?= $dados['id'] ?>"><button
                                            class="reserva">Reservar</button></a>
                                </div>
                            </div>
                            <?php
                        } // Fim do foreach
                        ?>
                    </div>
                </div>
                <div class="cartasTrilhas">
                    <div class="cartasTema">
                        <?php
                        $stmt = $conexao->query("SELECT * FROM evento WHERE nome_categoria = 'Trilhas'");
                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        // Percorre cada evento e exibe os dados
                        foreach ($results as $dados) {
                            ?>
                            <div class="carta1">
                                <img class="cartaimg" src="imagens/imgPerfil/AdobeStock_369248728.jpg" alt="">
                                <div class="grupo">
                                    <div class="textocarta">
                                        <h1> <?= $dados["nome"] ?></h1>
                                        <p><?= $dados["data_inicio"] ?></p>
                                        <h2><?= $dados["valor"] ?></h2>
                                    </div>
                                    <div class="iconcard">
                                        <a href=""><i id="coracao" class="fa-solid fa-heart"></i></a>
                                        <a href=""><i id="link" class="fa fa-share-alt"></i></a>
                                    </div>
                                </div>
                                <div class="butao">
                                    <a href="Evento.php?id=<?= $dados['id'] ?>"><button
                                            class="reserva">Reservar</button></a>
                                </div>
                            </div>
                            <?php
                        } // Fim do foreach
                        ?>
                    </div>
                </div>
                <div class="cartasViagens">
                    <div class="cartasTema">
                        <?php
                        $stmt = $conexao->query("SELECT * FROM evento WHERE nome_categoria = 'Viagens'");
                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        // Percorre cada evento e exibe os dados
                        foreach ($results as $dados) {
                            ?>
                            <div class="carta1">
                                <img class="cartaimg" src="imagens/imgPerfil/AdobeStock_369248728.jpg" alt="">
                                <div class="grupo">
                                    <div class="textocarta">
                                        <h1> <?= $dados["nome"] ?></h1>
                                        <p><?= $dados["data_inicio"] ?></p>
                                        <h2><?= $dados["valor"] ?></h2>
                                    </div>
                                    <div class="iconcard">
                                        <a href=""><i id="coracao" class="fa-solid fa-heart"></i></a>
                                        <a href=""><i id="link" class="fa fa-share-alt"></i></a>
                                    </div>
                                </div>
                                <div class="butao">
                                    <a href="Evento.php?id=<?= $dados['id'] ?>"><button
                                            class="reserva">Reservar</button></a>
                                </div>
                            </div>
                            <?php
                        } // Fim do foreach
                        ?>
                    </div>
                </div>
                <div class="cartasFerias">
                    <div class="cartasTema">
                        <?php
                        $stmt = $conexao->query("SELECT * FROM evento WHERE nome_categoria = 'Ferias'");
                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        // Percorre cada evento e exibe os dados
                        foreach ($results as $dados) {
                            ?>
                            <div class="carta1">
                                <img class="cartaimg" src="imagens/imgPerfil/AdobeStock_369248728.jpg" alt="">
                                <div class="grupo">
                                    <div class="textocarta">
                                        <h1> <?= $dados["nome"] ?></h1>
                                        <p><?= $dados["data_inicio"] ?></p>
                                        <h2><?= $dados["valor"] ?></h2>
                                    </div>
                                    <div class="iconcard">
                                        <a href=""><i id="coracao" class="fa-solid fa-heart"></i></a>
                                        <a href=""><i id="link" class="fa fa-share-alt"></i></a>
                                    </div>
                                </div>
                                <div class="butao">
                                    <a href="Evento.php?id=<?= $dados['id'] ?>"><button
                                            class="reserva">Reservar</button></a>
                                </div>
                            </div>
                            <?php
                        } // Fim do foreach
                        ?>
                    </div>
                </div>
                <div class="cartasAtracoes">
                    <div class="cartasTema">
                        <?php
                        include "conexao.php"
                            ?>
                        <?php
                        $stmt = $conexao->query("SELECT * FROM evento WHERE nome_categoria = 'Atrações'");
                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        // Percorre cada evento e exibe os dados
                        foreach ($results as $dados) {
                            $caminhosImagens = json_decode($dados['imagens'], true);
                            ?>
                            <div class="carta1">
                                <?php if (!empty($caminhosImagens)): ?>
                                    <img src="<?= htmlspecialchars($caminhosImagens[0] ?? '') ?>" alt="Imagem do evento"
                                        class="foto_1">
                                <?php else: ?>
                                    <p>Imagem não encontrada.</p>
                                <?php endif; ?>
                                <div class="grupo">
                                    <div class="textocarta">
                                        <h1> <?= $dados["nome"] ?></h1>
                                        <p><?= $dados["data_inicio"] ?></p>
                                        <h2><?= $dados["valor"] ?></h2>
                                    </div>
                                    <div class="iconcard">
                                        <a href=""><i id="coracao" class="fa-solid fa-heart"></i></a>
                                        <a href=""><i id="link" class="fa fa-share-alt"></i></a>
                                    </div>
                                </div>
                                <div class="butao">
                                    <a href="Evento.php?id=<?= $dados['id'] ?>"><button
                                            class="reserva">Reservar</button></a>
                                </div>
                            </div>

                            <?php
                        } // Fim do foreach
                        ?>
                    </div>
                </div>
        </section>
        <section class="curioso">
            <h1>Curiosidades por São Paulo</h1>
            <div class="curiosidades">
                <img src="imagens/imgIndex/Rectangle 66.png" alt="">
                <img src="imagens/imgIndex/Rectangle 67.png" alt="">
                <img src="imagens/imgIndex/Rectangle 68.png" alt="">
                <img src="imagens/imgIndex/Rectangle 69.png" alt="">
                <img src="imagens/imgIndex/Rectangle 70.png" alt="">
            </div>
            <p>Seja qual for a sua preferência, São Paulo tem algo para todos. Prepare-se para se surpreender com a
                diversidade cultural e a hospitalidade calorosa do Estado. Visite São Paulo!</p>
        </section>
        <div class="cookies-msg" id="cookies-msg">
            <div class="cookies-txt">
                <p>Para melhor personalizar sua experiência, este site utiliza cookies que nos ajudam a entender como
                    você interage com o conteúdo. Ao continuar navegando, você concorda com o uso de cookies.</p>
            </div>
            <div class="cookies-btn">
                <button id="aceitar">Aceitar</button>
            </div>
        </div>
    </main>
    <script>
        const favoritar = document.querySelectorAll(".favoritar")
        favoritar.forEach((coracao) => {
            //console.log(coracao)
            coracao.addEventListener('click', () => {
                //console.log(coracao.value)
                fetch('favoritar.php?id=' + coracao.value)
                    .then((resposta) => {
                        return resposta.text()

                    })
                    .then((retorno) => {
                        console.log(retorno)
                    })
            })
        })
    </script>
    <?php
    include_once "footer.php"
        ?>
    <script src="js/Pagina1.js"></script>
</body>

</html>