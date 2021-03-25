<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// ADMIN
// home
// $routes->get('/admin', 'Home::login');
$routes->get('/admin', 'backend\Home', ['filter' => 'NotLogin']);

// login
$routes->group('auth', function ($routes) {
	$routes->get('/', 'backend\LoginController', ['filter' => 'IsLogin']);
	$routes->post('login', 'backend\LoginController::login');
	$routes->get('logout', 'backend\LoginController::logout');
});

// user
$routes->group('user', ['filter' => 'NotLogin'], function ($routes) {
	$routes->get('/', 'backend\userController');
	$routes->get('tambah', 'backend\userController::tambah');
	$routes->post('simpan', 'backend\userController::simpan');
	$routes->get('ganti/(:any)', 'backend\userController::ganti/$1');
	$routes->post('ubah/(:any)', 'backend\userController::ubah/$1');
	$routes->get('hapus/(:any)', 'backend\userController::hapus/$1');
});

// pesanan
$routes->group('pesanan', ['filter' => 'NotLogin'], function ($routes) {
	$routes->get('/', 'backend\PesananController');
	$routes->get('detail/(:any)', 'backend\PesananController::detail/$1');
	$routes->get('invoice', 'backend\PesananController::show_invoice');
	$routes->get('print', 'backend\PesananController::print');
});

// promo
$routes->group('admin/promo', ['filter' => 'NotLogin'], function ($routes) {
	$routes->get('/', 'backend\PromoController');
	$routes->get('tambah', 'backend\PromoController::tambah');
	$routes->post('simpan', 'backend\PromoController::simpan');
	$routes->get('detail/(:any)', 'backend\PromoController::detail/$1');
	$routes->get('edit/(:any)', 'backend\PromoController::edit/$1');
	$routes->post('ubah/(:any)', 'backend\PromoController::ubah/$1');
	$routes->get('hapus/(:any)', 'backend\PromoController::hapus/$1');
});

// PRODUK
$routes->group('admin/produk', ['filter' => 'NotLogin'], function ($routes) {
	$routes->get('/', 'backend\ProdukController');
	$routes->get('tambah', 'backend\ProdukController::tambah');
	$routes->post('simpan/', 'backend\ProdukController::simpan');
	$routes->add('ubah/(:segment)', 'backend\ProdukController::ubah/$1');
	$routes->add('edit/(:segment)', 'backend\ProdukController::edit/$1');
	$routes->add('hapus/(:any)', 'backend\ProdukController::hapus/$1');
	$routes->get('detail/(:any)', 'backend\ProdukController::detail/$1');
});

// DEPARTMENT
$routes->group('department', ['filter' => 'NotLogin'], function ($routes) {
	$routes->get('/', 'backend\DepartmentController');
	$routes->post('simpan/', 'backend\DepartmentController::simpan');
	$routes->add('hapus/(:num)', 'backend\DepartmentController::hapus/$1');
	$routes->add('ubah/(:num)', 'backend\DepartmentController::ubah/$1');
});

// FRONT END
// auth
$routes->get('/', 'Home');
$routes->get('/login', 'Auth');
$routes->post('/masuk', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
$routes->get('/daftar', 'Auth::daftar');
$routes->post('/register', 'Auth::register');

// produk
$routes->get('/detail/(:any)', 'Produk/$1');
$routes->get('/konfirmasi', 'Produk::konfirmasi');
$routes->get('/produk', 'Produk::produk');
$routes->get('/checkout', 'Produk::checkout');

// cart
$routes->get('/cart', 'Keranjang');
$routes->post('/tambah/(:any)', 'Keranjang::tambah/$1');
$routes->post('/hapus/(:any)', 'Keranjang::hapus/$1');

// buy now
$routes->group('buy', function ($routes) {
	$routes->get('/', 'BuyNowController');
});
// profil
$routes->get('/profil', 'Profil');


/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
