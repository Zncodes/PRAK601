<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::login');
$routes->get('/register', 'Auth::register');
$routes->post('/auth/store', 'Auth::store');
$routes->get('/login', 'Auth::login');
$routes->post('/auth/loginAuth', 'Auth::loginAuth');
$routes->get('/logout', 'Auth::logout');

$routes->get('/dashboard', 'Buku::index', ['filter' => 'auth']);
$routes->get('/buku', 'Buku::index', ['filter' => 'auth']);
$routes->get('/buku/create', 'Buku::create', ['filter' => 'auth']);
$routes->post('/buku/store', 'Buku::store', ['filter' => 'auth']);
$routes->get('/buku/edit/(:num)', 'Buku::edit/$1', ['filter' => 'auth']);
$routes->post('/buku/update/(:num)', 'Buku::update/$1', ['filter' => 'auth']);
$routes->get('/buku/delete/(:num)', 'Buku::delete/$1', ['filter' => 'auth']);

