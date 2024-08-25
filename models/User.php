<?php

namespace Model;

class User extends ActiveRecord
{
  protected static $tabla = 'users';
  protected static $columnasDB = ['user_id', 'user_name', 'user_lastname', 'user_role', 'user_email', 'user_password'];

  public $user_id;
  public $user_name;
  public $user_lastname;
  public $user_role;
  public $user_email;
  public $user_password;

  public function __construct($args = [])
  {
    $this->user_id = $args['user_id'] ?? null;
    $this->user_name = $args['user_name'] ?? '';
    $this->user_lastname = $args['user_lastname'] ?? '';
    $this->user_role = $args['user_role'] ?? '';
    $this->user_email = $args['user_email'] ?? '';
    $this->user_password = $args['user_password'] ?? '';
  }

  public function validateUser($state = '')
  {
    if ($this->user_name === '') {
      self::$alertas['error'][] = 'Name Is Required';
    }

    if ($this->user_lastname === '') {
      self::$alertas['error'][] = 'Lastname Is Required';
    }

    if ($this->user_role === '' || !$this->user_role) {
      self::$alertas['error'][] = 'Select a Role';
    }

    if ($this->user_email === '') {
      self::$alertas['error'][] = 'Email Is Required';
    }

    if (!$state) {
      if ($this->user_password === '') {
        self::$alertas['error'][] = 'Password Is Required';
      } else if (strlen($this->user_password) < 8) {
        self::$alertas['error'][] = 'Password Must Be Longer Than 8 Characters';
      }
    }


    return self::$alertas;
  }

  public function validateCurrentUser()
  {
    $currentUser = $this->where('user_email', $this->user_email);
    if ($currentUser) {
      self::$alertas['error'][] = 'Usuario ya existente';
    }

    return self::$alertas;
  }
}
