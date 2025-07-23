const botaoOk = document.querySelector("#botaoOk");
const campoAlerta = document.querySelector(".campo-alerta");
botaoOk.addEventListener("click", () => {
    campoAlerta.classList.add("hidden");
});

document.addEventListener('keydown', (e) => {
    if(e.key === 'Enter'){
        campoAlerta.classList.add("hidden");
    }
});

export function exibirMenssagem(mensagem) {
    campoAlerta.querySelector("p").textContent = mensagem;
    campoAlerta.classList.remove("hidden");
}