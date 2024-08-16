<?php

namespace Controllers;

use Model\User;
use MVC\Router;

class UserController
{
  public static function index(Router $router)
  {
    $allUsers = User::all();
    $router->render("users/users", ['title' => 'USERS', 'desc' => 'Manage Your Users', 'allUsers' =>  $allUsers]);
  }

  public static function addUser(Router $router)
  {
    $router->render('users/addUser');
  }
}
