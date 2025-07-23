import { exibirMenssagem } from "./alerta.js";

const closeForm = document.querySelector("#closeForm");
const campoForm = document.querySelector("#campoForm");
const formLivro = document.querySelector("#formLivro");
const addLivro = document.querySelector("#addLivro");

const nomeArquivos = document.querySelectorAll(".nomeArquivo");
const arquivos = document.querySelectorAll(".arquivo");
const removerArquivos = document.querySelectorAll(".removerArquivo");

const botaoSalvar = document.querySelector("#salvarLivro");

const editarLivro = document.querySelectorAll(".editar");
const inputTitulo = campoForm.querySelector("#inputTitulo");
let livroIdAtual = null;

const token = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");

addLivro.addEventListener("click", () => {
    livroIdAtual = null;
    botaoSalvar.dataset.modo = "cadastrar";
    campoForm.classList.remove("hidden");
    nomeArquivos.forEach((el) => el.classList.remove("hidden"));
});

closeForm.addEventListener("click", () => {
    campoForm.classList.add("hidden");
});

removerArquivos.forEach((btn, index) => {
    const nomePadrao = nomeArquivos[index].textContent;
    btn.addEventListener("click", () => {
        nomeArquivos[index].textContent = nomePadrao;
        arquivos[index].value = "";
        btn.classList.add("hidden");
    });
});

arquivos.forEach((input, index) => {
    input.addEventListener("change", () => {
        const nome =
            input.files.length > 0
                ? input.files[0].name
                : "Selecione um arquivo";
        nomeArquivos[index].textContent = nome;
        removerArquivos[index].classList.remove("hidden");
    });
});

editarLivro.forEach((btn) => {
    btn.addEventListener("click", () => {
        livroIdAtual = btn.dataset.id;
        botaoSalvar.dataset.modo = "editar";
        const card = btn.closest(".card-livro");
        const titulo = card.querySelector(".titulo p").textContent;

        campoForm.classList.remove("hidden");
        inputTitulo.value = titulo;
    });
});

formLivro.addEventListener("submit", async (e) => {
    e.preventDefault();

    const modo = botaoSalvar.dataset.modo;

    const formData = new FormData(formLivro);

    try {
        let response;
        if (modo === "cadastrar") {
            response = await fetch("/livros/store", {
                method: "POST",
                body: formData,
            });
        } else if (modo === "editar" && livroIdAtual) {
            formData.append("_method", "PUT"); 
            response = await fetch(`/livros/update/${livroIdAtual}`, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": token,
                },
                body: formData,
            });
        } 
        const data = await response.json();

        if (data.error) {
            exibirMenssagem(data.message);
        } else {
            campoForm.classList.add("hidden");
            if(modo == 'cadastrar'){
                window.location.reload();
            }else{
                const novoTitulo = inputTitulo.value;
                document.querySelector(`#livro-titulo-${livroIdAtual}`).textContent = novoTitulo;
            }
                exibirMenssagem(data.message);
        }
    } catch (err) {
        console.error("Erro ao enviar:", err);
        exibirMenssagem("Erro ao enviar o formulalertário.");
    }
});
