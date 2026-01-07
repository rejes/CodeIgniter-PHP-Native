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
$routes->get('/login', 'Auth/Login::index');


$routes->get('/', 'Inti/Dashboard::index', ['filter' => 'auth']);
$routes->get('/transaksi', 'Inti/Transaksi::index', ['filter' => 'auth']);
$routes->get('/getitem', 'Inti/Kasir::getitem', ['filter' => 'auth']);
$routes->get('/logout', 'Auth/Logout::index', ['filter' => 'auth']);
$routes->get('/myprofil', 'Pengaturan/Pengguna::profil_pengguna', ['filter' => 'auth']);
$routes->get('/myprofile/edit', 'Pengaturan/Pengguna::edit_profile', ['filter' => 'auth']);
$routes->get('/ubahpassword', 'Pengaturan/Pengguna::ubahpassword', ['filter' => 'auth']);
$routes->get('/kategori', 'Master/Kategori::index', ['filter' => 'auth']);
$routes->get('/Satuan', 'Master/Satuan::index', ['filter' => 'auth']);
$routes->get('/Barang', 'Master/Barang::index', ['filter' => 'auth']);
$routes->get('/Penjualan', 'Laporan/Penjualan::index', ['filter' => 'auth']);



$routes->get('/barcode', 'Master/barcode::index', ['filter' => 'auth']);
$routes->get('/Stokmasuk', 'Stok/Stokmasuk::index', ['filter' => 'auth']);
$routes->get('/Stokkeluar', 'Stok/Stokkeluar::index', ['filter' => 'auth']);
$routes->get('/stokmasuk/tambahstok', 'Stok/Stokmasuk::formtambahstok', ['filter' => 'auth']);
$routes->get('/stokkeluar/kurangstok', 'Stok/Stokkeluar::formkurangstok', ['filter' => 'auth']);
$routes->get('/Barang/Tambahbarang', 'Master/Barang::tambahbarang', ['filter' => 'auth']);
$routes->get('/Supplier', 'Master/Supplier::index', ['filter' => 'auth']);
$routes->get('/Barang/Laporanstok', 'Master/Barang::laporanstok', ['filter' => 'auth']);
$routes->get('/Barang/Cetakbarcode', 'Master/Barang::cetakbarcode', ['filter' => 'auth']);
$routes->get('/Kasir', 'Pengaturan/kasir::index', ['filter' => 'auth']);
$routes->get('/kasir/tambahkasir', 'Pengaturan/kasir::tambahkasir', ['filter' => 'auth']);


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