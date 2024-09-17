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
        <div class="geral">
            <!-- Seção de Informações Básicas -->
            <fieldset class="container1">
                <legend>Informações básicas</legend>
                <section class="section1">


                    <div class="primeiro">
                        <div class="info">
                            <label for="rua">Logradouro</label>
                            <input type="text" id="rua" name="rua" class="input-box" placeholder="Rua/Avenida">
                        </div>


                        <div class="info">
                            <label for="cep">CEP</label>
                            <input type="text" id="cep" name="cep" class="input-box" placeholder="CEP">
                        </div>




                        <div class="info">
                            <label for="bairro">Bairro</label>
                            <input type="text" id="bairro" name="bairro" class="input-box" placeholder="Bairro">
                        </div>
                    </div>
                    <section>
                        <div class="info">
                            <label for="numero">Número</label>
                            <input type="text" id="numero" name="numero" class="input-box" placeholder="Número">
                        </div>
                        <div class="info">
                            <label for="complemento">Complemento</label>
                            <input type="text" id="complemento" name="complemento" class="input-box" maxlength="250"
                                placeholder="Complemento">
                        </div>




                        <div class="info">
                            <label for="cidade">Cidade </label>
                            <input type="text" id="cidade" name="cidade" class="input-box" placeholder="Cidade">
                        </div>

                        <div class="info">
                            <label for="estado">Estado</label>
                            <input type="text" id="estado" name="estado" class="input-box" placeholder="Estado">
                        </div>
        

        </fieldset>

        <fieldset class="container">
            <legend>Informações básicas</legend>
            <div class="container">
                <div class="section">

                    <p>Adicione as principais informações do evento.</p>
                    <form>
                        <label for="nome-evento">Nome do evento *</label>
                        <input type="text" id="nome-evento" name="nome-evento" placeholder="Nome do evento" required
                            maxlength="100">

                        <label for="imagem-divulgacao">Imagem de divulgação (opcional)</label>
                        <input type="file" id="imagem-divulgacao" accept=".jpg, .jpeg, .png, .gif"
                            aria-describedby="imagem-instrucao">

                        <label for="assunto">Assunto *</label>
                        <select id="assunto" name="assunto" required>
                            <option value="">Selecione um assunto</option>
                            <!-- Adicione outras opções aqui -->
                        </select>

                        <label for="categoria">Categoria (opcional)</label>
                        <select id="categoria" name="categoria">
                            <option value="">Selecione uma categoria</option>
                            <!-- Adicione outras opções aqui -->
                        </select>
                    </form>
                </div>
            </div>
        </fieldset>
        <!-- Seção de Descrição do Evento -->
        <fieldset class="container">
            <legend>Descrição do evento</legend>

            <p>Conte todos os detalhes do seu evento, como a programação e os diferenciais da sua produção.</p>
            <textarea id="descricao-evento" rows="5"
                placeholder="Adicione aqui a descrição do seu evento..."></textarea>

        </fieldset>
        <fieldset class="container">
            <legend>Data e horário</legend>


            <fieldset class="quadrado">

                <label for="data-inicio">Início *</label>
                <input type="date" id="data-inicio" class="input-box" value="2024-09-04">
                <input type="time" id="hora-inicio" class="input-box" value="19:30">



                <fieldset class="quadrado">

                    <label for="data-termino">Término *</label>
                    <input type="date" id="data-inicio" class="input-box" value="2024-09-06">
                    <input type="time" id="hora-inicio" class="input-box" value="19:30">
                </fieldset>


            </fieldset>

            </div>
            <!-- Seção 5: Ingressos -->

    </main>
    <?php 
        include_once "footer.php"; 
        ?>

</body>

</html>