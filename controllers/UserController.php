<?php

namespace Controllers;

use Model\Role;
use Model\User;
use MVC\Router;

class UserController
{
  public static function index(Router $router)
  {
    $allUsers = User::all('user_id');
    $router->render("users/users", ['title' => 'USERS', 'desc' => 'Manage Your Users', 'allUsers' =>  $allUsers]);
  }

  public static function addUser(Router $router)
  {
    $alertas = [];
    $user = new User();
    $roles = Role::all();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $user->sincronizar($_POST);
      $alertas = $user->validateUser();

      if (empty($alertas)) {
        // * check if user already exists
        $alertas = $user->validateCurrentUser();

        if (empty($alertas)) {
          // * Alert Success
          User::setAlerta('exito', 'Usuario Creado Correctamente');
          $alertas = User::getAlertas();

          // * Hash Password
          $current = $user->user_password;
          $user->user_password = password_hash($current, PASSWORD_BCRYPT);

          // * Save user
          $user->guardar('user_id');
          header("Location: /users");
        }
      }
    }

    $router->render('users/addUser', ['roles' => $roles, 'alertas' => $alertas, 'data' => $user]);
  }

  public static function updateUser(Router $router)
  {
    $alertas = [];
    $roles = Role::all();
    $user = User::find('user_id', $_GET['id']);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $user->sincronizar($_POST);
      $alertas = $user->validateUser('update');


      if (empty($alertas)) {
        // * Alert Success
        User::setAlerta('exito', 'Usuario Actualizado Correctamente');
        $alertas = User::getAlertas();

        // * Hash Password
        $current = $user->user_password;
        $user->user_password = password_hash($current, PASSWORD_BCRYPT);

        // * INTVAL to role
        $user->user_role = intval($user->user_role);

        // * Save user
        $resultado = $user->guardar('user_id');

        header("Location: /users");
      }
    }

    $router->render('users/updateUser', ['roles' => $roles, 'alertas' => $alertas, 'data' => $user]);
  }

  public static function deleteUser()
  {
    $userId = $_POST['id'];
    $user = User::find('user_id', $userId);
    $user->eliminar('user_id');

    header("Location: " . $_SERVER['HTTP_REFERER']);
  }

  public static function search()
  {
    $value = $_GET['value'];
    $users = User::whereContains('user_email', $value);

    echo json_encode($users);
  }
}
