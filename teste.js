card.style.display = "flex";
let foto_perfil = document.getElementById("foto_perfil");
let nome_user = document.getElementById("user");
let preferencias = document.getElementById("preferencias");
let match = document.getElementById("match");
let recusar = document.getElementById("recusar");

match.addEventListener("click", () => {
    card.style.display = "none";
});

recusar.addEventListener("click", () => {
    card.style.display = "none";
});
