<?php

namespace Controllers;

use MVC\Router;

class CustomerController
{
  public static function index(Router $router)
  {
    $router->render('customers/customers', ['title' => 'CUSTOMERS', 'desc' => 'Manage Your Customers']);
  }
}
