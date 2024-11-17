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
<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <title>Header da página</title>
</head>
<body>
    <main>
        <header>
            <a href="index.php" class="logo"><img src="imagens/imgIndex/LogoSletras.png" alt=""></a>
            <ul class="botoes">
                <?php if (isset($_SESSION["id_usuario"])): ?>
                    <a href="logout.php"><button class="Login">deslogar</button></a>
                <?php else: ?>
                    <a href="login.php"><button class="Login">Login</button></a>
                <?php endif; ?>
            </ul>   
        </header>
    </main>
</body>
</html>
<body>
    <main class="Perfil">
        <div class="esquerda">
        <button></button>
            <div class="elementos">
                <img src="imagens/imgPerfil_usuario/usuario.jpg" alt="" id="imgPerfil">
                <div class="sobreMin">
                <div class="nome"> 
                  
                  <?php 
                    include_once "conexao.php";
                  if (isset($_SESSION['id_usuario'])) {
        $id_usuario = $_SESSION['id_usuario'];
    
            $query = $conexao->prepare("SELECT nome FROM usuario WHERE id_usuario = :id");
            $query->bindParam(':id', $id_usuario, PDO::PARAM_INT);
            $query->execute();
    
            // Verificar se a consulta retornou algum resultado
            if ($query->rowCount() > 0) {
                $usuario = $query->fetch(PDO::FETCH_ASSOC);
                $nome = $usuario['nome'];
                
            } else {
                echo "Nenhum usuário encontrado com esse ID.<br>";
            }
        } 
 
    
  ?> 
                    <h1><?= htmlspecialchars($nome) ?></h1>
                    <h5>Usuário ativo há mais de 3 anos</h5>
                </div>

            </div>
                      <?php
  
  
  
    echo htmlspecialchars($_SESSION['email']);

    
    // Verificar se o ID do usuário está na sessão
 ?>        
            </div>
        </div>
        <div class="direita">
            <div class="seusEventos">
                <div class="botoesEvento">
                    <button class="andamento" id="alt">Meus eventos ativos</button>
                    <button class="passado" id="btn">Favoritos</button>
                </div>
                <div class="eventos" id="eventos">
                    <div class="emandamento">
                        <img src="imagens/imgPerfil/AdobeStock_293894349.jpg" alt="">
                        <p>Como promotor de eventos em São Paulo, moldo espaços para celebrar, deixando meu legado na cultura local.
                        </p>
                        <label>DD/MM/AAAA</label>
                    </div>
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