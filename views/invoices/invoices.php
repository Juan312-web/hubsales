<?php
$invoices = $AllinvoicesFormat;
?>
<div class="container">
  <?php include_once __DIR__ . '/../components/header.php'; ?>
  <?php include_once __DIR__ . '/../templates/sidebar.php'; ?>

  <div class="content invoices default__dashboard">
    <?php
    $inputContent = '
        <input data-search="inv_identity" data-id="search__invoices" type="search" class="views__input"    placeholder="Search by Code">
      ';
    $buttonContent = '
      <a id="invoiceAdd" class="add__button boton boton--inline boton--secundary">Add Invoice</a>
      <a id="invoiceSearch" class="search__button boton boton--inline">Search Invoice</a>
    ';

    @include_once __DIR__ . '/../components/view_header.php';
    ?>
    <div id="invoices__table" class="invoices__table">
      <table>
        <thead>
          <th>Id</th>
          <th>Customer Name</th>
          <th>User Name</th>
          <th>Date Expiration</th>
        </thead>
        <tbody>
          <?php foreach ($invoices as $invoice): ?>
            <tr id="row" data-row="<?php echo $invoice->identity ?>">
              <td data-label='Id'><?php echo $invoice->identity ?></td>
              <td data-label='Customer'><?php echo $invoice->cli_name ?></td>
              <td data-label='User'><?php echo $invoice->user_name ?></td>
              <td data-label='Expiration'><?php echo $invoice->date_exp ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>