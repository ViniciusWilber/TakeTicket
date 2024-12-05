<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
    <style>
        /* Estilo geral para o footer */
footer {
    background: linear-gradient(-105deg, #3e94b1, #3d767c);
    color: #fff;
    font-family: Arial, sans-serif;
    padding: 30px 10%;
}

.footer-secoes {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
}

.secao {
    flex: 1;
    min-width: 200px;
}

.secao h3 {
    font-size: 18px;
    margin-bottom: 15px;
    color: #fff;
}

.secao a {
    display: block;
    font-size: 14px;
    color: #dce9e9;
    text-decoration: none;
    margin-bottom: 10px;
    transition: color 0.3s ease;
}

.secao a:hover {
    color: #fff;
}

.secao p {
    font-size: 14px;
    margin: 10px 0;
    color: #dce9e9;
}

.footer-base {
    margin-top: 20px;
    text-align: center;
    border-top: 1px solid #5e9898;
    padding-top: 15px;
}

.footer-base p {
    font-size: 14px;
    color: #dce9e9;
}

.footer-base a {
    color: #dce9e9;
    text-decoration: none;
    margin: 0 5px;
    transition: color 0.3s ease;
}

.footer-base a:hover {
    color: #fff;
}

    </style>
    <main>
        <!-- Conteúdo principal da página -->
    </main>

    <footer>
        <div class="footer-secoes">
            <div class="secao">
                <h3>Ajuda</h3>
                <a href="#"><i class=""></i>Central de ajuda</a>
                <a href="#"><i class=""></i>Opções de cancelamento</a>
                <a href="#"><i class=""></i>Dúvidas frequentes</a>
                <a href="#"><i class=""></i>Apoio a pessoas com deficiência</a>
            </div>
            <div class="secao">
                <h3>Empresa</h3>
                <a href="#"><i class=""></i>Carreiras</a>
                <a href="#"><i class=""></i>Investidores</a>
                <a href="#"><i class=""></i>Anuncie seu evento na TakeTicket</a>
            </div>
            <div class="secao">
                <h3>Contato</h3>
                <p><i class=""></i>Seg. à Sex.: 09:00 às 17:00</p>
                <a href="mailto:TakeTicket@gmail.com"><i class=""></i>TakeTicket@gmail.com</a>
            </div>
        </div>
        <div class="footer-base">
            <p>&copy; 2024 TakeTicket, Inc. 
                <a href="#">Privacidade</a> |
                <a href="#">Termos</a> |
                <a href="#">Informações da empresa</a>
            </p>
        </div>
    </footer>
</body>
</html>
