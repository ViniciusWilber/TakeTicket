<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/carde.css">
    <title>cartas  da pagina inicial</title>
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
        ?>


                        <div class="carta1">
                            <img class="cartaimg" src="imagens/imgPerfil/AdobeStock_369248728.jpg" alt="">
                            <div class="grupo">
                                <div class="textocarta">
                                    <h1> <?=$dados["nome"] ?></h1>
                                    <p><?=$dados["horario"] ?></p>
                                    <h2><?=$dados["valor"] ?></h2>
                                </div>
                                <div class="iconcard">
                                    <a href=""><i id="coracao" class="fa-solid fa-heart"></i></a>
                                    <a href=""><i id="link" class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="butao">
                            <button class="reserva">
    <a href="Evento.php?id=<?=$dados['id']?>">Reservar</a>
    
</button>
                            </div>
                        </div>

                        <?php
            } // Fim do foreach
    ?>


                        <div class="carta1">
                            <img class="cartaimg" src="imagens/imgIndex/Rectangle 66.png" alt="">
                            <div class="grupo">
                                <div class="textocarta">
                                    <h1>Museu de São Paulo</h1>
                                    <p>dia 8 AGO</p>
                                    <h2>R$: 100,00</h2>
                                </div>
                                <div class="iconcard">
                                    <a href=""><i id="coracao" class="fa-solid fa-heart"></i></a>
                                    <a href=""><i id="link" class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="butao">
                                <a href="Evento.php"><button class="reserva">Reservar</button></a>
                            </div>
                        </div>





                        <div class="carta1">
                            <img class="cartaimg" src="imagens/imgPerfil/AdobeStock_123555466.jpg" alt="">
                            <div class="grupo">
                                <div class="textocarta">
                                    <h1>Republica</h1>
                                    <p>dia 12 JUL</p>
                                    <h2>R$: 630,00</h2>
                                </div>
                                <div class="iconcard">
                                    <a href=""><i id="coracao" class="fa-solid fa-heart"></i></a>
                                    <a href=""><i id="link" class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="butao">
                                <button class="reserva">Reservar</button>
                            </div>
                        </div>
                        <div class="carta1">
                            <img class="cartaimg" src="imagens/imgPerfil/AdobeStock_124355455.jpg" alt="">
                            <div class="grupo">
                                <div class="textocarta">
                                    <h1>Lago legal</h1>
                                    <p>dia 10 JUN</p>
                                    <h2>R$: 130,00</h2>
                                </div>
                                <div class="iconcard">
                                    <a href=""><i id="coracao" class="fa-solid fa-heart"></i></a>
                                    <a href=""><i  id="link" class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="butao">
                                <button class="reserva">Reservar</button>
                            </div>
                        </div>
                        <div class="carta1">
                            <img class="cartaimg" src="imagens/imgPerfil/AdobeStock_293894349.jpg" alt="">
                            <div class="grupo">
                                <div class="textocarta">
                                    <h1>São Paulo</h1>
                                    <p>dia 25 JUL</p>
                                    <h2>R$: 40,00</h2>
                                </div>
                                <div class="iconcard">
                                    <a href=""><i id="coracao" class="fa-solid fa-heart"></i></a>
                                    <a href=""><i id="link"  class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="butao">
                                <button class="reserva">Reservar</button>
                            </div>
                        </div>
                        <div class="carta1">
                            <img class="cartaimg" src="imagens/imgPerfil/AdobeStock_343234676.jpg" alt="">
                            <div class="grupo">
                                <div class="textocarta">
                                    <h1>Arrancada de SP</h1>
                                    <p>dia 31 MAR</p>
                                    <h2>R$: 6000,00</h2>
                                </div>
                                <div class="iconcard">
                                    <a href=""><i  id="coracao" class="fa-solid fa-heart"></i></a>
                                    <a href=""><i id="link" class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="butao">
                                <button class="reserva">Reservar</button>
                            </div>
                        </div> 
                    </div>
    </main>
</body>
</html>