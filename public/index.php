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


// * Products
$router->get('/products', [ProductController::class, 'index']);
$router->post('/products', [ProductController::class, 'index']);


//= Products Add
$router->get('/products-add', [ProductController::class, 'addProduct']);
$router->post('/products-add', [ProductController::class, 'addProduct']);

//= Products Update
$router->get('/products-update', [ProductController::class, 'updateProduct']);
$router->post('/products-update', [ProductController::class, 'updateProduct']);

//= Products Delete
$router->post('/products-delete', [ProductController::class, 'deleteProduct']);


// * Customers
$router->get('/customers', [CustomerController::class, 'index']);
$router->post('/customers', [CustomerController::class, 'index']);


//= Customers Add
$router->get('/customers-add', [CustomerController::class, 'addCustomer']);
$router->post('/customers-add', [CustomerController::class, 'addCustomer']);

//= Customers Update
$router->get('/customers-update', [CustomerController::class, 'updateCustomer']);
$router->post('/customers-update', [CustomerController::class, 'updateCustomer']);

//= Customers Delete
$router->post('/customers-delete', [CustomerController::class, 'deleteCustomer']);


// * Invoices
$router->get('/invoices', [InvoiceController::class, 'index']);
$router->post('/invoices', [InvoiceController::class, 'index']);

//= Invoices Add
$router->get('/invoices-add', [InvoiceController::class, 'addInvoice']);
$router->post('/invoices-add', [InvoiceController::class, 'addInvoice']);

//= Invoices Download
$router->get('/invoices-view', [InvoiceController::class, 'viewInvoice']);

//= Invoices Download
$router->get('/invoices-download', [InvoiceController::class, 'invoicePDF']);

//= Invoices Delete
$router->post('/invoices-delete', [InvoiceController::class, 'deleteInvoice']);


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
