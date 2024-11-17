<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://kit.fontawesome.com/224a2d2542.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/perfil.css">
    <title>Perfil/ViniciusWilber</title>
</head>
<body>
    <?php
        include_once "header.php";
      ?>
    <main class="Perfil">
        <div class="esquerda">
            <div class="elementos">
                <img src="imagens/imgPerfil_usuario/usuario.jpg" alt="" id="imgPerfil">
                <div class="sobreMin">
                <div class="nome">
                    <h1>Elma Maria</h1>
                    <h5>Usuaria do app a 2 anos.</h5>
                </div>
                <div class="promotor">
                    <h2>Tornar-se um <a href="virarpromotor.php"><button> Promotor</button></a></h2>
                </div>
            </div>
      
                <div class="resumo">
                    <p>  Elma Maria é uma educadora apaixonada pela arte de ensinar e pelo impacto que a educação pode gerar na vida das pessoas. 
                        Com mais de 20 anos de experiência na área, ela se dedicou a transformar salas de aula em espaços acolhedores e inspiradores 
                        para seus alunos. Nascida em uma pequena cidade do interior, Elma sempre acreditou que a educação seria o caminho para mudar 
                        sua realidade e a de sua comunidade. </p>
                </div>
            </div>
            </div>
        </div>
        <div class="direita">

            <div class="seusEventos">
                <div class="botoesEvento">
                    <button class="andamento" id="alt">Meus Eventos Atuais</button>
                    <button class="passado" id="btn">Meus Eventos Concluídos</button>
                </div>
                <div class="eventos" id="eventos">
                <?php
        $pdo = new PDO('mysql:host=localhost;dbname=TakeTicket', 'root', '');
            $stmt = $pdo->query("SELECT * FROM evento");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($results) > 0) {
                // Percorre cada evento e exibe os dados
                foreach ($results as $dados) {
        ?>
                    <div class="emandamento">
                        <img src="imagens/imgPerfil/AdobeStock_293894349.jpg" alt="">
                        <p>Como promotor de eventos em São Paulo, moldo espaços para celebrar, deixando meu legado na cultura local.
                        </p>
                        <label><?=$dados["nome"] ?></label>
                        <button><a href="editar.php?id=<?=$dados['id']?>">editar</a></button>
                        <button><a href="excluir_evento.php?id=<?=$dados['id']?>">apagar</a></button>
                    </div>
                    <?php
            } // Fim do foreach
        } else {
            echo "Nenhum evento encontrado.";
        }
    ?>
                    <div class="emandamento">
                        <img src="imagens/imgPerfil/AdobeStock_123555466.jpg" alt="">
                        <p>Trago vida a espaços, deixando minha marca na cena cultural da cidade.</p>
                        <label>DD/MM/AAAA</label>
                    </div>
                    <div class="emandamento">
                        <img src="imagens/imgPerfil/AdobeStock_343234676.jpg" alt="">
                        <p>Na Paulista, como promotor de eventos, deixo minha marca na cena cultural da cidade.</p>
                        <label>DD/MM/AAAA</label>
                    </div>
                </div>
                <div class="eventosPassados" id="eventosPassados">
                    <div class="emandamento">
                        <img src="imagens/imgPerfil/Rectangle 4.png" alt="">
                        <p>O MASP é considerado  Museu de arte mais importante do Hemisfério Sul</p>
                        <label>DD/MM/AAAA</label>
                    </div>
                    <div class="emandamento">
                        <img src="imagens/imgPerfil/AdobeStock_124150799.jpg" alt="">
                        <p>Na Ponte Estaiada, como promotor de eventos, deixo minha marca na cena cultural da cidade.</p>
                        <label>DD/MM/AAAA</label>
                    </div>
                    <div class="emandamento">
                        <img src="imagens/imgPerfil/AdobeStock_124355455.jpg" alt="">
                        <p>Deixo minha marca na cena cultural da cidade que nunca para.</p>
                        <label>DD/MM/AAAA</label>
                    </div>
                    <div class="emandamento">
                        <img src="imagens/imgPerfil/AdobeStock_369248728.jpg" alt="">
                        <p>Deixo minha marca na cena cultural deste enclave glamoroso.</p>
                        <label>DD/MM/AAAA</label>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
        include_once "footer.php"
      ?>
    <script>
        $(document).ready(()=>{
            $('#alt').click(() =>{
                $('#eventos').show();
                $('#eventosPassados').hide();
            });
            $('#btn').click(() =>{
                $('#eventos').hide();
                $('#eventosPassados').show();
            });
        });
    </script>
</body>
</html>