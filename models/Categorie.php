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
}
