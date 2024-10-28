<?php $customers = $allCustomers ?>

<div class="container">
  <?php include_once __DIR__ . '/../components/header.php'; ?>
  <?php include_once __DIR__ . '/../templates/sidebar.php'; ?>
  <?php include_once __DIR__ . '/../components/alerts.php'; ?>

  <div class="content customer default__dashboard">
    <?php
    $inputContent = '
        <input data-search="cli_identity" data-id="search__customers" type="number" class="views__input"    placeholder="Search by ID">
      ';
    $buttonContent = '
      <a href="/customers-add" id="customerAdd" class="add__button boton boton--inline boton--secundary">Add Customer</a>
      <a id="customerSearch" class="search__button boton boton--inline">Search Customer</a>
    ';

    @include_once __DIR__ . '/../components/view_header.php';
    ?>
    <div id="customers__table" class="customers__table">
      <table>
        <thead>
          <th>Name</th>
          <th>Identity</th>
          <th>Email</th>
          <th>Address</th>
          <th>Actions</th>
        </thead>
        <tbody>
          <?php foreach ($customers as $customer) : ?>
            <tr id="row" data-row="<?php echo $customer->cli_identity ?>">
              <td data-label='Name'><?php echo $customer->cli_name . ' ', $customer->cli_lastname ?></td>
              <td data-label='Identity'><?php echo $customer->cli_identity ?></td>
              <td data-label='Email'><?php echo $customer->cli_email ?></td>
              <td data-label='Address'><?php echo $customer->cli_address ?></td>
              <td class="action__container">
                <a class="boton--action update" href="/customers-update?id=<?php echo $customer->cli_id ?>"><span class="material-symbols-outlined">
                    edit
                  </span></a>
                <form action="/customers-delete" method="post" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este elemento?')">
                  <input type="hidden" name="id" value="<?php echo $customer->cli_id ?>">
                  <button type="submit" class="boton--action delete "><span class="material-symbols-outlined">
                      delete
                    </span></button>
                </form>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>