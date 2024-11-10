const openModalBtn = document.getElementById('openModalBtn');
const closeModalBtn = document.getElementById('closeModalBtn');
const modal = document.getElementById('myModal');
const modalData = document.getElementById('modalData');

openModalBtn.addEventListener('click', () => {
    fetch('login.php')
        .then(response => response.text())
        .then(data => {
            modalData.innerHTML = data;
            modal.style.display = 'flex';
        })
        .catch(error => console.error('Erro ao carregar conteúdo:', error));
});

// Fechar a modal
closeModalBtn.addEventListener('click', () => {
    modal.style.display = 'none';
});

// Fechar a modal ao clicar fora dela
window.addEventListener('click', (event) => {
    if (event.target === modal) {
        modal.style.display = 'none';
    }
});