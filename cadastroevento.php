
<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface Simples</title>
    <link rel="stylesheet" href="css/cadastroEvento.css">
    <style>
.input_valor{
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
.container_ingresso{
    width: 61%;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    margin-bottom: 20px;
    display: flex
;
    flex-wrap: wrap;
    justify-content: center;
    gap: 1rem;
}
  </style>
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
                            <textarea id="descricao-evento" rows="5"
                                placeholder="Adicione aqui a descrição do seu evento..." name="descricao"></textarea>

                            <div>
                                <div class="parte_ingresso">
                                    <label for="imagem-divulgacao">Imagem de divulgação</label>
                                    <input type="file" id="imagem-divulgacao" accept=".jpg, .jpeg, .png, .gif"
                                        aria-describedby="imagem-instrucao" name="imagens[]" multiple>
                                    </select>
                                </div>
                                </select>
                                <?php

                                $pdo = new PDO('mysql:host=localhost;dbname=TakeTicket', 'root', '');
                                $stmt = $pdo->query("SELECT * FROM evento_categoria");
                                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                // Percorre cada evento e exibe os dados
                                
                                ?>
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
                <fieldset class="container_ingresso">
                    <legend>Ingressos</legend>
                    <input type="valor" name="valor" class="input_valor"
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

                </fieldset>
                <fieldset class="container1">
                    <legend>Informações básicas</legend>
                    <section class="section1">


                        <?php
                        // $usuario = $_SESSION['id_usuario']; // ID do usuário da sessão
                        
                        // $pdo = new PDO('mysql:host=localhost;dbname=TakeTicket', 'root', '');

                        // // Prepara a consulta para buscar o promotor com o mesmo id_usuario
                        // $stmt = $pdo->prepare("SELECT * FROM promotores WHERE id_usuario = :id_usuario");
                        // $stmt->bindParam(':id_usuario', $usuario, PDO::PARAM_INT);
                        // $stmt->execute();

                        // // Pega o resultado
                        // $promotor = $stmt->fetch(PDO::FETCH_ASSOC);

                        // ?>

                        <!-- Verifica se o promotor foi encontrado antes de gerar o input -->
                       
                         <input type="text" name="id_promotor" >
                         <!-- 
                             <p>Promotor não encontrado.</p>
                         -->

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
                    <button class="Login">cadastrar</button>
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