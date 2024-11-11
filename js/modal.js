// Referências dos elementos
const openModalBtn = document.getElementById('openModalBtn');
const closeModalBtn = document.getElementById('closeModalBtn');
const myModal = document.getElementById('myModal');
const modalContent = document.getElementById('modalContent');

// Função para abrir o modal
openModalBtn?.addEventListener('click', async () => {
    try {
        const response = await fetch('./login.php'); // Verifique o caminho do arquivo
        if (!response.ok) throw new Error('Erro ao carregar o arquivo.');
        
        const content = await response.text();
        modalContent.innerHTML = content;
        myModal.showModal();
        document.body.classList.add('no-scroll'); // Desabilita a rolagem da página
    } catch (error) {
        console.error(error);
        modalContent.innerHTML = 'Erro ao carregar conteúdo.';
    }
});

// Fechar o modal
closeModalBtn?.addEventListener('click', () => {
    myModal.close();
    document.body.classList.remove('no-scroll'); // Habilita a rolagem novamente
});
