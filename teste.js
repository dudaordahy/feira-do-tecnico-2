const sidebar = document.getElementById("sidebar");
const openSidebar = document.getElementById("openSidebar");
const closeSidebar = document.getElementById("closeSidebar");

openSidebar.addEventListener("click", () => {
    sidebar.classList.add("show");
    closeSidebar.style.display = "block";
    closeSidebar.textContent = "→";
});

closeSidebar.addEventListener("click", () => {
    sidebar.classList.remove("show");
    closeSidebar.style.display = "none";
});

/* Troca imagem */
const inputFile = document.getElementById("input-file");
const circle = document.getElementById("circle");
const iconDefault = document.getElementById("icon-default");
const profileImg = document.getElementById("profile-img");

circle.addEventListener("click", () => inputFile.click());

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

function showSaveBtn() {
    saveBtn.style.display = "block";
}

username.addEventListener("input", showSaveBtn);
distance.addEventListener("input", showSaveBtn);

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
    alert("Alterações salvas!");
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