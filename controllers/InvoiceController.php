<?php

namespace Controllers;

use Model\Customer;
use Model\Invoice;
use Model\InvoiceDetails;
use Model\InvoiceFormat;
use Model\User;
use MVC\Router;

class InvoiceController
{
  public static function index(Router $router)
  {
    $AllinvoicesFormat = [];
    $invoiceFormat = [];
    $allInvoices = Invoice::all();
    $allInvoicesDetails = InvoiceDetails::all();


    foreach ($allInvoices as $invoice) {
      $invoiceFormat = new InvoiceFormat();

      $invoiceFormat->identity = $invoice->inv_Identity;
      $invoiceFormat->cli_name = Customer::where('cli_id', $invoice->inv_cli_id)->cli_name . ' ' . Customer::where('cli_id', $invoice->inv_cli_id)->cli_lastname;
      $invoiceFormat->user_name = User::where('user_id', $invoice->inv_user_id)->user_name . ' ' . User::where('user_id', $invoice->inv_user_id)->user_lastname;
      $invoiceFormat->date_exp = $invoice->inv_date_exp;

      $AllinvoicesFormat[] = $invoiceFormat;
    }



    $router->render('invoices/invoices', ['title' => 'INVOICES', 'desc' => 'Manage yout Invoices', 'AllinvoicesFormat' => $AllinvoicesFormat]);
  }
}
