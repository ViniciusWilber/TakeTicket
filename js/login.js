'use strict';

const loginContainer = document.getElementById('login-container');

const moveOverlay = () => loginContainer.classList.toggle('move');

document.getElementById('open-register').addEventListener('click', moveOverlay);
document.getElementById('open-login').addEventListener('click', moveOverlay);
document.getElementById('open-register-mobile').addEventListener('click', moveOverlay);
document.getElementById('open-login-mobile').addEventListener('click', moveOverlay);


'use strict';

const form_cadastro = document.getElementById('form_cadastro');

const avisos_cadastro = document.getElementById('avisos_cadastro');
const cadastro_nome = document.getElementById('cadastro_nome');


const mensagem_email_cadastro = document.getElementById('mensagem_email_cadastro');
const cadastro_email = document.getElementById('cadastro_email');

const mensagem_senha_cadastro = document.getElementById('mensagem_senha_cadastro');
const cadastro_senha = document.getElementById('cadastro_senha');

form_cadastro.addEventListener("submit", (e) => {
    e.preventDefault(); // Evita que o formulário seja enviado de maneira tradicional
    let dados_form = new FormData(form_cadastro);

    fetch("cadastrar_usuario.php", {
        body: dados_form,
        method: 'POST'
    })
    .then((resposta) => {
        if (resposta.ok) {
            return resposta.text();
        } else {
            console.log("Erro na resposta do servidor:", resposta.status);
            throw new Error('Erro na resposta do servidor');
        }
    })
    .then((mensagem) => {
        console.log("Mensagem recebida do servidor:", mensagem);

        // Verifica se o nome está faltando
        if (mensagem.includes('digite um nome')) {
            avisos_cadastro.innerHTML = 'Digite um nome';
            avisos_cadastro.style.display = 'block'; // Exibe o aviso
            cadastro_nome.style.border = "2px solid red";

            setTimeout(() => {
                avisos_cadastro.style.display = 'none'; // Oculta o aviso após 3 segundos
                cadastro_nome.style.border = ""; // Remove a borda vermelha
            }, 3000);
        }

        // Verifica se o email está faltando
        if (mensagem.includes('digite um email <br>')) {
            mensagem_email_cadastro.innerHTML = 'Digite um email <br>';
            mensagem_email_cadastro.style.display = 'block'; // Exibe o aviso
            cadastro_email.style.border = "2px solid red";

            setTimeout(() => {
                mensagem_email_cadastro.style.display = 'none'; // Oculta o aviso após 3 segundos
                cadastro_email.style.border = "";
            }, 3000);
        }

        if (mensagem.includes('Email já cadastrado!<br>')) {
            mensagem_email_cadastro.innerHTML = 'Email já cadastrado!<br>';
            mensagem_email_cadastro.style.display = 'block'; // Exibe o aviso
            cadastro_email.style.border = "2px solid red";

            setTimeout(() => {
                mensagem_email_cadastro.style.display = 'none'; // Oculta o aviso após 3 segundos
                cadastro_email.style.border = "";
            }, 3000);
        }

        if (mensagem.includes('Digite no minimo 8 caracteres <br>Com pelo menos uma letra maiuscula <br>Um caracter especial <br> E pelo menos um número')) {
            mensagem_senha_cadastro.innerHTML = 'Digite no minimo 8 caracteres <br>Com pelo menos uma letra maiuscula <br>Um caracter especial <br> E pelo menos um número';
            mensagem_senha_cadastro.style.display = 'block'; // Exibe o aviso
            cadastro_senha.style.border = "2px solid red";

            setTimeout(() => {
                mensagem_senha_cadastro.style.display = 'none'; // Oculta o aviso após 3 segundos
                cadastro_senha.style.border = "";
            }, 3000);
        }

        if (mensagem.includes('cadastrado com sucesso')) {
           location.href = 'index.php';
        }
        

    })
    .catch((erro) => {
        console.error("Erro ao processar a requisição:", erro);
    });
});


const form_login = document.getElementById('form_login');

const email_login = document.getElementById('email_login');
const aviso_email = document.getElementById('aviso_email');

const senha_login = document.getElementById('senha_login');
const aviso_senha = document.getElementById('aviso_senha');

form_login.addEventListener("submit", (e) => {
    e.preventDefault(); // Evita que o formulário seja enviado de maneira tradicional
    let dados_form = new FormData(form_login);

    fetch("logar.php", {
        body: dados_form,
        method: 'POST'
    })
    .then((resposta) => {
        if (resposta.ok) {
            return resposta.text();
        } else {
            console.log("Erro na resposta do servidor:", resposta.status);
            throw new Error('Erro na resposta do servidor');
        }
    })
    .then((mensagem) => {
        console.log("Mensagem recebida do servidor:", mensagem);

        if (mensagem.includes('Digite um email <br>')) {
            aviso_email.innerHTML = 'Digite um email <br>';
            aviso_email.style.display = 'block'; // Exibe o aviso
            email_login.style.border = "2px solid red";

            setTimeout(() => {
                aviso_email.style.display = 'none'; // Oculta o aviso após 3 segundos
                email_login.style.border = "";
            }, 3000);
        }

        if (mensagem.includes('Email não encontrado <br>')) {
            aviso_email.innerHTML = 'Email não encontrado <br>';
            aviso_email.style.display = 'block'; // Exibe o aviso
            email_login.style.border = "2px solid red";

            setTimeout(() => {
                aviso_email.style.display = 'none'; // Oculta o aviso após 3 segundos
                email_login.style.border = "";
            }, 3000);
        }
        
        if (mensagem.includes('Digite uma senha <br>')) {
            aviso_senha.innerHTML = 'Digite um email <br>';
            aviso_senha.style.display = 'block'; // Exibe o aviso
            senha_login.style.border = "2px solid red";

            setTimeout(() => {
                aviso_senha.style.display = 'none'; // Oculta o aviso após 3 segundos
                senha_login.style.border = "";
            }, 3000);
        }

        if (mensagem.includes('Login correto.')) {
            location.href = 'index.php';
        }

        if (mensagem.includes('Login incorreto.')) {
            aviso_senha.innerHTML = 'Login incorreto.';
            aviso_senha.style.display = 'block'; // Exibe o aviso
            senha_login.style.border = "2px solid red";
            aviso_email.innerHTML = 'Login incorreto.';
            aviso_email.style.display = 'block'; // Exibe o aviso
            email_login.style.border = "2px solid red";

            setTimeout(() => {
                aviso_senha.style.display = 'none'; // Oculta o aviso após 3 segundos
                senha_login.style.border = "";
                aviso_email.style.display = 'none'; // Oculta o aviso após 3 segundos
                email_login.style.border = "";
            }, 3000);
        }

    })
    .catch((erro) => {
        console.error("Erro ao processar a requisição:", erro);
    });
});