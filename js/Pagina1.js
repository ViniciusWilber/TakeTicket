$(document).ready(()=>{
    $('#click1').click(() =>{
        $('.cartasExposicoes').show();
        $('.cartasMuseus').hide();
        $('.cartasSociais').hide();
        $('.cartasExcursoes').hide();
        $('.cartasTrilhas').hide();
        $('.cartasViagens').hide();
        $('.cartasFerias').hide();
        $('.cartasAtracoes').hide();
    });
    $('#click2').click(() =>{
        $('.cartasExposicoes').hide();
        $('.cartasMuseus').show();
        $('.cartasSociais').hide();
        $('.cartasExcursoes').hide();
        $('.cartasTrilhas').hide();
        $('.cartasViagens').hide();
        $('.cartasFerias').hide();
        $('.cartasAtracoes').hide();
    });
    $('#click3').click(() =>{
        $('.cartasExposicoes').hide();
        $('.cartasMuseus').hide();
        $('.cartasSociais').show();
        $('.cartasExcursoes').hide();
        $('.cartasTrilhas').hide();
        $('.cartasViagens').hide();
        $('.cartasFerias').hide();
        $('.cartasAtracoes').hide();
    });
});