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
      <a href="/invoices-add" id="invoiceAdd" class="add__button boton boton--inline boton--secundary">Add Invoice</a>
      <a id="invoiceSearch" class="search__button boton boton--inline">Search Invoice</a>
    ';

    @include_once __DIR__ . '/../components/view_header.php';
    ?>
    <div id="invoices__table" class="invoices__table">
      <table>
        <thead>
          <th>Id</th>
          <th>Customer Name</th>
          <th>Date</th>
          <th>Date Expiration</th>
          <th>Subtotal</th>
          <th>Actions</th>
        </thead>
        <tbody>
          <?php foreach ($invoices as $invoice): ?>
            <tr id="row" data-row="<?php echo $invoice->identity ?>">
              <td data-label='Id'><?php echo $invoice->identity ?></td>
              <td data-label='Customer'><?php echo $invoice->cli_name ?></td>
              <td data-label='Date'><?php echo $invoice->date ?></td>
              <td data-label='Expiration'><?php echo $invoice->date_exp ?></td>
              <td data-label='Subtotal'><?php echo $invoice->subtotal ?></td>
              <td class="action__container">
                <a class="boton--action view" href="/invoices-view?id=<?php echo $invoice->identity ?>">
                  <span class="material-symbols-outlined">
                    description
                  </span>
                </a>
                <a class="boton--action update" href="/invoices-download?id=<?php echo $invoice->identity ?>">
                  <span class="material-symbols-outlined">
                    print
                  </span>
                </a>
                <form action="/invoices-delete" method="post" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta factura?')">
                  <input type="hidden" name="identify" value="<?php echo $invoice->identify ?>">
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