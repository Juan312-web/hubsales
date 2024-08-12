<?php

namespace Model;

class Products extends ActiveRecord
{
  protected static $tabla = 'products';
  protected static $columnasDB = ['prod_id', 'prod_name', 'prod_description', 'prod_u_price', 'prod_stock', 'prod_cat_id'];

  public $prod_id;
  public $prod_name;
  public $prod_description;
  public $prod_u_price;
  public $prod_stock;
  public $prod_cat_id;

  public function __construct($args = [])
  {
    $this->prod_id = args['prod_id'] ?? null;
    $this->prod_name = args['prod_name'] ?? '';
    $this->prod_description = args['prod_description'] ?? '';
    $this->prod_u_price = args['prod_u_price'] ?? '';
    $this->prod_stock = args['prod_stock'] ?? '';
    $this->prod_cat_id = args['prod_cat_id'] ?? '';
  }
}
