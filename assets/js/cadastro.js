const container = document.querySelector('.container');
const cadastroBtn = document.querySelector('.cadastro-btn');
const loginBtn = document.querySelector('.login-btn');

cadastroBtn.addEventListener('click', () => {
  container.classList.add('active');
});

loginBtn.addEventListener('click', () => {
  container.classList.remove('active');
});

document.addEventListener("DOMContentLoaded", () => {
    const olhos = document.querySelectorAll(".usuario");

    olhos.forEach(olho => {
        olho.addEventListener("click", () => {
            let campo = document.getElementById(olho.dataset.target);

            if (campo.type === "password") {
                campo.type = "text";
                olho.src = "./assets/img/olho.png";
            } else {
                campo.type = "password";
                olho.src = "./assets/img/visivel.png";
            }
        });
    });
});


// Quando digita o CEP → ViaCEP completa o endereço
document.getElementById("cep").addEventListener("blur", function () {
    let cep = this.value.replace(/\D/g, "");

    if (cep.length !== 8) {
        alert("CEP inválido");
        return;
    }

    fetch("https://viacep.com.br/ws/" + cep + "/json/")
        .then(response => response.json())
        .then(data => {
            if (data.erro) {
                alert("CEP não encontrado!");
                return;
            }

            document.getElementById("rua").value = data.logradouro;
            document.getElementById("cidade").value = data.localidade;
            document.getElementById("estado").value = data.uf;

            // Depois que preencher o endereço → pega lat/lng
            buscarLatLng(
                data.logradouro + ", " + data.localidade + " - " + data.uf
            );
        });
});