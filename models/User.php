<?php

namespace Model;

class User extends ActiveRecord
{
  protected static $tabla = 'users';
  protected static $columnasDB = ['user_id', 'user_name', 'user_lastname', 'user_role', 'user_email', 'user_password', 'token', 'confirm'];

  public $user_id;
  public $user_name;
  public $user_lastname;
  public $user_role;
  public $user_email;
  public $user_password;
  public $token;
  public $confirm;

  public function __construct($args = [])
  {
    $this->user_id = $args['user_id'] ?? '';
    $this->user_name = $args['user_name'] ?? '';
    $this->user_lastname = $args['user_lastname'] ?? '';
    $this->user_role = $args['user_role'] ?? '';
    $this->user_email = $args['user_email'] ?? '';
    $this->user_password = $args['user_password'] ?? '';
    $this->token = $args['token'] ?? '';
    $this->confirm = $args['confirm'] ?? '';
  }
}
