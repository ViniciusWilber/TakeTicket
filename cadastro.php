<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro.css">
    <title>Cadastro</title>
</head>
<body>
    <main>
        <form action="#" class="form">
            <h1>Cadastro</h1>
            <section>
                <div class="campo">
                    <input type="email" class="cadastro" placeholder="Email">
                    <input type="email" class="cadastro" placeholder="Repetir email">
                </div>
                <div class="campo">
                    <input type="password" class="cadastro" placeholder="Senha">
                    <input type="password" class="cadastro" placeholder="Repetir senha">
                </div>
            </section>
            <section>
                <div class="check">
                    <input type="radio" id="check" name="gender"/>
                    <label for="check">pessoa fisica</label>
                    <input type="radio" id="checki" name="gender"/>
                    <label for="check">pessoa juridica</label>
                </div>
            </section>
            <section>
                <div class="campo">
                    <input type="text" class="cadastro" placeholder="Nome/Sobrenome">
                    <input type="text" class="numero" placeholder="CPF/CNPJ">
                    <input type="date" class="numero" placeholder="data de nacimento">
                </div>
                <div class="campo">
                    <input type="text" id="cep" class="numero" placeholder="CEP">
                    <input type="text" class="numero" placeholder="Numero">
                    <input type="text" class="numero" placeholder="complemento">

                </div>
            </section>
            <section>
                <div class="campo">
                    <input type="text" id="rua" class="cadastro" placeholder="Rua">
                    <input type="text" id="bairro" class="cadastro" placeholder="Bairro">
                    <input type="text" id="cidade" class="numero" placeholder="Cidade">

                </div>
            </section>
            <section>
                <div class="campo">
                    <input type="text" class="numero" placeholder="Telefone/Celular">
                </div>
                <div class="check">
                    <input type="radio" id="checke"  />
                    <label for="check"><a href="termosCondiçoes/modelo-termos-e-condicoes-para-site-ou-app.pdf" target="_blank">Eu li e concordo com os termos e condiçoes</a></label>
                </div>
            </section>
        </form>
        <section>
            <div class="botoes">
                <a href="index.php"><button class="confirmar" id="confirmar">Confirmar</button></a>
                <a href="login.php"><button class="cancelar"  id="cancelar">Cancelar</button></a>
            </div>
        </section>
    </main>
    <script src="js/cadastro.js"></script><div></div>
</body>
</html>