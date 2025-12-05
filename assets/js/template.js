fetch('./actions/pegarLatLong.php')
    .then(response => response.json())
    .then(data => {
        var latitude = parseFloat(data.latitude);
        var longitude = parseFloat(data.longitude);

        window.map = L.map('map').setView([latitude, longitude], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 20
        }).addTo(map);

        var iconeAzul = L.icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-blue.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
            iconSize: [25, 40],
            iconAnchor: [12, 40],
            popupAnchor: [1, -35],
            shadowSize: [40, 40]
        });

        L.marker([latitude, longitude], { icon: iconeAzul }).addTo(map)
        .bindPopup('Local personalizado!');
});

let input = document.getElementById("fileInput");
let preview = document.getElementById("preview");
let container = document.getElementById("container");

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

let circle = null;
let img_pefil = document.getElementById("img_perfil");
let card = document.getElementById("card");
let fomr1 = document.getElementById("form1");
let form2 = document.getElementById("form2");
let form3 = document.getElementById("form3");


fetch('./actions/pegarFoto.php')
.then(response => response.json())
.then(data => {
    img_perfil.src = './contents/perfil/' + data.foto_perfil;
    iconDefault.src = './contents/perfil/' + data.foto_perfil;
    carregarFoto();
    container.style.display ='none';
})

function carregarFoto(){
    img_pefil.style.width = "40px";
    img_pefil.style.height = "40px";
    img_pefil.style.objectFit = 'cover';
}

document.getElementById("btn1").addEventListener("click", (e) => {
    e.preventDefault();

    const dados = new FormData(form1);

    fetch("./actions/foto-salva.php", {
        method: "POST",
        body: dados
    })
    .then(() => {
        form1.style.display = "none";
        form2.style.display = "flex";
        
        carregarPreferencias();
    });
})



function carregarPreferencias() {
    const listaPai = document.querySelector("#listaPreferencias");
    listaPai.innerHTML = ""; // limpa lista caso usuário volte

    fetch('./actions/preferencia-lista.php')
        .then(response => response.json())
        .then(data => {
            data.forEach(pref => {
            const li = document.createElement('li');
            li.classList.add("item");
            li.draggable = true;

            // Adiciona eventos corretamente
            li.addEventListener('dragstart', dragstartHandler);
            li.addEventListener('dragover', dragoverItem);
            li.addEventListener('drop', dropItem);
                li.innerHTML = `
                    <input type="checkbox" id="pref0"name="preferencia[]" value="${pref.PreferenciaID}">
                    <label id="pf">${pref.Nome}</label>
                    <img src="${pref.Imagem}" class="img">
                `;
                listaPai.appendChild(li);
            });
        });
// Variável global que armazenará o item atualmente sendo arrastado
let draggedItem = null;

// Função chamada quando o usuário inicia o arrasto de um item
function dragstartHandler(ev) {
  // Guarda a referência do elemento que está sendo arrastado
  draggedItem = ev.target;

  // Define que o tipo de operação permitida é "mover" o item
  ev.dataTransfer.effectAllowed = "move";

  // Alguns navegadores exigem que se defina algum dado no dataTransfer
  ev.dataTransfer.setData("text/plain", "");
}

// Função que permite que o item seja solto em outro elemento
function dragoverItem(ev) {
  // Impede o comportamento padrão, permitindo o drop
  ev.preventDefault();
}

// Função executada quando o item é solto em uma área válida
function dropItem(ev) {
  // Evita o comportamento padrão
  ev.preventDefault();

  // Procura o elemento mais próximo com a classe "item"
  // Isso evita pegar sub-elementos internos
  const target = ev.target.closest(".item");

  // Valida:
  // - Se o alvo existe
  // - Se o alvo não é o próprio item sendo arrastado
  if (!target || target === draggedItem) return;

  // Obtém o elemento pai onde os itens estão organizados
  const parent = target.parentNode;

  // Insere o item arrastado antes do item-alvo (reposicionamento na lista)
  parent.insertBefore(draggedItem, target);
}
};

function criarCirculo() {
    fetch('./actions/pegarLatLong.php')
        .then(response => response.json())
        .then(data => {

            var latitude = parseFloat(data.latitude);
            var longitude = parseFloat(data.longitude);

            circle = L.circle([latitude, longitude], {
                color: 'green',
                fillColor: 'rgba(53, 107, 60, 1)',
                fillOpacity: 0.5,
                radius: 500
            }).addTo(map);
        });

    const slider = document.getElementById("range");

    slider.addEventListener("input", () => {
    const size = Number(slider.value); 
    circle.setRadius(size);  // atualiza o raio em metros
    });
}

function removerCirculo(){
    circle.remove();
    circle = null;
}


document.getElementById("btn2").addEventListener("click", (e) => {
    e.preventDefault();

    const dados = new FormData(form2);

    fetch("./actions/pref-salva.php", {
        method: "POST",
        body: dados
    })
    .then(() => {
        form2.style.display = "none";
        form3.style.display = "flex";
        container.style.height = "auto";
        container.style.top = "20%";
        container.style.left = "30%";
        container.style.translate = "-20% -30%";

        criarCirculo()
    });
});

function mostrarUsuarios() {
    let foto_perfil = document.getElementById("foto_perfil");
    let nome_user = document.getElementById("user");
    let preferencias = document.getElementById("preferencias");
    let match = document.getElementById("match");
    let recusar = document.getElementById("recusar");

    let index = 0;     // controla qual usuário está sendo exibido
    let lista = [];    // vai armazenar todos os usuários

    card.style.display = "flex";

    // Função que atualiza os dados do card
    function atualizarCard() {
        let usuario = lista[index];

        foto_perfil.src = './contents/perfil/' + usuario.Imagem;
        nome_user.innerText = "@" + usuario.Usuario;
        preferencias.innerText = usuario.Preferencias;
    }

    // Avançar para o próximo usuário
    function proximoUsuario() {
        index++;

        // Se chegar ao fim
        if (index >= lista.length) {
            card.style.display = "none";
        }

        atualizarCard();
    }

    // Carrega os usuários
    fetch('./actions/usuarios-lista.php')
        .then(response => response.json())
        .then(data => {

            if (!data || data.length === 0) {
                console.log("Nenhum usuário encontrado.");
                return;
            }

            lista = data; // guarda todos os usuários para usar no avanço

            atualizarCard(); // mostra o primeiro
        });

    // Botões para avançar
    match.addEventListener("click", () => {
        proximoUsuario();
    });

    recusar.addEventListener("click", () => {
        proximoUsuario();
    });
}

document.getElementById("btn3").addEventListener("click", (e) => {
    e.preventDefault();

    const raio = document.getElementById("range").value;

    const dados = new FormData();
    dados.append("raioDistancia", raio);

    fetch("./actions/distancia-salva.php", {
        method: "POST",
        body: dados
    })
    .then(() =>{
        container.style.display = "none";
        removerCirculo();
        mostrarUsuarios();
    })
}); 

    const prefs = document.getElementById("prefs");
    const bigBox = document.getElementById("bigBox");
    const sidebar = document.getElementById("sidebar");
    const openSidebar = document.getElementById("openSidebar");
    const closeSidebar = document.getElementById("closeSidebar");

    function inserirPrefs(){
        const ul = document.querySelector("#prefs");
        ul.innerHTML = ""; // limpa lista caso usuário volte

        fetch('./actions/preferencia-lista.php')
            .then(response => response.json())
            .then(data => {
                data.forEach(pref => {
                const li = document.createElement('p');
                    li.innerHTML = `
                        <p>${pref.PreferenciaID} - ${pref.Nome}</>
                    `;
                    ul.appendChild(li);
                });
            });
    }

    openSidebar.addEventListener("click", () => {
        let direct = document.getElementById("direct");
        let config = document.getElementById("config");
        sidebar.classList.add("show");
        closeSidebar.style.display = "block";
        direct.style.display = "none";        
        config.style.display = "none";
        closeSidebar.textContent = "→";
        inserirPrefs();
    });

    closeSidebar.addEventListener("click", () => {
        sidebar.classList.remove("show");
        closeSidebar.style.display = "none";
        direct.style.display = "flex";   
        config.style.display = "flex";
    });

    /* Troca imagem */
    const inputFile = document.getElementById("input-file");
    const circle_foto = document.getElementById("circle");
    const iconDefault = document.getElementById("icon-default");
    const profileImg = document.getElementById("profile-img");


    circle_foto.addEventListener("click", () => inputFile.click());

    inputFile.addEventListener("change", () => {
        const file = inputFile.files[0];
        if (!file) return;
        profileImg.src = URL.createObjectURL(file);
        profileImg.style.display = "block";
        iconDefault.style.display = "none";
        showSaveBtn();
    });

    /* Salvar dados */
    const saveBtn = document.getElementById("saveChanges");
    const username = document.getElementById("username");
    const distance = document.getElementById("distance");
    const formTrocarFoto = document.getElementById("formTrocarFoto");
    const formTrocarDistancia = document.getElementById("formTrocarDistancia");
    const formTrocarUsuario = document.getElementById("formTrocarUsuario");

    saveBtn.addEventListener("click", (e) => {
    e.preventDefault();

    const dados = new FormData();
    
    // FOTO
    const foto = document.getElementById("input-file").files[0];
    if (foto) dados.append("fotoPerfil", foto);

    // USERNAME
    dados.append("username", username.value.replace("@", ""));

    // DISTANCIA
    dados.append("distance", distance.value);

    fetch("./actions/atualizacoes.php", {
        method: "POST",
        body: dados
    })
});

    function showSaveBtn() {
        saveBtn.style.display = "block";
    }

    function sairSaveBtn(){
        saveBtn.style.display = "none";
    }

    saveBtn.addEventListener("click", () => {
        localStorage.setItem("username", username.value);
        localStorage.setItem("distance", distance.value);

        if (profileImg.src) {
            const canvas = document.createElement("canvas");
            const ctx = canvas.getContext("2d");
            canvas.width = profileImg.naturalWidth;
            canvas.height = profileImg.naturalHeight;
            ctx.drawImage(profileImg, 0, 0);
            localStorage.setItem("profileImage", canvas.toDataURL("image/png"));
        }

        saveBtn.style.display = "none";
    });

    /* Carregar dados salvos */
    window.addEventListener("load", () => {
        const savedName = localStorage.getItem("username");
        if (savedName) username.value = savedName;

        const savedDistance = localStorage.getItem("distance");
        if (savedDistance) distance.value = savedDistance;

        const savedImage = localStorage.getItem("profileImage");
        if (savedImage) {
            profileImg.src = savedImage;
            profileImg.style.display = "block";
            iconDefault.style.display = "none";
        }
    });

