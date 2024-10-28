<?php

namespace Controllers;

use Model\Product;
use Model\Categorie;
use MVC\Router;

class ProductController
{
  public static function index(Router $router)
  {
    $allProducts = Product::all();
    $allCategories = Categorie::all();

    $router->render('products/products', ['title' => 'PRODUCTS', 'desc' => 'Manage Your Products', 'allProducts' => $allProducts, 'allCategories' => $allCategories]);
  }

  public static function addProduct(Router $router)
  {
    $alertas = [];
    $product = new Product();
    $categories = Categorie::all();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $product->sincronizar($_POST);
      $alertas = $product->validateProduct();

      if (empty($alertas)) {
        // * check if user already exists
        $alertas = $product->validateCurrentProduct();

        if (empty($alertas)) {
          // * Alert Success
          Product::setAlerta('exito', 'successfully created product');
          $alertas = Product::getAlertas();


          // * Save user
          $product->guardar('prod_id');
          header("Location: /products");
        }
      }
    }

    $router->render('products/addProduct', ['categories' => $categories, 'alertas' => $alertas, 'data' => $product]);
  }

  public static function updateProduct(Router $router)
  {

    $alertas = [];
    $categories = Categorie::all();
    $product = Product::find('prod_id',  $_GET['id']);


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $product->sincronizar($_POST);
      $alertas = $product->validateProduct();


      if (empty($alertas)) {
        // * Alert Success
        Product::setAlerta('exito', 'Usuario Actualizado Correctamente');
        $alertas = Product::getAlertas();

        // * Save user
        $resultado = $product->guardar('prod_id');

        header("Location: /products");
      }
    }

    $router->render('products/updateProduct', ['categories' => $categories, 'alertas' => $alertas, 'data' => $product]);
  }

  public static function deleteProduct()
  {
    $productId = $_POST['id'];
    $product = Product::find('prod_id', $productId);
    $product->eliminar('prod_id');

    header("Location: " . $_SERVER['HTTP_REFERER']);
  }

  public static function search()
  {
    $value = $_GET['value'];
    $products = Product::whereContains('prod_code', $value);

    echo json_encode($products);
  }
}
