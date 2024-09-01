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
    $categorie = new Categorie();
    $alerts = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $categorie->sincronizar($_POST);
      $alerts = $categorie->validateCategorie();

      if (empty($alerts)) {
        $categorie->guardar('cat_id');
        header('location: /categories');
      }
    }

    $router->render('categories/addCategorie', ["alertas" => $alerts, "data" => $categorie]);
  }

  public static function updateCategorie(Router $router)
  {

    $idCategorie = $_GET['id'];
    $newCategorie = new Categorie();
    $currentCategorie = Categorie::where('cat_id', $idCategorie);
    $alerts = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $currentCategorie->sincronizar($_POST);
      $alerts = $currentCategorie->validateCategorie();

      if (empty($alerts)) {
        $currentCategorie->guardar('cat_id');
        header('location: /categories');
      }
    }

    $router->render('categories/updateCategorie', ["alertas" => $alerts, "data" => $currentCategorie]);
  }
  public static function deleteCategorie()
  {
    $categorieId = $_POST['id'];
    $categorie = Categorie::find('cat_id', $categorieId);
    $categorie->eliminar('cat_id');

    header("Location: " . $_SERVER['HTTP_REFERER']);
  }

  public static function search()
  {
    $value = $_GET['value'];
    $categories = Categorie::whereContains('cat_name', $value);
    echo json_encode($categories);
  }
}
