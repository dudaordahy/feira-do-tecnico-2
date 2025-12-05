// ===== MENU LATERAL =====
const menuItems = document.querySelectorAll(".sidebar li");
const sections = document.querySelectorAll(".section");
 
menuItems.forEach(item => {
  item.addEventListener("click", () => {
    const sectionId = item.getAttribute("data-section");
 
    sections.forEach(sec => sec.classList.remove("active"));
    menuItems.forEach(li => li.classList.remove("active"));
 
    item.classList.add("active");
    document.getElementById(sectionId).classList.add("active");
  });
});
 
// ===== MODO CLARO/ESCURO =====
const toggle = document.getElementById("themeToggle");
toggle.addEventListener("change", () => {
  document.body.classList.toggle("light-mode", toggle.checked);
  document.body.classList.toggle("dark-mode", !toggle.checked);
});
 
// ===== TAMANHO DA FONTE =====
const fontSelect = document.getElementById("fontSizeSelect");
fontSelect.addEventListener("change", () => {
  document.body.style.fontSize = fontSelect.value;
});
 
// ===== IDIOMA =====
const languageSelect = document.getElementById("languageSelect");
languageSelect.addEventListener("change", () => {
  const lang = languageSelect.value;
  if (lang === "en") {
    alert("Language changed to English.");
  } else if (lang === "es") {
    alert("Idioma cambiado a Español.");
  } else {
    alert("Idioma alterado para Português (Brasil).");
  }
});
 
// ===== SUPORTE (FAQ) =====
document.addEventListener("DOMContentLoaded", () => {
  const faqButtons = document.querySelectorAll(".faq-question");
 
  faqButtons.forEach(btn => {
    btn.addEventListener("click", () => {
      const item = btn.parentElement;
      const isActive = item.classList.contains("active");
 
      document.querySelectorAll(".faq-item").forEach(i => i.classList.remove("active"));
      if (!isActive) item.classList.add("active");
    });
  });
});
 

