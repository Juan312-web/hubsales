<?php

namespace Model;

class InvoiceFormat
{

  public $identity;
  public $cli_name;
  public $date_exp;
  public $date;
  public $subtotal;

  public function __construct($args = [])
  {
    $this->identity = $args['identity'] ?? '';
    $this->cli_name = $args['cli_name'] ?? '';
    $this->date_exp = $args['date_exp'] ?? '';
    $this->date = $args['date'] ?? '';
    $this->subtotal = $args['subtotal'] ?? '';
  }
}
