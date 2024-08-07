<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" 
    content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/224a2d2542.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <title>Take Ticket</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        include_once "header.php";
      ?>
    <main>
        <section class="primeira" >
            <div class="texto1" >
                <p>Com mais de 10000 eventos realizados</p>
                <h1 class="tituloIndex">Uma forma diferente de encontrar seu </h1>
                <h1 class="tituloCor">passeio cultural em São Paulo.</h1>    
            </div>
            <div class="imagens">
                <img src="imagens/imgIndex/Rectangle 36.png" alt="" class="img1">
                <img src="imagens/imgIndex/Rectangle 38.png" alt="" class="img2">
                <img src="imagens/imgIndex/Rectangle 37.png" alt="" class="img3">
            </div>
        </section>
        <div class="campoDeBusca">
            <div class="search">
                <div class="search-box">
                  <div class="search-field">
                    <input placeholder="Search..." class="input" type="text">
                    <div class="search-box-icon">
                      <button class="btn-icon-content">
                        <i class="search-icon">
                          <svg xmlns="://www.w3.org/2000/svg" version="1.1" viewBox="0 0 512 512"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" fill="#fff"></path></svg>
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
                <button id="click1" class="meu-botao"><img src="imagens/imgIcon/Exhibition.png" alt="">Destaques</button>
                <button id="click2" class="meu-botao"><img src="imagens/imgIcon/University.png" alt="">Museus</button>
                <button id="click3" class="meu-botao"><img src="imagens/imgIcon/UNESCO.png" alt="">Sociais</button>
                <button id="click4" class="meu-botao"><img src="imagens/imgIcon/Adventures.png" alt="">Excursões</button>
                <button id="click5" class="meu-botao"><img src="imagens/imgIcon/Trekking.png" alt="">Trilhas</button>
                <button id="click6" class="meu-botao"><img src="imagens/imgIcon/Airplane Take Off.png" alt="">Viagens</button>
                <button id="click7" class="meu-botao"><img src="imagens/imgIcon/Sun Lounger.png" alt="">Ferias</button>
                <button id="click8" class="meu-botao"><img src="imagens/imgIcon/Movie Projector.png" alt="">Atrações</button>
            </nav>
            <div class="conjunto1">
                <div class="cartas" >
                    <div class="cartasTema">
                        <div class="carta1">
                            <img class="cartaimg" src="imagens/imgIndex/Rectangle 66.png" alt="">
                            <div class="grupo">
                                <div class="textocarta">
                                    <h1>museu de são paulo</h1>
                                    <p>dia 8 AGO</p>
                                    <h2>R$: 100,00</h2>
                                </div>
                                <div class="iconcard">
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="butao">
                                <a href="Evento.php"><button class="reserva">Reservar</button></a>
                            </div>
                        </div>
                        <div class="carta1">
                            <img class="cartaimg" src="imagens/imgPerfil/AdobeStock_369248728.jpg" alt="">
                            <div class="grupo">
                                <div class="textocarta">
                                    <h1>Monaco Paulista</h1>
                                    <p>dia 29 FEV</p>
                                    <h2>R$: 1250,00</h2>
                                </div>
                                <div class="iconcard">
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="butao">
                                <button class="reserva">Reservar</button>
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
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
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
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
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
                                    <h1>são paulo</h1>
                                    <p>dia 25 JUL</p>
                                    <h2>R$: 40,00</h2>
                                </div>
                                <div class="iconcard">
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
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
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="butao">
                                <button class="reserva">Reservar</button>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="cartasMuseus">
                    <div class="cartasTema">
                        <div class="carta1">
                            <img class="cartaimg" src="imagens/imgPerfil/AdobeStock_124355455.jpg" alt="">
                            <div class="grupo">
                                <div class="textocarta">
                                    <h1>Lago legal</h1>
                                    <p>dia 10 JUN</p>
                                    <h2>R$: 130,00</h2>
                                </div>
                                <div class="iconcard">
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
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
                                    <h1>são paulo</h1>
                                    <p>dia 25 JUL</p>
                                    <h2>R$: 40,00</h2>
                                </div>
                                <div class="iconcard">
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="butao">
                                <button class="reserva">Reservar</button>
                            </div>
                        </div>
                        <div class="carta1">
                            <img class="cartaimg" src="imagens/imgIndex/Rectangle 66.png" alt="">
                            <div class="grupo">
                                <div class="textocarta">
                                    <h1>outro de são paulo</h1>
                                    <p>dia 5 AGO</p>
                                    <h2>R$: 160,00</h2>
                                </div>
                                <div class="iconcard">
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
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
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
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
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="butao">
                                <button class="reserva">Reservar</button>
                            </div>
                        </div>
                        <div class="carta1">
                            <img class="cartaimg" src="imagens/imgPerfil/AdobeStock_369248728.jpg" alt="">
                            <div class="grupo">
                                <div class="textocarta">
                                    <h1>Monaco Paulista</h1>
                                    <p>dia 29 FEV</p>
                                    <h2>R$: 1250,00</h2>
                                </div>
                                <div class="iconcard">
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="butao">
                                <button class="reserva">Reservar</button>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="cartasSociais">
                    <div class="cartasTema">
                        <div class="carta1">
                            <img class="cartaimg" src="imagens/imgIndex/Rectangle 68.png" alt="">
                            <div class="grupo">
                                <div class="textocarta">
                                    <h1>museu de são paulo</h1>
                                    <p>dia 5 AGO</p>
                                    <h2>R$: 160,00</h2>
                                </div>
                                <div class="iconcard">
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="butao">
                                <a href="Evento.php"><button class="reserva">Reservar</button></a>
                            </div>
                        </div>
                        <div class="carta1">
                            <img class="cartaimg" src="imagens/imgPerfil/AdobeStock_369248728.jpg" alt="">
                            <div class="grupo">
                                <div class="textocarta">
                                    <h1>Monaco Paulista</h1>
                                    <p>dia 29 FEV</p>
                                    <h2>R$: 1250,00</h2>
                                </div>
                                <div class="iconcard">
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
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
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
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
                                    <h1>são paulo</h1>
                                    <p>dia 25 JUL</p>
                                    <h2>R$: 40,00</h2>
                                </div>
                                <div class="iconcard">
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
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
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="butao">
                                <button class="reserva">Reservar</button>
                            </div>
                        </div>
                        <div class="carta1">
                            <img class="cartaimg" src="imagens/imgPerfil/AdobeStock_369248728.jpg" alt="">
                            <div class="grupo">
                                <div class="textocarta">
                                    <h1>Monaco Paulista</h1>
                                    <p>dia 29 FEV</p>
                                    <h2>R$: 1250,00</h2>
                                </div>
                                <div class="iconcard">
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="butao">
                                <button class="reserva">Reservar</button>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="cartasExcursoes">
                    <div class="cartasTema">
                        <div class="carta1">
                            <img class="cartaimg" src="imagens/imgPerfil/AdobeStock_124355455.jpg" alt="">
                            <div class="grupo">
                                <div class="textocarta">
                                    <h1>Lago legal</h1>
                                    <p>dia 10 JUN</p>
                                    <h2>R$: 130,00</h2>
                                </div>
                                <div class="iconcard">
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
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
                                    <h1>são paulo</h1>
                                    <p>dia 25 JUL</p>
                                    <h2>R$: 40,00</h2>
                                </div>
                                <div class="iconcard">
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="butao">
                                <button class="reserva">Reservar</button>
                            </div>
                        </div>
                        <div class="carta1">
                            <img class="cartaimg" src="imagens/imgIndex/Rectangle 66.png" alt="">
                            <div class="grupo">
                                <div class="textocarta">
                                    <h1>museu de são paulo</h1>
                                    <p>dia 5 AGO</p>
                                    <h2>R$: 160,00</h2>
                                </div>
                                <div class="iconcard">
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
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
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
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
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="butao">
                                <button class="reserva">Reservar</button>
                            </div>
                        </div>
                        <div class="carta1">
                            <img class="cartaimg" src="imagens/imgPerfil/AdobeStock_369248728.jpg" alt="">
                            <div class="grupo">
                                <div class="textocarta">
                                    <h1>Monaco Paulista</h1>
                                    <p>dia 29 FEV</p>
                                    <h2>R$: 1250,00</h2>
                                </div>
                                <div class="iconcard">
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="butao">
                                <button class="reserva">Reservar</button>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="cartasTrilhas">
                    <div class="cartasTema">
                        <div class="carta1">
                            <img class="cartaimg" src="imagens/imgIndex/trilha1.jpg" alt="">
                            <div class="grupo">
                                <div class="textocarta">
                                    <h1>museu de são paulo</h1>
                                    <p>dia 5 AGO</p>
                                    <h2>R$: 160,00</h2>
                                </div>
                                <div class="iconcard">
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="butao">
                                <a href="Evento.php"><button class="reserva">Reservar</button></a>
                            </div>
                        </div>
                        <div class="carta1">
                            <img class="cartaimg" src="imagens/imgIndex/trilha2.jpg" alt="">
                            <div class="grupo">
                                <div class="textocarta">
                                    <h1>Republica</h1>
                                    <p>dia 12 JUL</p>
                                    <h2>R$: 630,00</h2>
                                </div>
                                <div class="iconcard">
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
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
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="butao">
                                <button class="reserva">Reservar</button>
                            </div>
                        </div>
                        <div class="carta1">
                            <img class="cartaimg" src="imagens/imgIndex/trilha3.jpg" alt="">
                            <div class="grupo">
                                <div class="textocarta">
                                    <h1>são paulo</h1>
                                    <p>dia 25 JUL</p>
                                    <h2>R$: 40,00</h2>
                                </div>
                                <div class="iconcard">
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
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
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="butao">
                                <button class="reserva">Reservar</button>
                            </div>
                        </div>
                        <div class="carta1">
                            <img class="cartaimg" src="imagens/imgIndex/trilha4.jpg" alt="">
                            <div class="grupo">
                                <div class="textocarta">
                                    <h1>Monaco Paulista</h1>
                                    <p>dia 29 FEV</p>
                                    <h2>R$: 1250,00</h2>
                                </div>
                                <div class="iconcard">
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="butao">
                                <button class="reserva">Reservar</button>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="cartasViagens">
                    <div class="cartasTema">
                        <div class="carta1">
                            <img class="cartaimg" src="imagens/imgPerfil/AdobeStock_123555466.jpg" alt="">
                            <div class="grupo">
                                <div class="textocarta">
                                    <h1>Republica</h1>
                                    <p>dia 12 JUL</p>
                                    <h2>R$: 630,00</h2>
                                </div>
                                <div class="iconcard">
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
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
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="butao">
                                <button class="reserva">Reservar</button>
                            </div>
                        </div>
                        <div class="carta1">
                            <img class="cartaimg" src="imagens/imgPerfil/AdobeStock_369248728.jpg" alt="">
                            <div class="grupo">
                                <div class="textocarta">
                                    <h1>Monaco Paulista</h1>
                                    <p>dia 29 FEV</p>
                                    <h2>R$: 1250,00</h2>
                                </div>
                                <div class="iconcard">
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="butao">
                                <button class="reserva">Reservar</button>
                            </div>
                        </div>
                        <div class="carta1">
                            <img class="cartaimg" src="imagens/imgIndex/Rectangle 66.png" alt="">
                            <div class="grupo">
                                <div class="textocarta">
                                    <h1>museu de são paulo</h1>
                                    <p>dia 5 AGO</p>
                                    <h2>R$: 160,00</h2>
                                </div>
                                <div class="iconcard">
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="butao">
                                <a href="Evento.php"><button class="reserva">Reservar</button></a>
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
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="butao">
                                <button class="reserva">Reservar</button>
                            </div>
                        </div>
                        <div class="carta1">
                            <img class="cartaimg" src="imagens/imgPerfil/AdobeStock_369248728.jpg" alt="">
                            <div class="grupo">
                                <div class="textocarta">
                                    <h1>Monaco Paulista</h1>
                                    <p>dia 29 FEV</p>
                                    <h2>R$: 1250,00</h2>
                                </div>
                                <div class="iconcard">
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="butao">
                                <button class="reserva">Reservar</button>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="cartasFerias">
                    <div class="cartasTema">
                        <div class="carta1">
                            <img class="cartaimg" src="imagens/imgIndex/trilha3.jpg" alt="">
                            <div class="grupo">
                                <div class="textocarta">
                                    <h1>museu de são paulo</h1>
                                    <p>dia 5 AGO</p>
                                    <h2>R$: 160,00</h2>
                                </div>
                                <div class="iconcard">
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
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
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
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
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="butao">
                                <button class="reserva">Reservar</button>
                            </div>
                        </div>
                        <div class="carta1">
                            <img class="cartaimg" src="imagens/imgIndex/trilha4.jpg" alt="">
                            <div class="grupo">
                                <div class="textocarta">
                                    <h1>são paulo</h1>
                                    <p>dia 25 JUL</p>
                                    <h2>R$: 40,00</h2>
                                </div>
                                <div class="iconcard">
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
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
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="butao">
                                <button class="reserva">Reservar</button>
                            </div>
                        </div>
                        <div class="carta1">
                            <img class="cartaimg" src="imagens/imgIndex/trilha1.jpg" alt="">
                            <div class="grupo">
                                <div class="textocarta">
                                    <h1>Monaco Paulista</h1>
                                    <p>dia 29 FEV</p>
                                    <h2>R$: 1250,00</h2>
                                </div>
                                <div class="iconcard">
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="butao">
                                <button class="reserva">Reservar</button>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="cartasAtracoes">
                    <div class="cartasTema">
                        <div class="carta1">
                            <img class="cartaimg" src="imagens/imgPerfil/AdobeStock_123555466.jpg" alt="">
                            <div class="grupo">
                                <div class="textocarta">
                                    <h1>Republica</h1>
                                    <p>dia 12 JUL</p>
                                    <h2>R$: 630,00</h2>
                                </div>
                                <div class="iconcard">
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
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
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
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
                                    <h1>são paulo</h1>
                                    <p>dia 25 JUL</p>
                                    <h2>R$: 40,00</h2>
                                </div>
                                <div class="iconcard">
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="butao">
                                <button class="reserva">Reservar</button>
                            </div>
                        </div>
                        <div class="carta1">
                            <img class="cartaimg" src="imagens/imgIndex/Rectangle 66.png" alt="">
                            <div class="grupo">
                                <div class="textocarta">
                                    <h1>museu de são paulo</h1>
                                    <p>dia 5 AGO</p>
                                    <h2>R$: 160,00</h2>
                                </div>
                                <div class="iconcard">
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="butao">
                                <a href="Evento.php"><button class="reserva">Reservar</button></a>
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
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="butao">
                                <button class="reserva">Reservar</button>
                            </div>
                        </div>
                        <div class="carta1">
                            <img class="cartaimg" src="imagens/imgPerfil/AdobeStock_369248728.jpg" alt="">
                            <div class="grupo">
                                <div class="textocarta">
                                    <h1>Monaco Paulista</h1>
                                    <p>dia 29 FEV</p>
                                    <h2>R$: 1250,00</h2>
                                </div>
                                <div class="iconcard">
                                    <a href=""><i class="fa-solid fa-heart"></i></a>
                                    <a href=""><i class="fa fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="butao">
                                <button class="reserva">Reservar</button>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </section>
        <section class="curioso">
            <h1>Curiosidades por são paulo</h1>
            <div class="curiosidades">
                <img src="imagens/imgIndex/Rectangle 66.png" alt="">
                <img src="imagens/imgIndex/Rectangle 67.png" alt="">
                <img src="imagens/imgIndex/Rectangle 68.png" alt="">
                <img src="imagens/imgIndex/Rectangle 69.png" alt="">
                <img src="imagens/imgIndex/Rectangle 70.png" alt="">
            </div>
            <p>Seja qual for a sua preferência, São Paulo tem algo para todos. Prepare-se para se surpreender com a diversidade cultural e a hospitalidade calorosa do Estado. Visite São Paulo!</p>
        </section>
        <div class="cookies-msg" id="cookies-msg">
            <div class="cookies-txt">
                <p>Para melhor personalizar sua experiência, este site utiliza cookies que nos ajudam a entender como você interage com o conteúdo. Ao continuar navegando, você concorda com o uso de cookies.</p>
            </div>
            <div class="cookies-btn">
                <button id="aceitar">Aceitar</button>
            </div>
        </div>
    </main>
    <?php
        include_once "footer.php";
      ?>
    <script src="js/Pagina1.js"></script>
</body>
</html>