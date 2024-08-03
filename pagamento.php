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
                    <input type="checkbox" id="check" />
                    <label for="check"><img src="imagens/imgPagamento/Magnetic Card.png" alt=""></label>
                    <input type="checkbox" id="check" />
                    <label for="check"><img src="imagens/imgPagamento/Pix.png" alt=""></label> 
                </div>
                <h2>Dados Do Cartão</h2>
                <input type="text" class="cadastro" placeholder="Nome do Cartão">
                <input type="text" class="cadastro" placeholder="Numenro do cartão">
                <div class="numeros">
                    <input type="text" class="confirm" placeholder="MM/YYYY">
                    <input type="text" class="confirm" placeholder="CVV">
                </div>
                <div>
                    <input type="checkbox" id="check" />
                    <label for="check"><a href="termosCondiçoes/modelo-termos-e-condicoes-para-site-ou-app.pdf" target="_blank">concordo com termos de condiçoes</a></label>
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
    </main>
</body>
</html>