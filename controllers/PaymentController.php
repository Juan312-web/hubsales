<?php

namespace Controllers;

use MVC\Router;

class PaymentController
{
  public static function index(Router $router)
  {
    $router->render('payments/payments', ['title' => 'PAYMENTS', 'desc' => 'Manage yout Payments']);
  }
}
