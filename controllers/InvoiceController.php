<?php

namespace Controllers;

use MVC\Router;

class InvoiceController
{
  public static function index(Router $router)
  {
    $router->render('invoices/invoices', ['title' => 'INVOICES', 'desc' => 'Manage yout Invoices']);
  }
}
