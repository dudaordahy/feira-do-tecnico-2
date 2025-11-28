const slider = document.getElementById("range");
const circle = document.getElementById("circle");

slider.addEventListener("input", () => {
    const size = slider.value;
    circle.style.width = size + "px";
    circle.style.height = size + "px";
});

// Coordenadas personalizadas
    var latitude = -30.068141925489904;
    var longitude = -51.20064951657418;

    // Inicializa o mapa
    var map = L.map('map').setView([latitude, longitude], 15);

    // Camada de mapa
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 20
    }).addTo(map);

    // Marcador
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

