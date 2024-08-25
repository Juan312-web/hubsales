<?php $payments = $allPayments ?>

<div class="container">
  <?php include_once __DIR__ . '/../components/header.php'; ?>
  <?php include_once __DIR__ . '/../templates/sidebar.php'; ?>

  <div class="content invoices default__dashboard">
    <?php
    $inputContent = '
    <input data-search="pay_identity" data-id="search__payments" type="search" class="views__input"    placeholder="Search by Code">
  ';
    $buttonContent = '
      <a id="paymentAdd" class="add__button boton boton--inline boton--secundary">Add Payment</a>
      <a id="paymentSearch" class="search__button boton boton--inline">Search Payment</a>
    ';

    @include_once __DIR__ . '/../components/view_header.php';
    ?>
    <div id="payments__table" class="payments__table">
      <table>
        <thead>
          <th>Paycode</th>
          <th>Invoice Code</th>
          <th>Total Pay</th>
          <th>Pay State</th>
          <th>Pay Date</th>
        </thead>
        <tbody>
          <?php foreach ($payments as $payment): ?>
            <tr id="row" data-row="<?php echo $payment->pay_identity;  ?>">
              <td data-label='Pay Code'><?php echo $payment->pay_identity; ?></td>
              <td data-label='Invoice Code'><?php echo $payment->inv_code; ?></td>
              <td data-label='Total Pay'><?php echo $payment->pay_amount; ?></td>
              <td data-label='Pay State'><?php echo $payment->state; ?></td>
              <td data-label='Pay Date'><?php echo $payment->pay_date; ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>