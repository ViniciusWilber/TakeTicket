<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface Simples</title>
    <link rel="stylesheet" href="css/cadastroEvento.css">
</head>

<body>

    <?php
    $pdo = new PDO('mysql:host=localhost;dbname=TakeTicket', 'root', '');
    $id = $_GET["id"];

    $stmt = $pdo->query("SELECT * FROM evento where id= $id");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($results as $dados) {
        ?>

        <main>
            <form action="admin/editar.php" method="POST">
                <div class="geral">
                    <!-- Seção de Informações Básicas -->
                    <fieldset class="container1">
                        <legend>Informações básicas</legend>
                        <section class="section1">


                            <label for="escolha">Escolha um promotor:</label>
                            <input type="text">
                            <option value="1">Lucas - 1</option>
                            <input type="text" name="id" value="<?= $dados["id"] ?>">

                            </select>

                            <div class="info">

                                <input type="text" id="rua" name="logradouro" class="input-box" placeholder="Rua/Avenida"
                                    value="<?= $dados["logradouro"] ?>">
                            </div>


                            <div class="info">
                                <input type="text" id="cep" name="CEP" class="input-box" placeholder="CEP"
                                    value="<?= $dados["CEP"] ?>">
                            </div>


                            <div class="info">

                                <input type="text" id="bairro" name="bairro" class="input-box" placeholder="Bairro"
                                    value="<?= $dados["bairro"] ?>">
                            </div>
                        </section>
                        <section class="section1">
                            <div class="info">

                                <input type="text" id="numero" name="numero" class="input-box" placeholder="Número"
                                    value="<?= $dados["numero"] ?>">
                            </div>
                            <div class="info">

                                <input type="text" id="complemento" name="complemento" class="input-box" maxlength="250"
                                    placeholder="Complemento" value="<?= $dados["complemento"] ?>">
                            </div>




                            <div class="info">

                                <input type="text" id="cidade" name="cidade" class="input-box" placeholder="Cidade"
                                    value="<?= $dados["cidade"] ?>">
                            </div>

                            <div class="info">

                                <input type="text" id="estado" name="estado" class="input-box" placeholder="Estado"
                                    value="<?= $dados["estado"] ?>">
                            </div>
                        </section>

                    </fieldset>

                    <fieldset class="container">
                        <legend>Informações básicas</legend>

                        <div class="section">

                            <form>
                                <label for="nome">Nome do evento *</label>
                                <input type="text" id="nome" name="nome" placeholder="Nome do evento" required
                                    maxlength="100" value="<?= $dados["nome"] ?>">

                                <label for="imagem-divulgacao">Imagem de divulgação (opcional)</label>
                                <input type="file" id="imagem-divulgacao" accept=".jpg, .jpeg, .png, .gif"
                                    aria-describedby="imagem-instrucao">

                                <label for="">valor</label>
                                <input type="text" name="valor" value="<?= $dados["valor"] ?>">

                                </select>
                            </form>

                        </div>
                    </fieldset>
                    <!-- Seção de Descrição do Evento -->
                    <fieldset class="container">
                        <legend>Descrição do evento</legend>

                        <p>Conte todos os detalhes do seu evento, como a programação e os diferenciais da sua produção.</p>
                        <textarea id="descricao-evento" rows="5" placeholder="Adicione aqui a descrição do seu evento..."
                            name="descricao"></textarea>

                    </fieldset>
                    <fieldset class="container">
                        <legend>Data e horário</legend>

                        <div class="data">
                            <fieldset class="quadrado">

                                <label for="data-inicio">Início *</label>
                                <input type="date" id="data-inicio" class="input-box" value="2024-09-04" name="horario">
                                <input type="time" id="hora-inicio" class="input-box" value="19:30" name="hora">


                            </fieldset>
                            <fieldset class="quadrado">
                                <label for="">dexrição</label>
                                <input type="text" name="descricao">


                            </fieldset>
                            <label for="">local</label>
                            <input type="text" name="endereco">
                        </div>
                        <button class="animated-button">
                            <svg viewBox="0 0 24 24" class="arr-2" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z">
                                </path>
                            </svg>
                            <span class="text">editar</span>
                            <span class="circle"></span>
                            <svg viewBox="0 0 24 24" class="arr-1" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z">
                                </path>
                            </svg>
                        </button>
                    </fieldset>
            </form>
            </div>
            <!-- Seção 5: Ingressos -->

        </main>
    <?php
    }
    include_once "footer.php";
    ?>

</body>

</html>