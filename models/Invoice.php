<?php

namespace Model;

class Invoice extends ActiveRecord
{
  protected static $tabla = 'invoices';
  protected static $columnasDB = ['inv_id', 'inv_date', 'inv_date_exp', 'inv_cli_id', 'inv_user_id', 'inv_identity'];

  public $inv_id;
  public $inv_date;
  public $inv_date_exp;
  public $inv_cli_id;
  public $inv_user_id;
  public $inv_identity;

  public function __construct($args = [])
  {
    $this->inv_id = $args['inv_id'] ?? null;
    $this->inv_date = $args['inv_date'] ?? '';
    $this->inv_date_exp = $args['inv_date_exp'] ?? '';
    $this->inv_cli_id = $args['inv_cli_id'] ?? '';
    $this->inv_user_id = $args['inv_user_id'] ?? '';
    $this->inv_identity = $args['inv_identity'] ?? '';
  }
}
