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
    // Verificando se o campo 'sobre' está vazio e atribuindo um valor padrão caso necessário
$sobre = !empty($editar['sobre']) ? $editar['sobre'] : 'Texto padrão sobre o perfil';

    $pdo = new PDO('mysql:host=localhost;dbname=taketicket', 'root', ''); // Ajuste as credenciais
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Selecionar o texto da tabela
    $stmt = $pdo->query('SELECT * FROM editar_nome LIMIT 1'); // Apenas um registro
    $editar = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$editar) {
        die('Nenhum evento encontrado. Insira dados na tabela.');
    }
} catch (PDOException $e) {
    die('Erro ao conectar ao banco de dados: ' . $e->getMessage());
}
?>
<?php 
try {
    // Conexão com o banco de dados
    // Verificando se o campo 'sobre' está vazio e atribuindo um valor padrão caso necessário
$sobre = !empty($editar_sobre['sobre']) ? $editar_sobre['sobre'] : 'Texto padrão sobre o perfil';

    $pdo = new PDO('mysql:host=localhost;dbname=taketicket', 'root', ''); // Ajuste as credenciais
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Selecionar o texto da tabela
    $stmt = $pdo->query('SELECT * FROM editar_sobre LIMIT 1'); // Apenas um registro
    $editar2 = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$editar2) {
        die('Nenhum evento encontrado. Insira dados na tabela.');
    }
} catch (PDOException $e) {
    die('Erro ao conectar ao banco de dados: ' . $e->getMessage());
}
?>
    <main class="Perfil">
        <div class="esquerda">
            <div class="elementos">
            <img src="<?php echo htmlspecialchars($editar03['caminho_imagem']); ?>" alt="Imagem do Perfil">
                <div class="sobreMin">
                <a href="perfil_editar.php?id=<?php echo $editar['id']; ?>">
    <button>Editar Perfil</button>
    </a>
                <h1><?php echo htmlspecialchars($editar['texto']); ?></h1>
            </div>
            <div class="Sobre">
    <h1>Sobre</h1>
</div>
<div class="resumo">
    <p><?php echo htmlspecialchars($editar2['sobre']); ?></p>
</div>

            <div class="form-footer">
            <p>Já é promotor?<a href="cadastropromotor.php">Promotor</a></p>
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
                        <a href="editar.php?id=<?=$dados['id']?>"></a><button class="Login">editar</button></a>
                        <a href="excluir_evento.php?id=<?=$dados['id']?>"></a><button class="Login">apagar</button></a>
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