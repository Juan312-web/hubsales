document.addEventListener('DOMContentLoaded', function () {
  initApp();
});

function initApp() {
  handleMenu();
  handleSelectedLink();
}

function handleMenu() {
  const menuBar = document.getElementById('menubar');
  const menuClose = document.getElementById('menuclose');
  const sideBar = document.getElementById('sidebar');

  // * Abrir y cerrar menu
  if (menuBar) {
    menuBar.addEventListener('click', () => {
      sideBar.classList.add('active');
      console.log('Click');
    });
  }

  if (menuClose) {
    menuClose.addEventListener('click', () => {
      sideBar.classList.remove('active');
    });
  }

  // * Cambiar Estilo a Boton Actual
}

function handleSelectedLink() {
  const links = document.querySelectorAll('.sidebar__link');

  if (links) {
    links.forEach((link) => {
      let currentUrl = window.location.href.split('/')[3];
      let linkUrl = link.attributes.href.value.split('/')[1];

      if (linkUrl === currentUrl) {
        link.classList.add('selected');
        return;
      }
    });
  }
}
