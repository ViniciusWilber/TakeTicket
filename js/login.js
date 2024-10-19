'use strict'

const loginContainer = document.getElementById('login-container')

const moveOverlay = () => loginContainer.classList.toggle('move')

document.getElementById('open-register').addEventListener('click', moveOverlay)
document.getElementById('open-login').addEventListener('click', moveOverlay)

document.getElementById('open-register-mobile').addEventListener('click', moveOverlay)
document.getElementById('open-login-mobile').addEventListener('click', moveOverlay)

const form_cadastro = document.getElementById('form_cadastro');
const avisos = document.getElementById('avisos');

form_cadastro.addEventListener("submit", (e) => {
    e.preventDefault();
    let dados_form = new FormData(form_cadastro);

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
        avisos.innerHTML = mensagem;
        avisos.open = true;
        setTimeout(()=>{
            avisos.open = false
        },);
    })
})