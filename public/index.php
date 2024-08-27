<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\CategorieController;
use Controllers\CustomerController;
use Controllers\GeneralController;
use Controllers\InvoiceController;
use Controllers\LoginController;
use Controllers\PaymentController;
use Controllers\ProductController;
use Controllers\UserController;
use MVC\Router;

$router = new Router();

// ? Inicio ------------------------------------------------------------------------------


// Paginas secundarias
$router->get('/not-found', [InitController::class, 'notFound']);
$router->get('/confirmaciones', [InitController::class, 'confirmaciones']);


// ? Auth ------------------------------------------------------------------------------
$router->get('/login', [LoginController::class, 'index']);
$router->post('/login', [LoginController::class, 'index']);

// Logout
$router->post('/logout', [LoginController::class, 'logout']);

// Crear Cuenta
$router->get('/create-account', [LoginController::class, 'createAccount']);
$router->post('/create-account', [LoginController::class, 'createAccount']);

// Olvide Contraseña
$router->get('/forgot-password', [LoginController::class, 'forgotPassword']);
$router->post('/forgot-password', [LoginController::class, 'forgotPassword']);

// Recuperar Cuenta
$router->get('/recovery-password', [LoginController::class, 'recoveryPassword']);
$router->post('/recovery-password', [LoginController::class, 'recoveryPassword']);

// Confirmacion de cuenta
$router->get('/message', [LoginController::class, 'message']);
$router->get('/confirm', [LoginController::class, 'confirm']);


// ? Dashboard ------------------------------------------------------------------------------

// * General
$router->get('/general', [GeneralController::class, 'index']);
$router->post('/general', [GeneralController::class, 'index']);

// * Users
$router->get('/users', [UserController::class, 'index']);
$router->post('/users', [UserController::class, 'index']);

//= Users Add
$router->get('/users-add', [UserController::class, 'addUser']);
$router->post('/users-add', [UserController::class, 'addUser']);

//= Users Update
$router->get('/users-update', [UserController::class, 'updateUser']);
$router->post('/users-update', [UserController::class, 'updateUser']);

//= Users Delete
$router->post('/users-delete', [UserController::class, 'deleteUser']);

// * Products
$router->get('/products', [ProductController::class, 'index']);
$router->post('/products', [ProductController::class, 'index']);

// * Customers
$router->get('/customers', [CustomerController::class, 'index']);
$router->post('/customers', [CustomerController::class, 'index']);

// * Categories
$router->get('/categories', [CategorieController::class, 'index']);
$router->post('/categories', [CategorieController::class, 'index']);


//= Categories Add
$router->get('/categories-add', [CategorieController::class, 'addCategorie']);
$router->post('/categories-add', [CategorieController::class, 'addCategorie']);

//= Categories Update
$router->get('/categories-update', [CategorieController::class, 'updateCategorie']);
$router->post('/categories-update', [CategorieController::class, 'updateCategorie']);

//= Categories Delete
$router->post('/categories-delete', [CategorieController::class, 'deleteCategorie']);


// * Invoices
$router->get('/invoices', [InvoiceController::class, 'index']);
$router->post('/invoices', [InvoiceController::class, 'index']);

// * Payments
$router->get('/payments', [PaymentController::class, 'index']);
$router->post('/payments', [PaymentController::class, 'index']);

// ? ----------------------------------------------------------------------------------------

// ? API ------------------------------------------------------------------------------------

// * Search
$router->get('/api/users', [UserController::class, 'search']);
$router->get('/api/products', [ProductController::class, 'search']);
$router->get('/api/categories', [CategorieController::class, 'search']);
$router->get('/api/customers', [CustomerController::class, 'search']);
$router->get('/api/invoices', [InvoiceController::class, 'search']);
$router->get('/api/payments', [PaymentController::class, 'search']);

// ? ----------------------------------------------------------------------------------------



// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
