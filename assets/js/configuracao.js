document.addEventListener("DOMContentLoaded", () => {

    /* ===== MENU ===== */
    const menuItems = document.querySelectorAll(".sidebar li");
    const sections = document.querySelectorAll(".section");
  
    function applyActiveSidebarColor() {
      const active = document.querySelector(".sidebar li.active");
      if (!active) return;
  
      const bg = getComputedStyle(document.body).backgroundColor;
  
      active.style.setProperty("--activeColor", bg);
      active.style.setProperty("--activeText", getContrastColor(bg));
    }
  
    function showSection(id) {
      sections.forEach(s => s.classList.remove("active"));
      menuItems.forEach(li => li.classList.remove("active"));
  
      document.querySelector(`#${id}`).classList.add("active");
  
      const selected = document.querySelector(`.sidebar li[data-section="${id}"]`);
      selected.classList.add("active");
  
      applyActiveSidebarColor();
    }
  
    menuItems.forEach(item => {
      item.addEventListener("click", () => {
        showSection(item.dataset.section);
      });
    });
  
    showSection("conta");
  
  
    /* ===== TEMA ===== */
    const chk = document.getElementById("chk");
  
    if (localStorage.getItem("theme") === "light") {
      document.body.classList.remove("dark");
      chk.checked = true;
    }
  
    chk.addEventListener("change", () => {
      if (chk.checked) {
        document.body.classList.remove("dark");
        localStorage.setItem("theme", "light");
      } else {
        document.body.classList.add("dark");
        localStorage.setItem("theme", "dark");
      }
  
      applyActiveSidebarColor();
    });
  
  
    /* ===== FONTE ===== */
    const fontSelect = document.getElementById("fontSizeSelect");
  
    if (localStorage.getItem("fontSize")) {
      document.body.style.fontSize = localStorage.getItem("fontSize");
      fontSelect.value = localStorage.getItem("fontSize");
    }
  
    fontSelect.addEventListener("change", () => {
      document.body.style.fontSize = fontSelect.value;
      localStorage.setItem("fontSize", fontSelect.value);
    });
  
  
    /* ===== FAQ ===== */
    document.querySelectorAll(".faq-question").forEach(btn => {
      btn.addEventListener("click", () => {
        btn.parentElement.classList.toggle("active");
      });
    });
  
  
    /* ===== CONTRASTE ===== */
    function getContrastColor(rgb) {
      const nums = rgb.match(/\d+/g).map(Number);
      const [r, g, b] = nums;
  
      const lum = (0.299 * r + 0.587 * g + 0.114 * b);
      return lum > 150 ? "#000" : "#fff";
    }
  
  });