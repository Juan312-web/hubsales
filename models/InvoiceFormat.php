<?php

namespace Model;

class InvoiceFormat
{

  public $identity;
  public $cli_name;
  public $user_name;
  public $date_exp;

  public function __construct($args = [])
  {
    $this->identity = $args['identity'] ?? '';
    $this->cli_name = $args['cli_name'] ?? '';
    $this->user_name = $args['user_name'] ?? '';
    $this->date_exp = $args['date_exp'] ?? '';
  }
}
