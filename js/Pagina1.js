$(document).ready(() => {
    const sections = ['cartas', 'cartasMuseus', 'cartasSociais', 'cartasExcursoes', 'cartasTrilhas', 'cartasViagens', 'cartasFerias', 'cartasAtracoes'];
    
    // Função para mostrar a seção correspondente
    function mostrarSeção(index) {
        sections.forEach((section, i) => {
            if (i === index) {
                $('.' + section).fadeIn('slow');
            } else {
                $('.' + section).hide();
            }
        });
    }

    // Adiciona evento de clique para cada botão
    sections.forEach((section, index) => {
        $('#click' + (index + 1)).click(() => {
            mostrarSeção(index);
        });
    });

    $('#aceitar').click(() => {
        $('#cookies-msg').slideToggle(); 
    });

    // Seleciona todos os botões
    const botoes = document.querySelectorAll('.meu-botao');

    // Adiciona um ouvinte de evento para cada botão
    botoes.forEach(botao => {
        botao.addEventListener('click', () => {
            // Remove a classe 'clicado' de todos os botões
            botoes.forEach(b => b.classList.remove('clicado'));
            // Adiciona a classe 'clicado' ao botão clicado
            botao.classList.add('clicado');
        });
    });
});
