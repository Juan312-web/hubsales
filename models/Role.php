<?php

namespace Model;

class Role extends ActiveRecord
{
  protected static $tabla = 'roles';
  protected static $columnasDB = ['role_id', 'role_name', 'role_description'];

  public $role_id;
  public $role_name;
  public $role_description;

  public function __construct($args = [])
  {
    $this->role_id = $args['role_id'] ?? null;
    $this->role_name = $args['cat_name'] ?? '';
    $this->role_description = $args['role_description'] ?? '';
  }
}
