<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/evento.css">
    <title>Evento</title>
</head>

<body>
        <?php
            include_once "header.php"
          ?>
    <main>
    <?php

$pdo = new PDO('mysql:host=localhost;dbname=TakeTicket', 'root', '');
            $stmt = $pdo->query("SELECT * FROM evento");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($results) > 0) {
                // Percorre cada evento e exibe os dados
                foreach ($results as $dados) {
        ?>



                        <?php
          
    ?>
        <section class="sec1">
            <div class="titulo">
                <h1><?=$dados["nome"] ?></h1>
            </div>
            <div class="imagensInicio">
                <img src="imagens/imgEvento/Rectangle 34.png" alt="">
                <img src="imagens/imgEvento/Rectangle 35.png" alt="">
                <img src="imagens/imgEvento/Rectangle 32.png" alt="">
                <img src="imagens/imgEvento/Rectangle 33.png" alt="">
            </div>
            <div class="titulo2">
                <h2>Museu de Arte de São Paulo</h2>
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
                            <a href="perfil.php"><img src="imagens/imgEvento/Ellipse 7.png" alt=""></a>
                            <div class="infos">
                                <h1 class="name">José Alves</h1>
                                <h3 class="sobrePromote">Promotor a mais de 5 anos</h3>
                            </div>
                        </div>
                        <hr>
                        <div class="infoEvento">
                            <div class="localizacao">
                                <img src="imagens/imgMASP/PlaceMarker.png" alt="">
                                <h1>Localização</h1>
                            </div>
                            <a class="paulista" href=""> Av. Paulista, 1578 - Bela Vista, São Paulo - SP, 01310-200</a>
                            <div class="sobreEvento">
                                <img src="imagens/imgMASP/Medal.png" alt="">
                                <h1>Sobre o evento</h1>
                            </div>
                            <p class="masp">O MASP é considerado  Museu de arte mais importante do Hemisfério Sul,
                                com cerca de 10.000 peças, abrangendo arte africana, das Américas,
                                asiática, brasileira e europeia, desde a Antiguidade até o século 21, incluindo
                                pinturas, esculturas, desenhos, fotografias e roupas, entre outros. O museu privado e
                                sem fins lucrativos - considerado o primeiro museu moderno do país - foi fundado pelo
                                empresário Assis Chateaubriand em 1947. Ele está situado desde 1968 na Avenida Paulista,
                                em São Paulo.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cartaValor">
                <h1>Reservar</h1>
                <h3><?=$dados["horario"] ?></h3>
                <p><?=$valor["valor"] ?></p>
                <div class="valorEvento">
                    <p>R$50,00</p>
                </div>
                <P>Dia unico</P>
                <a href="pagamento.php"><button class="compra">Comprar +</button></a>
            </div>
        </section>
        <section>
            <div class="carrossel">
                <img src="imagens/imgEvento/Rectangle 59.png" alt="">
                <img src="imagens/imgEvento/Rectangle 60.png" alt="">
                <img src="imagens/imgEvento/Rectangle 61.png" alt="">
                <img src="imagens/imgEvento/Rectangle 62.png" alt="">
            </div>
        </section>
        <div class="contato">
            <div class="enderecos">
                <div>
                    <div class="gmail">
                        <img src="imagens/imgMASP/GmailLogo.png" alt="">
                        <p>Masp.sp@org.br</p>
                    </div>
                    <div class="users">
                        <img src="imagens/imgMASP/Users.png" alt="">
                        <p>200.888k Seguidores</p>
                    </div>
                    <div class="fone">
                        <img src="imagens/imgMASP/Megaphone.png" alt="">
                        <p>Assinantes</p>
                    </div>
                </div>
                <a href="perfil.php"><button class="follow">Follow</button></a>
            </div>
        </div>
        <section class="Mapa">
            <h1>Onde ira acontercer</h1>
            <div class="maps">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.191156797823!2d-46.656639899999995!3d-23.561577099999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce59a982d7d41b%3A0x817f5ffa0b46dec7!2sAv.%20Paulista%2C%201578%20-%20Bela%20Vista%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2001310-200!5e0!3m2!1spt-BR!2sbr!4v1714169100917!5m2!1spt-BR!2sbr"
                    width="1200" height="650" style="border:0; border-radius: 1rem;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div >
                <a class="linkMaps" href="https://www.google.com/maps/place/Museu+de+Arte+de+S%C3%A3o+Paulo+Assis+Chateaubriand/@-23.561414,-46.6558819,15z/data=!4m6!3m5!1s0x94ce59ceb1eb771f:0xe904f6a669744da1!8m2!3d-23.561414!4d-46.6558819!16zL20vMDJfazR2?entry=ttu" target="_blank">Click aqui para ver o local</a>
            </div>
            <h2>Museu de Arte de São Paulo encontra-se desde 7 de novembro de 1968 na Avenida Paulista, cidade de São
                Paulo</h2>
        </section>
        <?php
          } // Fim do foreach
        }
        ?>
    </main>
    <?php
        include_once "footer.php"
      ?>
</body>

</html>