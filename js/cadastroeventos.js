const input_cep = document.getElementById('cep');
const input_bairro = document.getElementById('bairro');
const input_rua = document.getElementById('rua');
const input_cidade = document.getElementById('cidade');

input_cep.addEventListener('blur', () => {
    let cep = input_cep.value;

    if (cep.length !==8) {
        return;
    }
    fetch(`https://viacep.com.br/ws/${cep}/json/`)
    .then(resposta => resposta.json())
    .then(json =>{
        input_bairro.value = json.bairro;
        input_cidade.value = json.localidade;
        input_rua.value = json.logradouro;
    });
})