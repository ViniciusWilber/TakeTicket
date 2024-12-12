<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface Simples</title>
    <link rel="stylesheet" href="css/cadastroEvento.css">
    <style>
        .input_valor {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .input_valor:focus {
            border: 1px solid #00B2E2;
            /* Azul Tiffany */
            outline: none;
        }

        .container_ingresso {
            width: 61%;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-bottom: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1rem;
        }
    </style>
</head>

<body>
<?php
    include_once "header.php";
    include "conexao.php"
        ?>
    <?php
    include "conexao.php";
    $pdo = new PDO('mysql:host=localhost;dbname=TakeTicket', 'root', '');
    $id = $_GET["id"];

    $stmt = $pdo->query("SELECT * FROM evento where id= $id");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($results as $dados) {
        ?>

        <main>
        <form action="admin/editar.php" method="POST" enctype="multipart/form-data">
    <div class="geral">
        <fieldset class="container">
            <legend>Informações importantes</legend>
            <div class="section2">
                <input type="text" id="nome" name="nome" placeholder="Nome do evento" required maxlength="100" class="input_nome" value="<?= htmlspecialchars($dados["nome"] ?? '') ?>">
                <textarea id="descricao-evento" rows="5" placeholder="Adicione aqui a descrição do seu evento..." name="descricao"><?= htmlspecialchars($dados["descricao"] ?? '') ?></textarea>
                <div>
                    <div class="parte_ingresso">
                        <label for="imagem-divulgacao">Imagem de divulgação</label>
                        <input type="file" id="imagem-divulgacao" accept=".jpg, .jpeg, .png, .gif" aria-describedby="imagem-instrucao" name="imagens[]" multiple>
                    </div>
                    <?php
                    $pdo = new PDO('mysql:host=localhost;dbname=TakeTicket', 'root', '');
                    $stmt = $pdo->query("SELECT * FROM evento_categoria");
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <select id="categoria" name="nome_categoria" placeholder="quantidade de ingressos">
                        <?php
                        foreach ($results as $categoria) {
                            echo '<option value="' . htmlspecialchars($categoria['nome_categoria']) . '">' . htmlspecialchars($categoria['nome_categoria']) . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
        </fieldset>
        <fieldset class="container_ingresso">
            <legend>Ingressos</legend>
            <input type="text" name="valor" class="input_valor" placeholder="nome do ingresso, ex: ingresso vip, 1ª lote, 2ª lote">
            <div class="parte_ingresso">
                <input type="text" name="valor" class="input-box" placeholder="valor" value="<?= htmlspecialchars($dados["valor"] ?? '') ?>">
                <input type="text" name="quantidade_ingressos" class="input-box" placeholder="quantidade de ingressos">
            </div>
        </fieldset>
        <fieldset class="container">
            <legend>Data e horário</legend>
            <div class="data">
                <fieldset class="quadrado">
                    <label for="data-inicio">Início</label>
                    <input type="date" id="data-inicio" class="input-box" name="data_inicio" value="<?= htmlspecialchars($dados["data_inicio"] ?? '') ?>">
                    <input type="time" id="hora-inicio" class="input-box" name="hora_inicio" value="<?= htmlspecialchars($dados["hora_inicio"] ?? '') ?>">
                </fieldset>
                <fieldset class="quadrado">
                    <label for="data-inicio">Fim</label>
                    <input type="date" id="data-fim" class="input-box" name="data_fim" value="<?= htmlspecialchars($dados["data_fim"] ?? '') ?>">
                    <input type="time" id="hora-fim" class="input-box" name="hora_fim" value="<?= htmlspecialchars($dados["hora_fim"] ?? '') ?>">
                </fieldset>
            </div>
        </fieldset>
        <fieldset class="container1">
            <legend>Informações básicas</legend>
            <section class="section1">
                <?php
                $usuario = $_SESSION['id_usuario'];
                if (!$usuario) {
                    die("ID do usuário não está definido na sessão.");
                }
                try {
                    $conexao = new PDO('mysql:host=localhost;dbname=TakeTicket', 'root', '');
                    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conexao->prepare("SELECT * FROM promotores WHERE id_usuario = :id_usuario");
                    $stmt->bindParam(':id_usuario', $usuario, PDO::PARAM_INT);
                    $stmt->execute();
                    $promotor = $stmt->fetch(PDO::FETCH_ASSOC);
                    if (!$promotor) {
                        die("Nenhum promotor encontrado para o ID do usuário: $usuario");
                    }
                } catch (PDOException $e) {
                    die("Erro na conexão ou na consulta: " . $e->getMessage());
                }
                ?>
                <?php if ($promotor && isset($promotor['id'])): ?>
                    <input type="hidden" name="id_promotor" value="<?php echo htmlspecialchars($promotor['id']); ?>">
                <?php else: ?>
                    <input type="hidden" name="id_promotor" value="">
                <?php endif; ?>
                <div class="info">
                    <input type="text" id="rua" name="logradouro" class="input-box" placeholder="Rua/Avenida" value="<?= htmlspecialchars($dados["logradouro"] ?? '') ?>">
                </div>
                <div class="info">
                    <input type="text" id="cep" name="CEP" class="input-box" placeholder="CEP" value="<?= htmlspecialchars($dados["CEP"] ?? '') ?>">
                </div>
                <div class="info">
                    <input type="text" id="bairro" name="bairro" class="input-box" placeholder="Bairro" value="<?= htmlspecialchars($dados["bairro"] ?? '') ?>">
                </div>
                <div class="info">
                    <input type="text" id="referencia" name="referencia" class="input-box" placeholder="referencia" value="<?= htmlspecialchars($dados["referencia"] ?? '') ?>">
                </div>
            </section>
            <section class="section1">
                <div class="info">
                    <input type="text" id="numero" name="numero" class="input-box" placeholder="Número" value="<?= htmlspecialchars($dados["numero"] ?? '') ?>">
                </div>
                <div class="info">
                    <input type="text" id="complemento" name="complemento" maxlength="250" placeholder="Complemento" class="input-box" value="<?= htmlspecialchars($dados["complemento"] ?? '') ?>">
                </div>
                <div class="info">
                    <input type="text" id="cidade" name="cidade" class="input-box" placeholder="Cidade" value="<?= htmlspecialchars($dados["cidade"] ?? '') ?>">
                </div>
                <div class="info">
                    <input type="text" id="estado" name="estado" class="input-box" placeholder="Estado" value="<?= htmlspecialchars($dados["estado"] ?? '') ?>">
                </div>
                <input type="hidden" name="id" value="<?= htmlspecialchars($dados['id'] ?? '') ?>">
            </section>
            <button class="Login">cadastrar</button>
        </fieldset>
    </div>
</form>

            </div>

        </main>
        <?php
    }
    include_once "footer.php";
    ?>

</body>

</html>