fetch('./actions/pegarLatLong.php')
    .then(response => response.json())
    .then(data => {
        var latitude = parseFloat(data.latitude);
        var longitude = parseFloat(data.longitude);

        window.map = L.map('map').setView([latitude, longitude], 15);

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

        carregarPreferencias()
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
                li.innerHTML = `
                    <label>
                        <input id="pref_selecao" type="checkbox" name="preferencia[]" value="${pref.PreferenciaID}">
                        ${pref.Nome}
                    </label>
                `;
                listaPai.appendChild(li);
            });
        });
}

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

function mostrarUsuarios(){
        let foto_perfil = document.getElementById("foto_perfil");
        let nome_user = document.getElementById("user");
        let preferencias = document.getElementById("preferencias");
        let match = document.getElementById("match");
        let recusar = document.getElementById("recusar");
    
        card.style.display = "flex";
    
        fetch('./actions/usuarios-lista.php')
            .then(response => response.json())
            .then(lista => {
    
                if (!lista || lista.length === 0) {
                    console.log("Nenhum usuário encontrado.");
                    return;
                }
    
                // pega o primeiro usuário encontrado
                let usuario = lista[0];
    
                foto_perfil.src = usuario.Imagem;
                nome_user.innerText = "@" + usuario.Usuario;
                preferencias.innerText = usuario.Preferencias;
            });

            match.addEventListener("click", () => {
                card.style.display = "none";
            });
        
            recusar.addEventListener("click", () => {
                card.style.display = "none";
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
        mostrarUsuarios();
        removerCirculo();
    })
});
