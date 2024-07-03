
const carta1 = document.querySelector('.carta1');
const carta2 = document.querySelector('.carta2');
const img = document.querySelector('.img');

carta2.style.display = 'none';

document.getElementById('but3').addEventListener('click', function() {
    carta2.style.display = 'none'; 
    carta1.style.display = 'flex'; 
    img.style.display = 'flex';
});

document.getElementById('but1').addEventListener('click', function() {
    carta1.style.display = 'none'; 
    carta2.style.display = 'flex';
    img.style.display = 'none';
});