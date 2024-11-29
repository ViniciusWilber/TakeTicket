<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/carde.css">
    <title>Cartas da Página Inicial</title>
</head>
<body>
    <main>
        <div class="cartasTema">
            <?php
            include "conexao.php";
            session_start(); // Iniciar a sessão para acessar o usuário logado

            // Verifique se o usuário está logado, caso contrário, redirecione
            if (!isset($_SESSION['usuario_id'])) {
                echo "<p>Você precisa estar logado para favoritar eventos.</p>";
                exit;
            }

            $pdo = new PDO('mysql:host=localhost;dbname=TakeTicket', 'root', '');
            $stmt = $pdo->query("SELECT * FROM evento");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($results as $dados) {
            ?>
                <div class="carta1">
                    <img class="cartaimg" src="imagens/imgPerfil/AdobeStock_369248728.jpg" alt="">
                    <div class="grupo">
                        <div class="textocarta">
                            <h1> <?= $dados["nome"] ?></h1>
                            <p><?= $dados["horario"] ?></p>
                            <h2><?= $dados["valor"] ?></h2>
                        </div>
                        <div class="iconcard">
                            <button class="favoritar" data-evento-id="<?= $dados["id"] ?>">
                                <i class="fa-solid fa-heart"></i> Favoritar
                            </button>
                        </div>
                    </div>
                    <div class="butao">
                        <button class="reserva">
                            <a href="Evento.php?id=<?= $dados['id'] ?>">Reservar</a>
                        </button>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btnFavoritos = document.querySelectorAll('.favoritar');

            btnFavoritos.forEach(btn => {
                btn.addEventListener('click', () => {
                    let eventoId = btn.getAttribute('data-evento-id');
                    favoritar(eventoId);
                });
            });

            function favoritar(eventoId) {
                fetch('favoritar.php?id=' + eventoId)
                .then(resposta => resposta.text())
                .then(dados => {
                    alert(dados); // Exibe a resposta do PHP (sucesso ou erro)
                })
                .catch(erro => console.error('Erro ao favoritar:', erro));
            }
        });
    </script>
</body>
</html>
