'use strict';

const loginContainer = document.getElementById('login-container');

const moveOverlay = () => loginContainer.classList.toggle('move');

document.getElementById('open-register').addEventListener('click', moveOverlay);
document.getElementById('open-login').addEventListener('click', moveOverlay);
document.getElementById('open-register-mobile').addEventListener('click', moveOverlay);
document.getElementById('open-login-mobile').addEventListener('click', moveOverlay);


const form_cadastro = document.getElementById('form_cadastro');
const avisos_cadastro = document.getElementById('avisos_cadastro');

form_cadastro.addEventListener("submit", (e) => {
    e.preventDefault();
    let dados_form = new FormData(form_cadastro);

    fetch("cadastrar_usuario.php", {
        body: dados_form,
        method: 'POST'
    })
    .then((resposta) => {
    if (resposta.ok) {
        return resposta.text();
    }else(3000
    )
    })
    .then((mensagem) => {
        avisos_cadastro.innerHTML = mensagem;
        avisos_cadastro.open = true;
        setTimeout(()=>{
            avisos_cadastro.open = false
        }, 3000);
    })
})





const form_login = document.getElementById('form_login');
const avisos_login = document.getElementById('avisos_login');

form_login.addEventListener("submit", (e) => {
    e.preventDefault();
    let dados_form = new FormData(form_login);

    fetch("logar.php", {
        body: dados_form,
        method: 'POST'
    })
    .then((resposta) => {
    if (resposta.ok) {
        return resposta.text();
    }else(3000
    )
    })
    .then((mensagem) => {
        avisos_login.innerHTML = mensagem;
        avisos_login.open = true;
        setTimeout(()=>{
            avisos_login.open = false
        }, 3000);
    })
})