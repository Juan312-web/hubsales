<?php

namespace Model;

class Payment extends ActiveRecord
{
  protected static $tabla = 'payments';
  protected static $columnasDB = ['pay_id', 'pay_amount', 'pay_date', 'pay_inv_id', 'pay_identity', 'pay_state'];

  public $pay_id;
  public $pay_amount;
  public $pay_date;
  public $pay_inv_id;
  public $pay_identity;
  public $pay_state;

  public function __construct($args = [])
  {
    $this->pay_id = $args['pay_id'] ?? null;
    $this->pay_amount = $args['pay_amount'] ?? '';
    $this->pay_date = $args['pay_date'] ?? '';
    $this->pay_inv_id = $args['pay_inv_id'] ?? '';
    $this->pay_identity = $args['pay_identity'] ?? '';
    $this->pay_state = $args['pay_state'] ?? '';
  }
}
