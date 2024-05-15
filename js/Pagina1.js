$(document).ready(()=>{
    $('#click1').click(() =>{
        $('.cartas').fadeIn('slow');
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
        $('.cartasMuseus').fadeIn('slow');
        $('.cartasSociais').hide();
        $('.cartasExcursoes').hide();
        $('.cartasTrilhas').hide();
        $('.cartasViagens').hide();
        $('.cartasFerias').hide();
        $('.cartasAtracoes').hide();
    });
    $('#click3').click(() =>{
        $('.cartas').hide();
        $('.cartasMuseus').hide();
        $('.cartasSociais').fadeIn('slow');
        $('.cartasExcursoes').hide();
        $('.cartasTrilhas').hide();
        $('.cartasViagens').hide();
        $('.cartasFerias').hide();
        $('.cartasAtracoes').hide();
    });
    $('#click4').click(() =>{
        $('.cartas').hide();
        $('.cartasMuseus').hide();
        $('.cartasSociais').hide();
        $('.cartasExcursoes').fadeIn('slow');
        $('.cartasTrilhas').hide();
        $('.cartasViagens').hide();
        $('.cartasFerias').hide();
        $('.cartasAtracoes').hide();
    });
    $('#click5').click(() =>{
        $('.cartas').hide();
        $('.cartasMuseus').hide();
        $('.cartasSociais').hide();
        $('.cartasExcursoes').hide();
        $('.cartasTrilhas').fadeIn('slow');
        $('.cartasViagens').hide();
        $('.cartasFerias').hide();
        $('.cartasAtracoes').hide();
    });
    $('#click6').click(() =>{
        $('.cartas').hide();
        $('.cartasMuseus').hide();
        $('.cartasSociais').hide();
        $('.cartasExcursoes').hide();
        $('.cartasTrilhas').hide();
        $('.cartasViagens').fadeIn('slow');
        $('.cartasFerias').hide();
        $('.cartasAtracoes').hide();
    });
    $('#click7').click(() =>{
        $('.cartas').hide();
        $('.cartasMuseus').hide();
        $('.cartasSociais').hide();
        $('.cartasExcursoes').hide();
        $('.cartasTrilhas').hide();
        $('.cartasViagens').hide();
        $('.cartasFerias').fadeIn('slow');
        $('.cartasAtracoes').hide();
    });
    $('#click8').click(() =>{
        $('.cartas').hide();
        $('.cartasMuseus').hide();
        $('.cartasSociais').hide();
        $('.cartasExcursoes').hide();
        $('.cartasTrilhas').hide();
        $('.cartasViagens').hide();
        $('.cartasFerias').hide();
        $('.cartasAtracoes').fadeIn('slow');
    });
});
$('#aceitar').click(()=>{
    $('#cookies-msg').slideToggle(); 
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