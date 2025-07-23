import { exibirMenssagem } from "./alerta.js";
const botaoDeletar = document.querySelectorAll(".deletar");
const token = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");
botaoDeletar.forEach((btn) => {
    btn.addEventListener("click", async () => {
        if (!confirm("Deseja realmente deletar este livro?")) return;
        const livroId = btn.dataset.id;
        try {
            const response = await fetch(`/livros/delete/${livroId}`, {
                method: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": token,
                },
            });
            const data = await response.json();

            if (data.success) {
                exibirMenssagem(data.message);
                const livroItem = document.querySelector(`#livro-${livroId}`);
                if (livroItem) livroItem.remove();
            } else {
                exibirMenssagem(data.message);
            }
        } catch (error) {
            console.log(error);
        }
    });
});
