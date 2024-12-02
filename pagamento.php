<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/224a2d2542.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/pagamento.css">
    <title>Pagamento</title>
</head>
<body>
    <main>
        <div class="esquerda">
            <form>
                <h1>Formas de Pagamento</h1>
                <div class="check">
    <input type="radio" id="cartao" name="pagamento" />
    <label for="cartao"><img src="imagens/imgPagamento/Magnetic Card.png" alt="Cartão"></label>

    <input type="radio" id="pix" name="pagamento" />
    <label for="pix"><img src="imagens/imgPagamento/Pix.png" alt="Pix"></label>
</div>

<div id="cartao-info" class="cartao-info">
                <h2>Dados Do Cartão</h2>
                <input type="text" class="cadastro" placeholder="Nome do Cartão">
                <input type="text" class="cadastro" placeholder="Numenro do cartão">
                <div class="numeros">
                    <input type="text" class="confirm" placeholder="MM/YYYY">
                    <input type="text" class="confirm" placeholder="CVV">
                </div>
                </div>
                <div id="pix-info" style="display: none;">
        <h2>Dados para Pix</h2>
        <input type="text" class="cadastro" placeholder="Chave Pix">
        <p>Escaneie o QR Code para concluir o pagamento.</p>
        <img src="imagens/imgPagamento/qrcode-pix.png" alt="QR Code Pix">
    </div>
            </form>
            <div class="pagamento">
                <a href="Evento.php"><button class="botao">Comfirmar</button></a>
                <a href="Evento.php"><button class="botao">Cancelar</button></a>
            </div>
        </div>
        <div class="direita">
            <img src="imagens/imgIndex/logo3.png" alt="">
            <p>Prezado(a) Cliente,

                Gostaríamos de expressar nossa sincera gratidão por ter escolhido nossa empresa para efetuar suas ecolhas. Valorizamos imensamente a confiança que você deposita em nós e estamos comprometidos em oferecer a melhor experiência possível.
                <br><br>
                É importante ressaltar que a segurança e a privacidade de suas informações são prioridades absolutas para nós. Nosso sistema utiliza as mais avançadas medidas de proteção para garantir que seus dados permaneçam seguros e confidenciais em todos os momentos. Você pode ter certeza de que suas informações estão em boas mãos e serão tratadas com o mais alto nível de cuidado.
                <br><br>
                Se surgir qualquer dúvida ou preocupação durante o processo de pagamento, por favor, não hesite em entrar em contato conosco. Estamos aqui para ajudar e garantir que sua experiência seja tranquila e satisfatória.
                <br><br>
                Mais uma vez, obrigado por escolher nossa empresa. Estamos ansiosos para continuar atendendo suas necessidades no futuro.
                <br><br>
                Atenciosamente, Take Ticket</p>
        </div>
    </main><script>
    // Função para alternar a exibição dos campos de pagamento
    function togglePayment(metodo) {
        const cartaoInfo = document.querySelector('h2 + input.cadastro, input.cadastro:nth-of-type(2), .numeros');
        const pixInfo = document.getElementById('pix-info');
        const cartaoinfo = document.getElementById('cartao-info');

        if (metodo === 'cartao') {
            // Exibir campos de cartão e ocultar campos de Pix
            cartaoinfo.style.display = 'block';
            pixInfo.style.display = 'none';
        } else if (metodo === 'pix') {
            // Exibir campos de Pix e ocultar campos de cartão
            cartaoinfo.style.display = 'none';
            pixInfo.style.display = 'block';
        }
    }

    // Adicionando evento aos checkboxes
    document.getElementById('cartao').addEventListener('click', () => togglePayment('cartao'));
    document.getElementById('pix').addEventListener('click', () => togglePayment('pix'));

    function toggleCheckbox(checkboxId) {
        document.getElementById('cartao').checked = checkboxId === 'cartao';
        document.getElementById('pix').checked = checkboxId === 'pix';
    }

    // Adicionar eventos aos checkboxes
    document.getElementById('cartao').addEventListener('change', () => toggleCheckbox('cartao'));
    document.getElementById('pix').addEventListener('change', () => toggleCheckbox('pix'));
</script>

</body>
</html>