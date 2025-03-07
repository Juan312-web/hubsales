<?php

namespace Model;

class Customer extends ActiveRecord
{
  protected static $tabla = 'customers';
  protected static $columnasDB = ['cli_id', 'cli_name', 'cli_lastname', 'cli_identity', 'cli_address', 'cli_email', 'cli_phone'];

  public $cli_id;
  public $cli_name;
  public $cli_lastname;
  public $cli_identity;
  public $cli_address;
  public $cli_email;
  public $cli_phone;

  public function __construct($args = [])
  {
    $this->cli_id = $args['cli_id'] ?? null;
    $this->cli_name = $args['cli_name'] ?? '';
    $this->cli_lastname = $args['cli_lastname'] ?? '';
    $this->cli_identity = $args['cli_identity'] ?? '';
    $this->cli_address = $args['cli_address'] ?? '';
    $this->cli_email = $args['cli_email'] ?? '';
    $this->cli_phone = $args['cli_phone'] ?? '';
  }
  public function validateCustomer()
  {
    if ($this->cli_name === '') {
      self::$alertas['error'][] = 'The name is require';
    }

    if ($this->cli_lastname === '') {
      self::$alertas['error'][] = 'The lastname is require';
    }


    if ($this->cli_identity === '') {
      self::$alertas['error'][] = 'The identity is require';
    }

    if ($this->cli_address === '') {
      self::$alertas['error'][] = 'The address is require';
    }

    if ($this->cli_email === '') {
      self::$alertas['error'][] = 'The email is require';
    }

    if ($this->cli_phone === '') {
      self::$alertas['error'][] = 'The phone is require';
    }

    return self::$alertas;
  }
  public function validateCurrentCustomer()
  {
    $customer = Customer::where('cli_identity', $this->cli_identity);

    if ($customer) {
      self::$alertas['error'][] = 'The customer already exist';
    }

    return self::$alertas;
  }
}
