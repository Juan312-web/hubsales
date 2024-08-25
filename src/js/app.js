document.addEventListener('DOMContentLoaded', function () {
  initApp();
});

function initApp() {
  handleMenu();
  handleSelectedLink();
  handleSearchView();
  handleSearch();
}

function handleMenu() {
  const menuBar = document.getElementById('menubar');
  const menuClose = document.getElementById('menuclose');
  const sideBar = document.getElementById('sidebar');
  const userSearch = document.querySelector('#views__search');

  // * Abrir y cerrar menu
  if (menuBar) {
    menuBar.addEventListener('click', () => {
      sideBar.classList.add('active');

      if (userSearch.classList.contains('active__search')) {
        userSearch.classList.remove('active__search');
        userSearch.classList.add('hide__search');
      }
    });
  }

  if (menuClose) {
    menuClose.addEventListener('click', () => {
      sideBar.classList.remove('active');
      userSearch.classList.remove('hide__search');
    });
  }
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

function handleSearchView() {
  const userSearch = document.querySelector('#views__search');
  const userSearchButton = document.querySelector('.search__button');

  if (userSearchButton) {
    userSearchButton.addEventListener('click', (e) => {
      e.preventDefault();
      userSearch.classList.remove('hidde__search');
      userSearch.classList.toggle('active__search');
    });
  }
}

function handleSearch() {
  const inputSearch = document.querySelectorAll('.views__input');

  inputSearch.forEach((input) => {
    input.addEventListener('input', (e) => {
      e.preventDefault();
      let inputTitle = input.getAttribute('data-id').split('__')[1];
      let dataSearch = input.getAttribute('data-search');
      let inputValue = e.target.value;

      handleSearchDinamic(inputTitle, inputValue, dataSearch);
    });
  });
}

async function handleSearchDinamic(title, value, dataSearch) {
  const table = document.querySelector(`.${title}__table`);
  const rows = table.querySelectorAll('tr#row');

  if (!value) {
    rows.forEach((row) => {
      row.style.display = '';
    });
    return; // Sal de la función ya que no es necesario buscar en la base de datos
  }

  let results = await searchBD(title, value);

  rows.forEach(async (row) => {
    const rowValue = parseInt(row.getAttribute('data-row'));

    const match = await results.some((res) => res[dataSearch] == rowValue);

    if (match) {
      row.style.display = '';
    } else {
      row.style.display = 'none';
    }
  });
}

async function searchBD(title, value) {
  try {
    const url = `http://localhost:3000/api/${title}?value=${value}`;
    const result = await fetch(url);
    const response = await result.json();

    return response;
  } catch (error) {
    console.log(error);
  }
}
