<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Tahap Develop (Hapus jika sudah production)
// $routes->setAutoRoute(true); 
// $routes->get('home/(:any)', 'Home::$1');
// End Tahap Develop

$routes->get('/', 'User::index');

$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/(:num)', 'Admin::detail/$1', ['filter' => 'role:admin']);




// $routes->get('/login', 'Home::index');
// $routes->get('/register', 'Home::register');

