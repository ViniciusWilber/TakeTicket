<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/324b71f187.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@300;400;700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/main.css">

    <script src="./js/login.js" defer></script>
    <title>Login - Leonid</title>
</head>
<body>
    <main>
        <div class="login-container" id="login-container">
            <div class="form-container">
                <form class="form form-login">
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
                    <div class="form__group2">
                        <input type="text" class="form__field" id="input1" placeholder=" ">
                        <label for="input1" class="form__label">Label</label>
                      </div>
                      
                    <div class="form__group2 field">

                        <label for="name" class="form__label">senha</label>
                        <input type="input" class="form__field" placeholder="senha" required="">
                    </div>
                    <a href="#" class="form-link">Esqueceu a senha?</a>
                    <button type="button" class="form-button">Logar</button>
                    <p class="mobile-text">
                        Não tem conta?
                        <a href="#" id="open-register-mobile">Registre-se</a>
                    </p>
                </form>
                <form class="form form-register">
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

                    <form method="post "action="processo.php">
                    <div class="form-input-container">
                        <input type="text" class="form-input" placeholder="Nome" name="nome" id="nome">
                        <input type="email" class="form-input" placeholder="Email" name="email" id="email">
                        <input type="password" class="form-input" placeholder="Senha" name="senha" id="senha">
                    </div>
                    <button class="form-button" type="submit">Cadastrar</button>
                    </form>
                    <p class="mobile-text">
                        Já tem conta?
                        <a href="#" id="open-login-mobile">Login</a>
                    </p>
                </form>

            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <h2 class="form-title form-title-light">Já tem conta?</h2>
                    <p class="form-text">Para entrar na nossa plataforma faça login com suas informações</p>
                    <button class="form-button form-button-light" id="open-login">Entrar</button>
                </div>
                <div class="overlay">
                    <!-- <h2 class="form-title form-title-light">Bem vindo á Tacke Ticket!</h2> -->
                     <img src="imagens/imgIndex/LogoBranco.png" alt="">
                    <p class="form-text">Cadastre-se e comece a usar a nossa plataforma on-line</p>
                    <button class="form-button form-button-light" id="open-register">Cadastrar</button>
                </div>
            </div>
        </div>
    </main>
</body>
</html>