let input = document.getElementById("fileInput");
let preview = document.getElementById("preview");

input.addEventListener("change", function() {
    let file = this.files[0];
    if (file) {
        let reader = new FileReader();
        reader.onload = function(e) {
            preview.innerHTML = "<img src='" + e.target.result + "'>";
        }
        reader.readAsDataURL(file);
        uploadFiles();
    }
});

function uploadFiles() {
  // URL do arquivo PHP que vai receber a foto
  const url = 'actions/foto-salva.php';

  // Obtém o formulário que contém o input de arquivo
  const form = document.getElementById("form_foto");

  // Cria um FormData para enviar arquivos + campos
  const formData = new FormData(form);

  // Envia usando fetch
  fetch(url, {
    method: 'POST',
    body: formData
  });
}

let proximo = document.getElementById("proximo");
let form_foto = document.getElementById("form_foto");
let container = document.getElementById("container");


proximo.addEventListener("click", function(){
    form_foto.remove();

    const form_pref = document.createElement("form");
    form_pref.action = "actions/pref-salva.php";
    form_pref.method = "POST";
    container.appendChild(form_pref)

    const txt_pref = document.createElement("h1");
    txt_pref.innerHTML = "Escolha suas preferências";
    form_pref.appendChild(txt_pref);

    const ul_pref = document.createElement("ul");
    ul_pref.id = "listaPreferencias";
    form_pref.appendChild(ul_pref);

    // URL que retorna as preferências em JSON
    const url = './actions/preferencia-lista.php';

    // Requisição para buscar as preferências no banco
    fetch(url)
        .then(response => response.json())  // Converte o retorno para JSON
        .then(data => {

            // Seleciona o <ul> criado acima
            const listaPai = document.querySelector("#listaPreferencias");

            // Percorre cada preferência retornada do servidor
            data.forEach(element => {

                // Cria uma <li> para cada preferência
                const novoItem = document.createElement('li');

                // Adiciona checkbox + texto dentro da <li>
                novoItem.innerHTML = `
                    <label>
                        <input type="checkbox" value="${element.PreferenciaID}" name="preferencia[]">
                        ${element.Nome}
                    </label>
                `;

                // Adiciona a <li> pronta dentro da <ul>
                listaPai.appendChild(novoItem);
            });
        })

        // Caso algo dê errado ao buscar o JSON
        .catch(error => {
            console.error('Error fetching or parsing JSON:', error);
        });

    const btn_proximo = document.createElement("button");
    btn_proximo.id = "proximo";
    btn_proximo.type = "submit";
    form_pref.appendChild(btn_proximo);

    const img_proximo = document.createElement("img");
    img_proximo.src = "assets/img/proximo.png";
    btn_proximo.appendChild(img_proximo);

});
