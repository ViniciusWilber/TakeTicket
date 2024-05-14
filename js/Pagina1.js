$(document).ready(()=>{
    $('#click1').click(() =>{
        $('.cartas').hide();
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
        $('.cartas').hide();
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
        $('.cartas').hide();
        $('.cartasExposicoes').hide();
        $('.cartasMuseus').hide();
        $('.cartasSociais').show();
        $('.cartasExcursoes').hide();
        $('.cartasTrilhas').hide();
        $('.cartasViagens').hide();
        $('.cartasFerias').hide();
        $('.cartasAtracoes').hide();
    });
    $('#click4').click(() =>{
        $('.cartas').hide();
        $('.cartasExposicoes').hide();
        $('.cartasMuseus').hide();
        $('.cartasSociais').hide();
        $('.cartasExcursoes').show();
        $('.cartasTrilhas').hide();
        $('.cartasViagens').hide();
        $('.cartasFerias').hide();
        $('.cartasAtracoes').hide();
    });
    $('#click5').click(() =>{
        $('.cartas').hide();
        $('.cartasExposicoes').hide();
        $('.cartasMuseus').hide();
        $('.cartasSociais').hide();
        $('.cartasExcursoes').hide();
        $('.cartasTrilhas').show();
        $('.cartasViagens').hide();
        $('.cartasFerias').hide();
        $('.cartasAtracoes').hide();
    });
    $('#click6').click(() =>{
        $('.cartas').hide();
        $('.cartasExposicoes').hide();
        $('.cartasMuseus').hide();
        $('.cartasSociais').hide();
        $('.cartasExcursoes').hide();
        $('.cartasTrilhas').hide();
        $('.cartasViagens').show();
        $('.cartasFerias').hide();
        $('.cartasAtracoes').hide();
    });
    $('#click7').click(() =>{
        $('.cartas').hide();
        $('.cartasExposicoes').hide();
        $('.cartasMuseus').hide();
        $('.cartasSociais').hide();
        $('.cartasExcursoes').hide();
        $('.cartasTrilhas').hide();
        $('.cartasViagens').hide();
        $('.cartasFerias').show();
        $('.cartasAtracoes').hide();
    });
    $('#click8').click(() =>{
        $('.cartas').hide();
        $('.cartasExposicoes').hide();
        $('.cartasMuseus').hide();
        $('.cartasSociais').hide();
        $('.cartasExcursoes').hide();
        $('.cartasTrilhas').hide();
        $('.cartasViagens').hide();
        $('.cartasFerias').hide();
        $('.cartasAtracoes').show();
    });
});
$('#aceitar').click(()=>{
    $('#cookies-msg').hide(); 
});






// if(!localStorage.cokkies){
//     document.querySelector('#cookies-msg').classList.remove('hide');
// }
// const aceitarCookies = () =>{
//     document.querySelector('#cookies-msg').classList.add('hide');
//     localStorage.setItem("cookies", "accept")
// };

// const aceitar = document.querySelector("#aceitar");

// aceitar.addEventListener('click' , aceitarCookies);