<?php

session_start();
require_once 'app/init.php';

$router = new Router();

$router->add('GET', '/', 'Home', 'index');

$router->add('GET', '/registration', 'User', 'registration');
$router->add('POST', '/registration/register', 'User', 'register');

$router->add('GET', '/login', 'User', 'login');
$router->add('POST', '/login/authentication', 'User', 'authentication');

$router->add('GET', '/product', 'Product', 'index');
$router->add('POST', '/product', 'Product', 'index');
$router->add('GET', '/product/{param}', 'Product', 'index');
$router->add('GET', '/detail-product/{id}', 'Product', 'detail');

$router->add('GET', '/profile', 'User', 'profile', [Authenticaton::class]);
$router->add('GET', '/profile/{param}', 'User', 'profile', [Authenticaton::class]);
$router->add('POST', '/profile/update/{id}', 'User', 'update', [Authenticaton::class]);
$router->add('GET', '/logout', 'User', 'logout', [Authenticaton::class]);

$router->add('GET', '/cart', 'Cart', 'index', [Authenticaton::class]);
$router->add('POST', '/cart/add', 'Cart', 'add', [Authenticaton::class]);
$router->add('GET', '/cart/delete/{id}', 'Cart', 'delete', [Authenticaton::class]);

$router->add('GET', '/admin/users', 'User', 'admin', [Authenticaton::class, Authorization::class]);
$router->add('GET', '/admin/users/add', 'User', 'add', [Authenticaton::class, Authorization::class]);
$router->add('GET', '/admin/users/edit/{id}', 'User', 'edit', [Authenticaton::class, Authorization::class]);
$router->add('POST', '/admin/users/update/{id}', 'User', 'update', [Authenticaton::class, Authorization::class]);
$router->add('GET', '/admin/users/delete/{id}', 'User', 'delete', [Authenticaton::class, Authorization::class]);

$router->add('GET', '/admin/products', 'Product', 'admin', [Authenticaton::class, Authorization::class]);
$router->add('GET', '/admin/products/add', 'Product', 'add', [Authenticaton::class, Authorization::class]);
$router->add('POST', '/admin/products/add', 'Product', 'insert', [Authenticaton::class, Authorization::class]);
$router->add('GET', '/admin/products/edit/{id}', 'Product', 'edit', [Authenticaton::class, Authorization::class]);
$router->add('POST', '/admin/products/update/{id}', 'Product', 'update', [Authenticaton::class, Authorization::class]);
$router->add('GET', '/admin/products/delete/{id}', 'Product', 'delete', [Authenticaton::class, Authorization::class]);

$router->add('GET', '/admin/categories', 'Category', 'index', [Authenticaton::class, Authorization::class]);
$router->add('GET', '/admin/categories/add', 'Category', 'add', [Authenticaton::class, Authorization::class]);
$router->add('POST', '/admin/categories/add', 'Category', 'insert', [Authenticaton::class, Authorization::class]);
$router->add('GET', '/admin/categories/edit/{code}', 'Category', 'edit', [Authenticaton::class, Authorization::class]);
$router->add('POST', '/admin/categories/update/{code}', 'Category', 'update', [Authenticaton::class, Authorization::class]);
$router->add('GET', '/admin/categories/delete/{code}', 'Category', 'delete', [Authenticaton::class, Authorization::class]);

$router->add('GET', '/admin/cart', 'Cart', 'admin', [Authenticaton::class, Authorization::class]);


$router->run();