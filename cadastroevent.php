<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface Simples</title>
    <link rel="stylesheet" href="css/cadastroevent.css">
</head>

<body>

        <?php include_once "header.php"; ?>

    <main>
        <div class="geral">
            <!-- Seção de Informações Básicas -->
            <div class="container">
                <div class="section1">
                    <h3>1. Onde o seu evento vai acontecer?</h3>


                    <!-- Campos para endereço -->
                    <input type="text" id="endereco" name="endereco" class="input-box" placeholder="Endereço">
                    <span class="small-text">Campo Obrigatório</span>

                    <label for="nome-local">Nome do Local *</label>
                    <input type="text" id="nome-local" name="nome-local" class="input-box" maxlength="100"
                        placeholder="Nome do Local">

                    <label for="cep">CEP</label>
                    <input type="text" id="cep" name="cep" class="input-box" placeholder="CEP">

                    <label for="rua">Logradouro</label>
                    <input type="text" id="rua" name="rua" class="input-box" placeholder="Rua/Avenida">

                    <label for="numero">Número</label>
                    <input type="text" id="numero" name="numero" class="input-box" placeholder="Número">

                    <label for="complemento">Complemento</label>
                    <input type="text" id="complemento" name="complemento" class="input-box" maxlength="250"
                        placeholder="Complemento">

                    <label for="bairro">Bairro</label>
                    <input type="text" id="bairro" name="bairro" class="input-box" placeholder="Bairro">

                    <label for="cidade">Cidade </label>
                    <input type="text" id="cidade" name="cidade" class="input-box" placeholder="Cidade">

                    <label for="estado">Estado</label>
                    <input type="text" id="estado" name="estado" class="input-box" placeholder="Estado">

                </div>
            </div>
            <div class="container">
                <div class="section">
                    <h3>2. Informações básicas</h3>
                    <p>Adicione as principais informações do evento.</p>
                    <form>
                        <label for="nome-evento">Nome do evento *</label>
                        <input type="text" id="nome-evento" name="nome-evento" placeholder="Nome do evento" required
                            maxlength="100">

                        <label for="imagem-divulgacao">Imagem de divulgação (opcional)</label>
                        <input type="file" id="imagem-divulgacao" accept=".jpg, .jpeg, .png, .gif"
                            aria-describedby="imagem-instrucao">
                        <small id="imagem-instrucao">A dimensão recomendada é de 1600 x 838. Formato JPEG, GIF ou PNG de
                            no máximo 2MB.</small>

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

            <!-- Seção de Descrição do Evento -->
            <div class="container">
                <div class="section">
                    <h3>3. Descrição do evento</h3>
                    <p>Conte todos os detalhes do seu evento, como a programação e os diferenciais da sua produção.</p>
                    <textarea id="descricao-evento" rows="5"
                        placeholder="Adicione aqui a descrição do seu evento..."></textarea>
                </div>
            </div>
            <div class="container">
            <div class="section">
                <h3>4. Data e horário</h3>
                <label for="data-inicio">Data de Início *</label>
                <input type="date" id="data-inicio" class="input-box" value="2024-09-04">

                <label for="hora-inicio">Hora de Início *</label>
                <input type="time" id="hora-inicio" class="input-box" value="19:30">

                <label for="data-termino">Data de Término *</label>
                <input type="date" id="data-termino" class="input-box" value="2024-09-06">

                <label for="hora-termino">Hora de Término *</label>
                <input type="time" id="hora-termino" class="input-box" value="19:30">
            </div>
            </div>
        </div>
        <!-- Seção 5: Ingressos -->

    </main>
        <?php 
        include_once "footer.php"; 
        ?>

</body>

</html>