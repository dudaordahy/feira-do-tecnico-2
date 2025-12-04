// drag and drop
let draggedItem = null;

function dragstartHandler(ev) {
  draggedItem = ev.target;

  ev.dataTransfer.effectAllowed = "move";
}

function dragoverItem(ev) {
  ev.preventDefault();
}

function dropItem(ev) {
  ev.preventDefault();

  const target = ev.target.closest(".item");

  if (target && target !== draggedItem) {
    const parent = target.parentNode;

    parent.insertBefore(draggedItem, target);
  }
}
