document.addEventListener('DOMContentLoaded', function () {
  initApp();
});

invoice = {
  customer: '',
  user: '',
  date: setDate(),
  date_exp: '',
  products: [],
};

function initApp() {
  handleMenu();
  handleSelectedLink();
  handleSearchView();
  handleSearch();
  searchModalInvoices();
  setDateExp();
  setProducts();
  saveInvoice();
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

async function searchModalInvoices() {
  let addButtons = document.querySelectorAll('[data-id="addInvoiceElement"]');

  if (addButtons) {
    addButtons.forEach((addButton) => {
      const title = addButton.dataset.title;
      addButton.addEventListener('click', (e) => {
        e.preventDefault();
        const search = e.target.id.split('__')[1];
        pushModal(title, search);
      });
    });
  }
}

function pushModal(title, search) {
  const searchLabel = document.getElementById('search_label');
  const modal = document.getElementById('modal');
  const closeModalButton = document.getElementById('modal__icon');
  const modalTitle = document.getElementById('modal__title');

  modalTitle.textContent = `Select ${title}`;
  searchLabel.textContent = title.toLowerCase();

  if (modal && !modal.classList.contains('activ e')) {
    modal.classList.add('active');
  }

  closeModalButton.addEventListener('click', closeModal);

  setModal(search);
}

function closeModal(tr) {
  const tableBody = document.querySelector('.invoice__table__body');
  const modal = document.getElementById('modal');
  const searchModal = document.getElementById('search__modal');

  modal.classList.remove('active');
  searchModal.value = '';
  tableBody.innerHTML = '';
}

function setModal(search) {
  const invoicesTable = document.getElementById('invoices__table');
  const table = document.querySelector('.invoice__table__base');
  const tableHead = document.querySelector('.invoice__table__head');
  const tableBody = document.querySelector('.invoice__table__body');
  const input = document.querySelector('#search__modal');
  let searchItem = '';

  // * Reset Container Head
  tableHead.innerHTML = '';

  let th = [];

  if (search === 'customer') {
    th = ['Name', 'Identity', 'Actions'];
    input.setAttribute('data-id', 'customers');
    input.setAttribute('data-search', 'cli_identity');
    input.setAttribute('placeholder', 'search by identity');
    searchItem = 'customers';
  } else if (search === 'user') {
    th = ['Name', 'Email', 'Actions'];
    input.setAttribute('data-id', 'users');
    input.setAttribute('data-search', 'user_id');
    input.setAttribute('placeholder', 'search by email');
    searchItem = 'users';
  } else if (search === 'product') {
    th = ['Name', 'Max Quantity', 'Price', 'Actions'];
    input.setAttribute('data-id', 'products');
    input.setAttribute('data-search', 'prod_id');
    input.setAttribute('placeholder', 'search by Code');
    searchItem = 'products';
  }

  if (th) {
    th.forEach((item) => {
      const thItem = document.createElement('TH');
      thItem.textContent = item;
      tableHead.appendChild(thItem);
    });
  }

  input.addEventListener('input', async (e) => {
    let value = e.target.value;
    const response = await searchBD(input.getAttribute('data-id'), value);
    tableBody.innerHTML = '';

    if (value !== '') {
      response.forEach((res) => {
        if (searchItem === 'customers') {
          const tr = document.createElement('TR');
          const tdName = document.createElement('TD');
          const tdIdentity = document.createElement('TD');
          const tdActions = document.createElement('TD');

          // * set tdName
          tdName.setAttribute('data-label', 'Name');
          tdName.textContent = `${res.cli_name} ${res.cli_lastname} `;

          // * set tdIdentity
          tdIdentity.setAttribute('data-label', 'Identity');
          tdIdentity.textContent = res.cli_identity;

          // * set Actions
          const buttonAdd = document.createElement('A');
          buttonAdd.classList.add('boton--action');
          buttonAdd.classList.add('update');
          buttonAdd.setAttribute('data-id', res.cli_id);

          buttonAdd.addEventListener('click', () => {});

          const buttonSpan = document.createElement('SPAN');
          buttonSpan.textContent = 'add';
          buttonSpan.classList.add('material-symbols-outlined');

          buttonAdd.appendChild(buttonSpan);

          buttonAdd.addEventListener('click', (e) => {
            e.preventDefault();
            const cliName = document.getElementById('cli_name');
            invoice.customer = res.cli_id;
            cliName.value = `${res.cli_name} ${res.cli_lastname} `;
            closeModal();
          });

          tdActions.classList.add('action__container');
          tdActions.appendChild(buttonAdd);

          tr.appendChild(tdName);
          tr.appendChild(tdIdentity);
          tr.appendChild(tdActions);

          tableBody.appendChild(tr);
        } else if (searchItem === 'users') {
          const tr = document.createElement('TR');
          const tdName = document.createElement('TD');
          const tdEmail = document.createElement('TD');
          const tdActions = document.createElement('TD');

          // * set tdName
          tdName.setAttribute('data-label', 'Name');
          tdName.textContent = `${res.user_name} ${res.user_lastname} `;

          // * set Email
          tdEmail.setAttribute('data-label', 'Email');
          tdEmail.textContent = res.user_email;

          // * set Actions
          const buttonAdd = document.createElement('A');
          buttonAdd.classList.add('boton--action');
          buttonAdd.classList.add('update');
          buttonAdd.setAttribute('data-id', res.user_id);

          buttonAdd.addEventListener('click', () => {});

          const buttonSpan = document.createElement('SPAN');
          buttonSpan.textContent = 'add';
          buttonSpan.classList.add('material-symbols-outlined');

          buttonAdd.appendChild(buttonSpan);

          buttonAdd.addEventListener('click', (e) => {
            e.preventDefault();
            const userName = document.getElementById('user_name');
            invoice.user = res.user_id;
            userName.value = `${res.user_name} ${res.user_lastname} `;
            closeModal();
          });

          tdActions.classList.add('action__container');
          tdActions.appendChild(buttonAdd);

          tr.appendChild(tdName);
          tr.appendChild(tdEmail);
          tr.appendChild(tdActions);

          tableBody.appendChild(tr);
        } else if (searchItem === 'products') {
          const tr = document.createElement('TR');
          const tdName = document.createElement('TD');
          const tdMaxQuantity = document.createElement('TD');

          const QuantityInput = document.createElement('INPUT');
          const tdPrice = document.createElement('TD');
          const tdActions = document.createElement('TD');

          // * set tdName
          tdName.setAttribute('data-label', 'Name');
          tdName.textContent = res.prod_name;

          // * set tdMaxQuantity
          tdMaxQuantity.setAttribute('data-label', 'Max-Quantity');
          tdMaxQuantity.textContent = `${res.prod_stock} U`;

          // * set QuantityInput
          QuantityInput.setAttribute('type', 'number');
          QuantityInput.classList.add('modal__input__invoice');
          QuantityInput.max = res.prod_stock;

          QuantityInput.addEventListener('input', () => {
            if (QuantityInput.value > res.prod_stock) {
              QuantityInput.value = '';
            }
          });

          // * set tdPrice
          tdPrice.setAttribute('data-label', 'Price');
          tdPrice.textContent = `$${res.prod_u_price}`;

          // * set Actions
          const buttonAdd = document.createElement('A');
          buttonAdd.classList.add('boton--action');
          buttonAdd.classList.add('update');
          buttonAdd.setAttribute('data-id', res.prod_id);

          const buttonSpan = document.createElement('SPAN');
          buttonSpan.textContent = 'add';
          buttonSpan.classList.add('material-symbols-outlined');

          buttonAdd.appendChild(buttonSpan);

          buttonAdd.addEventListener('click', (e) => {
            const { products } = invoice;

            if (products.length === 0) {
              invoice.products = [...invoice.products, { ...res, quan: 1 }];
            } else {
              let find = invoice.products.find(
                (product) => product.prod_id === res.prod_id
              );

              if (!find) {
                invoice.products = [...invoice.products, { ...res, quan: 1 }];
              }
            }

            closeModal();
            setProducts();
          });

          tdActions.classList.add('action__container');
          tdActions.appendChild(buttonAdd);

          tr.appendChild(tdName);
          tr.appendChild(tdMaxQuantity);
          tr.appendChild(tdPrice);
          tr.appendChild(tdActions);
          tableBody.appendChild(tr);
        }
      });
    }
  });

  table.appendChild(tableHead);
  table.appendChild(tableBody);
  invoicesTable.appendChild(table);
}

// * Set Date and Date Exp
function setDate() {
  const today = new Date();
  const year = today.getFullYear();
  const month = String(today.getMonth() + 1).padStart(2, '0'); // Sumar 1 porque los meses comienzan en 0
  const day = String(today.getDate()).padStart(2, '0');

  const formattedDate = `${year}-${month}-${day}`;
  return formattedDate;
}

function setDateExp() {
  const invDateExp = document.getElementById('inv_date_exp');

  if (invDateExp) {
    invDateExp.addEventListener('change', (e) => {
      invoice.date_exp = invDateExp.value;
    });
  }
}

function setProducts() {
  // * Set table
  let { products } = invoice;
  const invoicesTableBody = document.getElementById('invoices_products_table');
  if (invoicesTableBody) {
    invoicesTableBody.innerHTML = '';
  }
  // * Create Structure
  if (products) {
    products.forEach((prod) => {
      const tr = document.createElement('TR');
      const tdName = document.createElement('TD');
      const tdMaxQuantity = document.createElement('TD');
      const tdQuantity = document.createElement('TD');
      const QuantityInput = document.createElement('INPUT');
      const tdPrice = document.createElement('TD');
      const tdActions = document.createElement('TD');

      // * set tdName
      tdName.setAttribute('data-label', 'Name');
      tdName.textContent = prod.prod_name;

      // * set tdMaxQuantity
      tdMaxQuantity.setAttribute('data-label', 'Max-Quantity');
      tdMaxQuantity.textContent = `${prod.prod_stock} U`;

      // * set tdQuantity
      tdQuantity.appendChild(QuantityInput);
      tdQuantity.setAttribute('data-label', 'Quantity');

      // * set QuantityInput
      QuantityInput.setAttribute('type', 'number');
      QuantityInput.classList.add('modal__input__invoice');
      QuantityInput.max = prod.prod_stock;
      QuantityInput.value = prod.quan;

      QuantityInput.addEventListener('change', () => {
        if (QuantityInput.value > prod.prod_stock || QuantityInput.value <= 0) {
          QuantityInput.value = 1;
        } else {
          invoice.products.forEach((product) => {
            if (product.prod_id === prod.prod_id) {
              product.quan = QuantityInput.value;
            }
          });
        }
      });

      // * set tdPrice
      tdPrice.setAttribute('data-label', 'Price');
      tdPrice.textContent = `$${prod.prod_u_price}`;

      // * set Actions
      const buttonRemove = document.createElement('A');
      buttonRemove.classList.add('boton--action');
      buttonRemove.classList.add('delete');
      buttonRemove.setAttribute('data-id', prod.prod_id);

      const buttonSpan = document.createElement('SPAN');
      buttonSpan.textContent = 'delete';
      buttonSpan.classList.add('material-symbols-outlined');

      buttonRemove.appendChild(buttonSpan);

      buttonRemove.addEventListener('click', (e) => {
        const { products } = invoice;
        let id = parseInt(buttonRemove.getAttribute('data-id'));
        invoice.products = products.filter((product) => product.prod_id !== id);
        setProducts();
      });

      tdActions.classList.add('action__container');
      tdActions.appendChild(buttonRemove);

      tr.appendChild(tdName);
      tr.appendChild(tdMaxQuantity);
      tr.appendChild(tdQuantity);
      tr.appendChild(tdPrice);
      tr.appendChild(tdActions);

      invoicesTableBody.appendChild(tr);
    });
  }
}

function saveInvoice() {
  let form = document.querySelector('.form__invoice');
  if (form) {
    form.addEventListener('submit', async (e) => {
      e.preventDefault();

      try {
        let url = 'http://localhost:3000/invoices-add';
        let result = await fetch(url, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json', // Especificamos que estamos enviando JSON
          },
          body: JSON.stringify(invoice),
        });

        let response = await result.json();

        if (response.alertas) {
          let errores = response.alertas.error;
          const alertContainer = document.getElementById('alertContainer');
          alertContainer.innerHTML = '';

          errores.forEach((error) => {
            const container = `
            <div id="alertas__container" class="alertas__container error zindex ">
              <span class="material-symbols-outlined alertas__icon">
                error
              </span>
              <p class="alertas__message">
              ${error}
              </p>
            </div>`;
            alertContainer.innerHTML += container;
          });

          setTimeout(() => {
            if (alertContainer) {
              alertContainer.innerHTML = '';
            }
          }, 3500);
        } else {
          window.location.href = 'http://localhost:3000/invoices';
        }
      } catch (error) {
        console.log(error);
      }
    });
  }
}
