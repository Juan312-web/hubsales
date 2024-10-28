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


    foreach ($allInvoices as $invoice) {
      $invoiceFormat = new InvoiceFormat();

      $invoiceFormat->identity = $invoice->inv_identity;
      $invoiceFormat->cli_name = Customer::where('cli_id', $invoice->inv_cli_id)->cli_name . ' ' . Customer::where('cli_id', $invoice->inv_cli_id)->cli_lastname;
      $invoiceFormat->date_exp = $invoice->inv_date_exp;
      $invoiceFormat->date = $invoice->inv_date;
      $invoiceFormat->subtotal = '$' . InvoiceDetails::where('det_fac_id', $invoice->inv_id)->det_subtotal;

      $AllinvoicesFormat[] = $invoiceFormat;
    }



    $router->render('invoices/invoices', ['title' => 'INVOICES', 'desc' => 'Manage yout Invoices', 'AllinvoicesFormat' => $AllinvoicesFormat]);
  }

  public static function addInvoice(Router $router)
  {
    $alertas = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $invoice = new Invoice();
      $invoiceDetails = new InvoiceDetails();

      $datosRecibidos = file_get_contents("php://input");
      $datos = json_decode($datosRecibidos, true);

      $alertas = Invoice::validate($datos);
      if (!empty($alertas)) {
        echo json_encode([
          'alertas' => $alertas,
        ]);
        exit;
      }
      // Acceder a los campos del JSON decodificado
      $invoice->inv_identity = Invoice::invoiceIdentidy();
      $invoice->inv_date = $datos['date'];
      $invoice->inv_date_exp = $datos['date_exp'];
      $invoice->inv_cli_id = $datos['customer'];
      $invoice->inv_user_id = $datos['user'];
      $res = $invoice->guardar('inv_id');
      $invoiceId = $res['id'];


      $products = $datos['products'];
      foreach ($products as $product) {
        $invoiceDetails->det_fac_id = $invoiceId;
        $invoiceDetails->det_prod_id = $product['prod_id'];
        $invoiceDetails->det_amount = intval($product['quan']);
        $invoiceDetails->det_subtotal = $product['prod_u_price'] * $product['quan'];
        $invoiceDetails->guardar('det_id');
      }

      echo json_encode([
        // "id" => $invoiceId
        "products" => $products,
        "invoiceDetails" => $invoiceDetails
      ]);
    } else {
      $router->render('invoices/addInvoice');
    }
  }

  public static function search()
  {
    $value = $_GET['value'];
    $invoices = Invoice::whereContains("inv_identity", $value);

    echo json_encode($invoices);
  }

  public static function viewInvoice(Router $router)
  {
    $identity = $_GET['id'];
    $router->render('invoices/viewInvoice', ["identity" => $identity]);
  }

  public static function downloadInvoice()
  {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $invoiceIdentidy = $_POST['id'];
    }
  }

  public static function deleteInvoice()
  {
    debuguear("eliminando...");
  }

  public static function invoicePDF(Router $router)
  {
    $router->render('invoices/invoiceFormat');
  }
}
