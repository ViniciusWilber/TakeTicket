<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/324b71f187.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@300;400;700;900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/main.css">

    <script src="./js/login.js" defer></script>
    <title>login</title>
</head>

<body>
    <main>

        <div class="login-container" id="login-container">
        <a href="index.php"><button id="botao1" class="close-button">x</button></a>
            <div class="form-container">
                <form class="form form-login" method="POST" action="logar.php" class="needs-validation">

                    <h2 class="form-title">Sing-in</h2>
                    <div class="form-social">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                    <p class="form-text">ou utilize sua conta</p>
                    <section class="formulario_geral">
                            <div class="form-input-container">
                                <input type="email" name="email" id="email" class="form-input" placeholder="Email">
                                <input type="password" name="senha" id="senha" class="form-input" placeholder="Senha">
                            </div>


                                </section>
                                <button type="submit"  class="form-button">Entrar</button>
                                <a href="#" class="form-link">Esqueceu a senha?</a>
                    <p class="mobile-text">
                        Não tem conta?
                    </p>
                    <a href="#" id="open-register-mobile">Registre-se</a>

                </form>
                <form class="form form-register" method="POST" action="cadastrar_usuario.php">
                    
                    <h2 class="form-title">Criar Conta</h2>
                    <div class="form-social">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                    <p class="form-text">ou cadastre seu email</p>


                    <div class="form-input-container">
                        <input type="text" class="form-input" placeholder="Nome" name="nome" id="nome">
                        <input type="email" class="form-input" placeholder="Email" name="email" id="email">
                        <input type="password" class="form-input" placeholder="Senha" name="senha" id="senha">
                    </div>
                    <button class="form-button" type="submit">Cadastrar</button>
                    <p class="mobile-text">
                        Já tem conta?
                        <a href="#" id="open-login-mobile">Login</a>
                    </p>
                </form>

            </div>
            <div class="overlay-container">
                <div class="overlay">
                <a href="index.php"><button id="botao2" class="close-button">x</button></a>
                    <h2 class="form-title form-title-light">Já tem conta?</h2>
                    <p class="form-text">Para entrar na nossa plataforma faça login com suas informações</p>
                    <button class="form-button form-button-light" id="open-login">Entrar</button>
                </div>
                <div class="overlay">
                    <!-- <h2 class="form-title form-title-light">Bem vindo á Tacke Ticket!</h2> -->
                    <img src="imagens/imgIndex/LogoBranco.png" alt="">
                    <p class="form-text">"Bem-vindo à TakeTicket! Explore os melhores eventos de São Paulo. Se ainda não tem uma conta, cadastre-se e comece a aproveitar!</p>
                    <button class="form-button form-button-light" id="open-register">Cadastrar</button>
                </div>
            </div>
        </div>
    </main>
<script>

</script>
</body>

</html>