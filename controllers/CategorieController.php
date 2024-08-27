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

  public static function addCategorie(Router $router)
  {
    $router->render('categories/addCategorie', []);
  }

  public static function search()
  {
    $value = $_GET['value'];
    $categories = Categorie::whereContains('cat_name', $value);
    echo json_encode($categories);
  }
}
