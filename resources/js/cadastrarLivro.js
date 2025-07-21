const closeForm = document.querySelector('#closeForm');
const formLivro = document.querySelector('#campoForm');
const addLivro = document.querySelector('#addLivro');
const nomeArquivo = document.querySelector('#nomeArquivo');
const arquivo = document.querySelector('#arquivo');
const removerArquivo = document.querySelector('#removerArquivo');
addLivro.addEventListener('click', () => {
    formLivro.classList.remove('hidden');
    nomeArquivo.classList.remove('hidden');
})
closeForm.addEventListener('click', () => {
    formLivro.classList.add('hidden');
});
arquivo.addEventListener('change', () => {
    nomeArquivo.textContent = arquivo.value;
    removerArquivo.classList.remove('hidden');
});
removerArquivo.addEventListener('click', () => {
    nomeArquivo.textContent = 'Selecione um arquivo';
    arquivo.value = '';
    removerArquivo.classList.add('hidden');
});
