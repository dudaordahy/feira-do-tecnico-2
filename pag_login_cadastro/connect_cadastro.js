// BOTÕES DE TROCA ENTRE LOGIN E CADASTRO
const container = document.querySelector(".container");
document.querySelector(".cadastro-btn").onclick = () => container.classList.add("active");
document.querySelector(".login-btn").onclick = () => container.classList.remove("active");

// ----------------------------
// OLHINHO — MOSTRAR / ESCONDER SENHA
// ----------------------------
const olhos = document.querySelectorAll(".usuario");

olhos.forEach(olho => {
    olho.addEventListener("click", () => {
        let inputId = olho.getAttribute("data-target");
        let campo = document.getElementById(inputId);

        if (campo.type === "password") {
            campo.type = "text";
            olho.src = "olho.png";
        } else {
            campo.type = "password";
            olho.src = "visivel.png";
        }
    });
});

const popupSenha = document.getElementById("popupSenha");
const fecharPopupSenha = document.getElementById("fecharPopupSenha");

function abrirPopupSenha() {
    popupSenha.style.display = "flex";
}

fecharPopupSenha.addEventListener("click", () => {
    popupSenha.style.display = "none";
});

const form = document.getElementById("formCadastro");
const senha = document.getElementById("senha");
const erroSenha = document.getElementById("erroSenha");

form.addEventListener("submit", function (e) {
    e.preventDefault();

    if (senha.value.length < 6 || senha.value.length > 10) {
        erroSenha.style.display = "block";
        erroSenha.textContent = "A senha deve ter entre 6 e 10 caracteres.";
        return;
    }

    erroSenha.style.display = "none";
    alert("Cadastro realizado com sucesso!");
});
