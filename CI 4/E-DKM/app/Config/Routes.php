<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override(function() {
    return view('errors/error-404.php');
});
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Pages::index');
$routes->get('/pengurus', 'Pages::pengurus');
$routes->get('/sumbangan', 'Pages::sumbangan');
$routes->post('/sumbangan', 'Pages::saveSumbangan');
$routes->get('/galeri', 'Pages::galeri');
$routes->get('/galeri/(:any)', 'Pages::galeriByKategori/$1');
$routes->get('/kontak', 'Pages::kontak');
$routes->get('/profile', 'Pages::profile');

$routes->get('/admin', 'Auth::index');
$routes->post('/admin/process', 'Auth::process');
$routes->get('/admin/lupa-password', 'Auth::lupaPassword');
$routes->post('/admin/lupa-password', 'Auth::postLupaPassword');
$routes->get('/admin/reset-password', 'Auth::resetPassword');
$routes->post('/admin/reset-password/(:any)', 'Auth::postResetPassword/$1');
$routes->get('/logout', 'Auth::logout', ['filter' => 'auth']);

// Dashboard
$routes->group('dashboard', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Dashboard::index');
    $routes->get('admin', 'Admin::index');
    $routes->delete('admin/delete', 'Admin::delete');
    $routes->get('admin/create', 'Admin::create');
    $routes->post('admin/security-add', 'Admin::security_add');
    $routes->post('admin/save', 'Admin::save');
    $routes->get('admin/edit/(:any)', 'Admin::edit/$1');
    $routes->post('admin/update/(:num)', 'Admin::update/$1');
    $routes->get('admin/edit-profile', 'Admin::editProfile');
    $routes->post('admin/edit-profile/(:num)', 'Admin::updateProfile/$1');
    $routes->get('change-password', 'Admin::changePassword');
    $routes->post('change-password', 'Admin::savePassword');
    
    $routes->get('pengurus', 'Pengurus::index');
    $routes->get('pengurus/(:num)', 'Pengurus::detail/$1');
    $routes->get('pengurus/tambah-pengurus', 'Pengurus::create');
    $routes->post('pengurus/save', 'Pengurus::save');
    $routes->delete('pengurus/(:num)', 'Pengurus::delete/$1');
    $routes->get('pengurus/edit/(:num)', 'Pengurus::edit/$1');
    $routes->put('pengurus/(:num)', 'Pengurus::update/$1');
    $routes->get('pengurus/pdf', 'Pengurus::generatePDF');
    
    $routes->get('sumbangan', 'SumbanganDashboard::index');
    $routes->delete('sumbangan/(:num)', 'SumbanganDashboard::delete/$1');
    
    $routes->get('galeri', 'Galeri::index');
    $routes->get('galeri/create', 'Galeri::create');
    $routes->post('galeri/save', 'Galeri::save');
    $routes->delete('galeri/(:num)', 'Galeri::delete/$1');

    $routes->get('kategori-foto', 'KategoriFoto::index');
    $routes->get('kategori-foto/tambah', 'KategoriFoto::create');
    $routes->post('kategori-foto/save', 'KategoriFoto::save');
    $routes->get('kategori-foto/(:num)', 'KategoriFoto::edit/$1');
    $routes->post('kategori-foto/(:num)', 'KategoriFoto::update/$1');
    $routes->delete('kategori-foto/(:num)', 'KategoriFoto::delete/$1');
    
    $routes->get('laporan-keuangan', 'LaporanKeuangan::index');
    $routes->get('laporan-keuangan/tambah-laporan', 'LaporanKeuangan::create');
    $routes->post('laporan-keuangan/save', 'LaporanKeuangan::save');
    $routes->delete('laporan-keuangan/(:num)', 'LaporanKeuangan::delete/$1');    
});
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
