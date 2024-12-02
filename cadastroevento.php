<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface Simples</title>
    <link rel="stylesheet" href="css/cadastroEvento.css">
</head>

<body>

    <?php include_once "header.php"; ?>

    <main>
        <form action="cadastrar.php" method="POST" enctype="multipart/form-data">
            <div class="geral">
                <!-- Seção de Informações Básicas -->

                <fieldset class="container">
                    <legend>Informações importantes</legend>
                    <div class="section2">
                        <form>
                            <input type="text" id="nome" name="nome" placeholder="Nome do evento" required
                                maxlength="100" class="input_nome">
                            <input type="text" id="nome" name="nome" placeholder="Frase de efeito" required
                                maxlength="100" class="input_nome">
                            <p>Descrição do evento</p>
                            <textarea id="descricao-evento" rows="5"
                                placeholder="Adicione aqui a descrição do seu evento..." name="descricao"></textarea>

                            <div>
                                <div class="parte_ingresso">
                                    <label for="imagem-divulgacao">Imagem de divulgação</label>
                                    <input type="file" id="imagem-divulgacao" accept=".jpg, .jpeg, .png, .gif"
                                        aria-describedby="imagem-instrucao" name="imagens[]" multiple class="input-box">
                                    </select>

                                </div>
                                </select>
                                <?php

                                $pdo = new PDO('mysql:host=localhost;dbname=TakeTicket', 'root', '');
                                $stmt = $pdo->query("SELECT * FROM evento_categoria");
                                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                // Percorre cada evento e exibe os dados
                                
                                ?><label for="categoria">Escolha uma categoria:</label>
                                <select id="categoria" name="nome_categoria" placeholder="quantidade de ingressos">
                                    <?php
                                    foreach ($results as $dados) {
                                        // Aqui estamos assumindo que "nome_categoria" é a coluna que você deseja exibir
                                        echo '<option value="' . $dados['nome_categoria'] . '">' . $dados['nome_categoria'] . '</option>';
                                    }

                                    // Usando um laço for no lugar do foreach
                                    
                                    ?>
                                </select>


                                </select>

                            </div>
                    </div>
                </fieldset>
                <fieldset class="container">
                    <legend>Ingressos</legend>
                    <input type="valor" name="valor" class="input-box"
                        placeholder="nome do ingresso, ex: ingresso vip, 1ª lote, 2ª lote">
                    <div class="parte_ingresso">
                        <input type="valor" name="valor" class="input-box" placeholder="valor">
                        <input type="valor" name="valor" class="input-box" placeholder="quantidade de ingressos">
                    </div>
                </fieldset>
                <!-- Seção de Descrição do Evento -->

                <fieldset class="container">
                    <legend>Data e horário</legend>
                    <div class="data">
                        <fieldset class="quadrado">
                            <label for="data-inicio">Início</label>
                            <input type="date" id="data-inicio" class="input-box" value="2024-09-04" name="data_inicio">
                            <input type="time" id="hora-inicio" class="input-box" value="19:30" name="hora_inicio">
                        </fieldset>
                        <fieldset class="quadrado">
                            <label for="data-inicio">Fim</label>
                            <input type="date" id="data-inicio" class="input-box" value="2024-09-04" name="hora_fim">
                            <input type="time" id="hora-inicio" class="input-box" value="19:30" name="data_fim">
                        </fieldset>
                    </div>
                    <button class="animated-button">
                        <svg viewBox="0 0 24 24" class="arr-2" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z">
                            </path>
                        </svg>
                        <span class="text">Cadastrar</span>
                        <span class="circle"></span>
                        <svg viewBox="0 0 24 24" class="arr-1" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z">
                            </path>
                        </svg>
                    </button>
                </fieldset>
                <fieldset class="container1">
                    <legend>Informações básicas</legend>
                    <section class="section1">


                        <?php
                        $usuario = $_SESSION['id_usuario']; // ID do usuário da sessão
                        
                        $pdo = new PDO('mysql:host=localhost;dbname=TakeTicket', 'root', '');

                        // Prepara a consulta para buscar o promotor com o mesmo id_usuario
                        $stmt = $pdo->prepare("SELECT * FROM promotores WHERE id_usuario = :id_usuario");
                        $stmt->bindParam(':id_usuario', $usuario, PDO::PARAM_INT);
                        $stmt->execute();

                        // Pega o resultado
                        $promotor = $stmt->fetch(PDO::FETCH_ASSOC);

                        ?>

                        <!-- Verifica se o promotor foi encontrado antes de gerar o input -->
                        <?php if ($promotor): ?>
                            <input type="text" name="id_promotor" value="<?= $promotor['id'] ?>">
                        <?php else: ?>
                            <p>Promotor não encontrado.</p>
                        <?php endif; ?>

                        </select>
                        <div class="info">
                            <input type="text" id="rua" name="logradouro" class="input-box" placeholder="Rua/Avenida">
                        </div>
                        <div class="info">
                            <input type="text" id="cep" name="CEP" class="input-box" placeholder="CEP">
                        </div>
                        <div class="info">
                            <input type="text" id="bairro" name="bairro" class="input-box" placeholder="Bairro">
                        </div>
                        <div class="info">
                            <input type="text" id="rua" name="referencia" class="input-box" placeholder="referencia">
                        </div>
                    </section>
                    <section class="section1">
                        <div class="info">
                            <input type="text" id="numero" name="numero" class="input-box" placeholder="Número">
                        </div>
                        <div class="info">
                            <input type="text" id="complemento" name="complemento" maxlength="250"
                                placeholder="Complemento" class="input-box">
                        </div>
                        <div class="info">
                            <input type="text" id="cidade" name="cidade" class="input-box" placeholder="Cidade">
                        </div>
                        <div class="info">
                            <input type="text" id="estado" name="estado" class="input-box" placeholder="Estado">
                        </div>
                    </section>
                </fieldset>
        </form>
        </div>
        <!-- Seção 5: Ingressos -->
    </main>
    <?php
    include_once "footer.php";
    ?>
</body>

</html>