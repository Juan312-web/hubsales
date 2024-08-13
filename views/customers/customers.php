<?php $customers = $allCustomers ?>

<div class="container">
  <?php include_once __DIR__ . '/../components/header.php'; ?>
  <?php include_once __DIR__ . '/../templates/sidebar.php'; ?>

  <div class="content customer default__dashboard">
    <?php
    $inputPlaceholder = 'Search by ID';
    $buttonContent = '
      <a id="customerAdd" class="add__button boton boton--inline boton--secundary">Add Customer</a>
      <a id="customerSearch" class="search__button boton boton--inline">Search Customer</a>
    ';

    @include_once __DIR__ . '/../components/view_header.php';
    ?>
    <div class="products__table">
      <table>
        <thead>
          <th>Name</th>
          <th>Identity</th>
          <th>Email</th>
          <th>Address</th>
        </thead>
        <tbody>
          <?php foreach ($customers as $customer) : ?>
            <tr>
              <td><?php echo $customer->cli_name . ' ', $customer->cli_lastname ?></td>
              <td><?php echo $customer->cli_identity ?></td>
              <td><?php echo $customer->cli_email ?></td>
              <td><?php echo $customer->cli_address ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>