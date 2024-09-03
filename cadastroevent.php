<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface Simples</title>
    <link rel="stylesheet" href="css/cadastroevent.css">
</head>

<body>
    <head>
            <?php
        include_once "header.php"
      ?>
    </head>

  <main>
    <div class="geral">
        <div class="container">
            <div class="section1">
                <h3>1. Endereço da página</h3>
                <input type="text" class="input-box" placeholder="www.exemplo.com.br">
            </div>
        </div>
        <div class="container">
            <div class="section">
                <h3>2. Nome e imagem</h3>
                <input type="text" class="input-box" placeholder="Nome do organizador">
                    <label for="upload-foto">foto de perfil</label>
                    <input type="file" id="upload-foto" class="input-upload-foto" accept="image/*">

            </div>
        </div>
        <div class="container">
            <div class="section">
                <h3>3. Descrição</h3>
                <textarea class="input-box" rows="5" placeholder="Escreva a descrição do evento..."></textarea>
                <label for="upload-foto">fotos do evento</label>
                <input type="file" id="upload-foto" class="input-upload-foto" accept="image/*">
            </div>
        </div>
        <button class="botao-cadastrar">Cadastrar</button>
    </div>
</main>
</body>

</html>