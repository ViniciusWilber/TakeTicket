'use strict';

const loginContainer = document.getElementById('login-container');

const moveOverlay = () => loginContainer.classList.toggle('move');

document.getElementById('open-register').addEventListener('click', moveOverlay);
document.getElementById('open-login').addEventListener('click', moveOverlay);
document.getElementById('open-register-mobile').addEventListener('click', moveOverlay);
document.getElementById('open-login-mobile').addEventListener('click', moveOverlay);

const form_login = document.getElementById('form_login');
const mensagemEmail = document.getElementById('mensagem-email');
const mensagemSenha = document.getElementById('mensagem-senha');
const inputEmail = document.getElementById('email');
const inputSenha = document.getElementById('senha');

// Função para limpar mensagens e estilos
const limparMensagensEEstilos = () => {
    mensagemEmail.innerHTML = '';
    mensagemSenha.innerHTML = '';
    inputEmail.classList.remove('erro');
    inputSenha.classList.remove('erro');
    inputEmail.style.border = ''; // Limpa a borda para o estado padrão
    inputSenha.style.border = ''; // Limpa a borda para o estado padrão
};

form_login.addEventListener("submit", (e) => {
    e.preventDefault();
    let dados_form = new FormData(form_login);
    
    limparMensagensEEstilos(); // Limpa antes de enviar

    fetch("logar.php", {
        body: dados_form,
        method: 'POST'
    })
    .then((resposta) => {
        if (resposta.ok) {
            return resposta.text();
        }
    })
    .then((mensagem) => {
        limparMensagensEEstilos(); // Limpa novamente após a resposta

        if (mensagem.includes('Digite um email')) {
            mensagemEmail.innerHTML = 'Digite um email';
            inputEmail.classList.add('erro');
            inputEmail.style.border = '2px solid red';
        } else if (mensagem.includes('Email não encontrado')) {
            mensagemEmail.innerHTML = 'Email não encontrado';
            inputEmail.classList.add('erro');
            inputEmail.style.border = '2px solid red';
        } else if (mensagem.includes('Digite uma senha')) {
            mensagemSenha.innerHTML = 'Digite uma senha';
            inputSenha.classList.add('erro');
            inputSenha.style.border = '2px solid red';
        } else if (mensagem.includes('Login incorreto')) {
            mensagemSenha.innerHTML = 'Senha incorreta';
            inputSenha.classList.add('erro');
            inputSenha.style.border = '2px solid red';
        }
    })
    .catch((erro) => {
        console.error('Erro ao realizar login:', erro);
    });
});

// Código de cadastro (similar ao de login)
const form_cadastro = document.getElementById('form_cadastro');
const mensagem_nome = document.getElementById('mensagem_nome');
const mensagem_senha_cadastro = document.getElementById('mensagem_senha_cadastro');
const cadastro_nome = document.getElementById('cadastro_nome');
const cadastro_email = document.getElementById('mensagem_email_cadastro');
const cadastro_senha = document.getElementById('cadastro_senha');

form_cadastro.addEventListener("submit", (e) => {
    e.preventDefault();
    let dados_form = new FormData(form_cadastro);

    limparMensagensEEstilos(); // Limpa antes de enviar

    fetch("cadastrar_usuario.php", {
        body: dados_form,
        method: 'POST'
    })
    .then((resposta) => {
        if (resposta.ok) {
            return resposta.text();
        }
    })
    .then((mensagem) => {
        limparMensagensEEstilos(); // Limpa novamente após a resposta

        if (mensagem.includes('digite um nome <br>')) {
            mensagem_nome.innerHTML = 'digite um nome <br>';
            mensagem_nome.classList.add('erro');
            cadastro_nome.style.border = '2px solid red';

        } else if (mensagem.includes('digite um email <br>')) {
            mensagem_email_cadastro.innerHTML = 'digite um email <br>';
            mensagem_email_cadastro.classList.add('erro');
            cadastro_email.style.border = '2px solid red';

        } else if (mensagem.includes('Digite no minimo 8 caracteres <br>Com pelo menos uma letra maiuscula <br>Um caracter especial <br> E pelo menos um número')) {
            mensagemSenha.innerHTML = 'Digite no minimo 8 caracteres <br>Com pelo menos uma letra maiuscula <br>Um caracter especial <br> E pelo menos um número';
            senha_cadastro.classList.add('erro');
            mensagem_senha_cadastro.style.border = '2px solid red';

        } 
    })
    .catch((erro) => {
        console.error('Erro ao realizar cadastro:', erro);
    });
});
