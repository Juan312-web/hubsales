<?php

namespace Model;

class InvoicesDetails extends ActiveRecord
{
  protected static $tabla = 'invoice_details';
  protected static $columnasDB = ['det_id', 'det_subtotal', 'det_amount', 'det_fac_id', 'det_prod_id'];

  public $det_id;
  public $det_subtotal;
  public $det_amount;
  public $det_fac_id;
  public $det_prod_id;

  public function __construct($args = [])
  {
    $this->det_id = args['det_id'] ?? null;
    $this->det_subtotal = args['det_subtotal'] ?? '';
    $this->det_amount = args['det_amount'] ?? '';
    $this->det_fac_id = args['det_fac_id'] ?? '';
    $this->det_prod_id = args['det_prod_id'] ?? '';
  }
}
