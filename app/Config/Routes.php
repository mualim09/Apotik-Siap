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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', function () {
	return redirect('login');
});


//Route Auth
$routes->get('/login', 'AuthController::login', ['as' => 'login']);
$routes->post('/login/login_process', 'AuthController::login_process', ['as' => 'login_process']);
$routes->post('/logout', 'AuthController::logout', ['as' => 'logout']);

//Route Dashboard
$routes->get('/dashboard', 'DashboardController::index', ['as' => 'dashboard']);



//Route Obat
$routes->get('/obat', 'ObatController::index', ['as' => 'obat.index']);
$routes->get('/obat/obat_habis', 'ObatController::obat_habis', ['as' => 'obat.obat_habis']);
$routes->get('/obat/obat_kadaluarsa', 'ObatController::obat_kadaluarsa', ['as' => 'obat.obat_kadaluarsa']);

$routes->get('/obat/create', 'ObatController::create', ['as' => 'obat.create']);
$routes->post('/obat/store', 'ObatController::store', ['as' => 'obat.store']);
$routes->post('/obat/delete/(:num)', 'ObatController::delete/$1', ['as' => 'obat.delete']);
$routes->post('/obat/update/(:num)', 'ObatController::update/$1', ['as' => 'obat.update']);
$routes->get('/obat/edit/(:num)', 'ObatController::edit/$1', ['as' => 'obat.edit']);


//Route Transaksi
$routes->get('/transaksi/beli_obat', 'TransaksiController::beli_obat', ['as' => 'transaksi.beli_obat']);
$routes->get('/transaksi/invoice/(:num)', 'TransaksiController::invoice/$1', ['as' => 'transaksi.invoice']);
$routes->post('/transaksi/add_to_cart', 'TransaksiController::add_to_cart', ['as' => 'transaksi.add_to_cart']);
$routes->get('/transaksi/penjualan', 'TransaksiController::penjualan', ['as' => 'transaksi.penjualan']);
$routes->post('/transaksi/delete_from_cart/(:num)', 'TransaksiController::delete_from_cart/$1', ['as' => 'transaksi.delete_from_cart']);
$routes->post('/transaksi/beli_obat_process', 'TransaksiController::beli_obat_process', ['as' => 'transaksi.beli_obat_process']);


//Route Laporan
$routes->get('/laporan/grafik', 'LaporanController::grafik', ['as' => 'laporan.grafik']);





/*
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
