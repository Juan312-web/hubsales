<?php

namespace Controllers;

use Model\Categorie;
use MVC\Router;

class CategorieController
{
  public static function index(Router $router)
  {
    $allCategories = Categorie::all();
    $router->render('categories/categories', ["title" => "CATEGORIES", 'desc' => "Manage your Categories", "allCategories" => $allCategories]);
  }
}
