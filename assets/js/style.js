const cm = document.querySelector(".custom-cm");

function showContextMenu(show = true) {
  cm.style.display = show ? "block" : "none";
  return false;
}

window.addEventListener("contextmenu", e => {
  e.preventDefault();

  showContextMenu();
  cm.style.top = e.y + "px"
  cm.offsetHeight > window.innerHeight ?
    window.innerHeight - cm.offsetHeight :
    e.y;
  cm.style.left = e.x + "px"
  cm.offsetWidth > window.innerWidth ?
    window.innerWidth - cm.offsetWidth :
    e.x;
});

window.addEventListener("click", () => {
  showContextMenu(false);
});

$(document).ready(function () {
  $('[data-toggle="tooltip"]').tooltip();
});
