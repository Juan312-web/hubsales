<div id="container" class="container">
  <?php include_once __DIR__ . '/../components/header.php'; ?>
  <?php include_once __DIR__ . '/../templates/sidebar.php'; ?>
  <?php include_once __DIR__ . '/../components/alerts.php'; ?>
  <?php include_once __DIR__ . '/../components/modal.php'; ?>



  <div class="content invoices__add content__center">
    <form method="POST" id="invoices__add" class="form form__invoice">
      <h2 class="form__title">
        Add Invoice
      </h2>
      <div class="form__row">
        <!-- * ------------------------------ * -->
        <div class="form__row__item">
          <label class="form__label" for="cli_name">Customer</label>
          <div class="form__container__search">
            <button id="search__customer__invoice" class="boton boton--inline boton--secundary" data-title="Customer" data-id="addInvoiceElement">Add Customer</button>
            <input require autocomplete="name" disabled name="cli_name" id="cli_name" type="text" class="form__input" value="<?php ?>">
          </div>
        </div>
      </div>
      <div class="form__row">
        <!-- * ------------------------------ * -->
        <div class="form__row__item">
          <label class="form__label" for="user_name">User</label>
          <div class="form__container__search">
            <button id="search__user__invoice" class="boton boton--inline boton--secundary" data-title="User" data-id="addInvoiceElement">Add User</button>
            <input require autocomplete="name" disabled name="user_name" id="user_name" type="text" class="form__input" value="<?php ?>">
          </div>
        </div>
      </div>
      <div class="form__row">
        <!-- * ------------------------------ * -->
        <div class="form__row__item">
          <label class="form__label" for="inv_date">Invoice Date</label>
          <input require disabled name="inv_date" id="inv_date" type="date" class="form__input" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <!-- * ------------------------------ * -->
        <div class="form__row__item">
          <label class="form__label" for="inv_date_exp">Invoice Due Date </label>
          <input require autocomplete="name" name="inv_date_exp" id="inv_date_exp" type="date" class="form__input" min="<?php echo date('Y-m-d'); ?>">
        </div>
      </div>
      <div class="form__row top">
        <label class="form__label" for="inv_date">Products</label>
        <button id="search__product__invoice" data-title="Product" data-id="addInvoiceElement" style="margin-left: 2rem;" class="boton boton--inline boton--secundary">Add Product</button>
      </div>
      <div class="form__row">
        <div class="form__row__item">

          <div class="invoices__table">
            <table>
              <thead>
                <th>Name</th>
                <th>Max Quantity</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Actions</th>
              </thead>
              <tbody id="invoices_products_table">

              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- <p class="total"><span class="total__text">Total</span><span class="total__num">$53000</span></p> -->

      <button id="send__invoice" class="boton" type="submit">Add Invoice</button>
    </form>
  </div>
</div>