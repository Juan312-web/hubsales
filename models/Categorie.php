<?php

namespace Model;

class Categorie extends ActiveRecord
{
  protected static $tabla = 'productcategories';
  protected static $columnasDB = ['cat_id', 'cat_name', 'cat_description'];

  public $cat_id;
  public $cat_name;
  public $cat_description;

  public function __construct($args = [])
  {
    $this->cat_id = $args['cat_id'] ?? null;
    $this->cat_name = $args['cat_name'] ?? '';
    $this->cat_description = $args['cat_description'] ?? '';
  }

  public function validateCategorie()
  {
    if ($this->cat_name === '') {
      self::$alertas['error'][] = "The name is require";
    }

    if ($this->cat_description === '') {
      self::$alertas['error'][] = "The description is require";
    }

    if (strlen($this->cat_description) > 60) {
      self::$alertas['error'][] = "The description can only contain 100 characters";
    }

    return self::$alertas;
  }
}
