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
        }
    });

// url que pega as preferencias do banco e tem json 
const url = './actions/preferencia-lista.php'; 
// 
fetch(url)
    .then(response => response.json()) 
    .then(data => {
        // dados do json esta em data
        // cria a lista pai
        const listaPai = document.querySelector("#listaPreferencias");
        // passa por todos os elementos
        data.forEach(element => {
            // cria o novo elemento
            const novoItem = document.createElement('li');
            // adiciona o conteudo
            novoItem.innerHTML = '<input type="checkbox" value="'+element.PreferenciaID+'" name="preferencia[]" id="preferencia">'+element.Nome;
            // adiciona ao novo elemento
            listaPai.appendChild(novoItem);
        });
    })
    .catch(error => {
        // json em caso de erro
        console.error('Error fetching or parsing JSON:', error);
});