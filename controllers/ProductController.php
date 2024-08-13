<?php

namespace Controllers;

use Model\Categorie;
use Model\Product;
use MVC\Router;

class ProductController
{
  public static function index(Router $router)
  {
    $allProducts = Product::all();
    $allCategories = Categorie::all();

    $router->render('products/products', ['title' => 'PRODUCTS', 'desc' => 'Manage Your Products', 'allProducts' => $allProducts, 'allCategories' => $allCategories]);
  }
}
