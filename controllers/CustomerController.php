<?php

namespace Controllers;

use Model\Customer;
use MVC\Router;

class CustomerController
{
  public static function index(Router $router)
  {
    $allCustomers = Customer::all();
    $router->render('customers/customers', ['title' => 'CUSTOMERS', 'desc' => 'Manage Your Customers', 'allCustomers' => $allCustomers]);
  }
}
