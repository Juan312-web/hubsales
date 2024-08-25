<?php

namespace Controllers;

use Model\Invoice;
use Model\Payment;
use MVC\Router;

class PaymentController
{
  public static function index(Router $router)
  {
    $allPayments = Payment::all();
    foreach ($allPayments as $payment) {
      $payment->inv_code = Invoice::where('inv_id', $payment->pay_inv_id)->inv_identity;
      $payment->state = $payment->pay_state === 1 ? 'Settled' : 'Pending';
    }
    $router->render('payments/payments', ['title' => 'PAYMENTS', 'desc' => 'Manage yout Payments', "allPayments" => $allPayments]);
  }

  public static function search()
  {
    $value = $_GET['value'];
    $payments = Payment::whereContains("pay_identity", $value);

    echo json_encode($payments);
  }
}
