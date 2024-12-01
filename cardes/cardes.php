<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/carde.css">
    <title>cartas da pagina inicial</title>
</head>

<body>
    <main>
        <div class="cartasTema">
            <?php
            include "conexao.php"
                ?>
            <?php

            $pdo = new PDO('mysql:host=localhost;dbname=TakeTicket', 'root', '');
            $stmt = $pdo->query("SELECT * FROM evento");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // Percorre cada evento e exibe os dados
            foreach ($results as $dados) {
                $caminhosImagens = json_decode($dados['imagens'], true); 
                ?>
                <div class="carta1">
                <?php if (!empty($caminhosImagens)): ?>
        <img src="<?= htmlspecialchars($caminhosImagens[0] ?? '') ?>" alt="Imagem do evento" class="cartaimg">
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
                    <a href="Evento.php?id=<?= $dados['id'] ?>"><button class="reserva">Reservar</button></a>
                </div>
                </div>

                <?php
            } // Fim do foreach
            ?>
        </div>
    </main>
</body>

</html>