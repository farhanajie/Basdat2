<?php

use App\Controllers\Transaksi;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Routing Rak
$routes->get('rak', 'Rak::index');
$routes->get('rak/tambah', 'Rak::tambah');
$routes->post('rak/insert', 'Rak::insert');
$routes->get('rak/edit/(:num)', 'Rak::edit/$1');
$routes->post('rak/update', 'Rak::update');
$routes->get('rak/delete/(:num)','Rak::delete/$1');

// Routing Buku
$routes->get('buku', 'Buku::index');
$routes->get('buku/tambah', 'Buku::tambah');
$routes->post('buku/insert', 'Buku::insert');
$routes->get('buku/lihat/(:num)', 'Buku::lihat/$1');
$routes->get('buku/edit/(:num)', 'Buku::edit/$1');
$routes->post('buku/update', 'Buku::update');

// Routing Transaksi
$routes->get('transaksi', 'Transaksi::index');
$routes->get('transaksi/tambah', 'Transaksi::tambah');
$routes->post('transaksi/insert', 'Transaksi::insert');
$routes->get('transaksi/delete/(:num)', 'Transaksi::delete/$1');