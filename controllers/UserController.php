<?php

namespace Controllers;

use MVC\Router;

class UserController
{
  public static function index(Router $router)
  {
    $router->render("users/users", ['title' => 'USERS', 'desc' => 'Manage Your Users']);
  }
}
