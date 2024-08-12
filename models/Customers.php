<?php

namespace Model;

class Cutstomer extends ActiveRecord
{
  protected static $tabla = 'customers';
  protected static $columnasDB = ['cli_id', 'cli_name', 'cli_lastname', 'cli_identify', 'cli_address', 'cli_email', 'cli_phone'];

  public $cli_id;
  public $cli_name;
  public $cli_lastname;
  public $cli_identify;
  public $cli_address;
  public $cli_email;
  public $cli_phone;

  public function __construct($args = [])
  {
    $this->cli_id = args['cli_id'] ?? null;
    $this->cli_name = args['cli_name'] ?? '';
    $this->cli_lastname = args['cli_lastname'] ?? '';
    $this->cli_identify = args['cli_identify'] ?? '';
    $this->cli_address = args['cli_address'] ?? '';
    $this->cli_email = args['cli_email'] ?? '';
    $this->cli_phone = args['cli_phone'] ?? '';
  }
}
