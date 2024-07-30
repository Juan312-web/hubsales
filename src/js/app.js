document.addEventListener('DOMContentLoaded', function () {
  initApp();
});

function initApp() {
  handleMenu();
}

function handleMenu() {
  const menuBar = document.getElementById('menubar');
  const menuClose = document.getElementById('menuclose');
  const sideBar = document.getElementById('sidebar');

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
}
