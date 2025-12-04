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
