<?php

namespace Controllers;

use Model\Customer;
use Model\Invoice;
use MVC\Router;

class CustomerController
{
  public static function index(Router $router)
  {
    $allCustomers = Customer::all();
    $alerts = [];
    $code = $_GET['code'];
    if ($code) {
      if ($code === '1') {
        $alerts = Customer::setAlerta('exito', 'Eliminado con exito');
      } else if ($code === '2') {
        $alerts = Customer::setAlerta('error', 'Cliente con facturas pendientes');
      }
      $alerts = Customer::getAlertas();
    }
    $router->render('customers/customers', ['title' => 'CUSTOMERS', 'desc' => 'Manage Your Customers', 'allCustomers' => $allCustomers, "alertas" => $alerts]);
  }

  public static function search()
  {
    $value = $_GET['value'];
    $customers = Customer::whereContains('cli_identity', $value);

    echo json_encode($customers);
  }

  public static function addCustomer(Router $router)
  {
    $customer = new Customer();
    $alerts = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $customer->sincronizar($_POST);
      $alerts = $customer->validateCustomer();

      if (empty($alertas)) {
        $alertas = $customer->validateCurrentCustomer();

        if (empty($alertas)) {
          // * Verify if customer already exist
          Customer::setAlerta('exito', 'The Customer was successfully created');
          $alertas = Customer::getAlertas();

          // * Save customer
          $customer->guardar('cli_id');
          header("Location: /customers");
        }
      }
    }

    $router->render('customers/addCustomer', ["alertas" => $alerts, "data" => $customer]);
  }

  public static function updateCustomer(Router $router)
  {
    $customer = Customer::find('cli_id', $_GET['id']);
    $alerts = [];

    if (!$customer) {
      header('location: /customers');
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $customer->sincronizar($_POST);
      $alerts = $customer->validateCustomer();

      if (empty($alerts)) {
        // * Alert Success
        Customer::setAlerta('exito', 'Usuario Actualizado Correctamente');
        $alertas = Customer::getAlertas();

        $resultado = $customer->guardar('cli_id');

        header("Location: /customers");
      }
    }

    $router->render('customers/updateCustomer', ["alertas" => $alerts, "data" => $customer]);
  }

  public static function deleteCustomer()
  {
    $customerId = $_POST['id'];
    $invoices = Invoice::where('inv_cli_id', $customerId);
    $customer = Customer::find('cli_id', $customerId);

    if ($customer) {
      if (!$invoices) {
        $customer->eliminar('cli_id');
        $code = 1;
      } elseif ($invoices) {
        $code = 2;
      }
    }

    header("Location: /customers" . '?code=' . $code);
  }
}
