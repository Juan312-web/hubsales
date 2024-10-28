<?php

namespace Model;

class Product extends ActiveRecord
{
  protected static $tabla = 'products';
  protected static $columnasDB = ['prod_id', 'prod_code', 'prod_name', 'prod_description', 'prod_u_price', 'prod_stock', 'prod_cat_id'];

  public $prod_id;
  public $prod_code;
  public $prod_name;
  public $prod_description;
  public $prod_u_price;
  public $prod_stock;
  public $prod_cat_id;

  public function __construct($args = [])
  {
    $this->prod_id = $args['prod_id'] ?? null;
    $this->prod_code = $args['prod_code'] ?? '';
    $this->prod_name = $args['prod_name'] ?? '';
    $this->prod_description = $args['prod_description'] ?? '';
    $this->prod_u_price = $args['prod_u_price'] ?? '';
    $this->prod_stock = $args['prod_stock'] ?? '';
    $this->prod_cat_id = $args['prod_cat_id'] ?? '';
  }

  public function validateProduct()
  {
    if ($this->prod_name === '') {
      self::$alertas['error'][] = 'The name is require';
    }

    if ($this->prod_description === '') {
      self::$alertas['error'][] = 'The description is require';
    }

    if ($this->prod_u_price === '') {
      self::$alertas['error'][] = 'The price is require';
    }

    if ($this->prod_stock === '') {
      self::$alertas['error'][] = 'The stock is require';
    }

    if ($this->prod_code === '') {
      self::$alertas['error'][] = 'The code is require';
    } elseif (strlen($this->prod_code) < 5 || strlen($this->prod_code) > 5) {
      self::$alertas['error'][] = 'The code must be 5 digits';
    }

    return self::$alertas;
  }

  public function validateCurrentProduct()
  {
    $product = Product::where('prod_code', $this->prod_code);
    if ($product) {
      self::$alertas['error'][] = 'The product code is repeated';
    }

    return self::$alertas;
  }
}
