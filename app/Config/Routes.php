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
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/orderoffline/masuk', 'Admin::pesananmasuk', ['filter' => 'dontHaveSession']);
$routes->get('/orderoffline/proses/(:any)', 'Admin::cariidpesanan/$1', ['filter' => 'dontHaveSession']);
$routes->get('/orderoffline/selesai/(:any)', 'Admin::cariidpesanan/$1', ['filter' => 'dontHaveSession']);
$routes->get('/orderoffline/editpesanan/(:any)', 'Admin::editpesananview/$1', ['filter' => 'dontHaveSession']);
$routes->get('/orderoffline/tambahpesanan', 'Admin::tambahpesananview', ['filter' => 'dontHaveSession']);
$routes->get('/barangmasuk/tambahbarangmasuk', 'Admin::tambahbarangmasukview', ['filter' => 'dontHaveSession']);
$routes->get('/listbarang/editbarang/(:any)', 'Admin::editbarangview/$1', ['filter' => 'dontHaveSession']);
$routes->get('/listbarang/tambahbarang', 'Admin::tambahbarangview', ['filter' => 'dontHaveSession']);
$routes->get('/listbarang', 'Admin::listbarang', ['filter' => 'dontHaveSession']);
$routes->get('/laporan/(:any)/', 'Admin::laporan/$1');
$routes->get('/laporan', 'Admin::laporan');
$routes->get('/admindashboard', 'Admin', ['filter' => 'dontHaveSession']);
$routes->get('/orderoffline', 'Admin::orderoffline', ['filter' => 'dontHaveSession']);
$routes->get('/barangmasuk', 'Admin::barangmasuk', ['filter' => 'dontHaveSession']);
$routes->get('/logout', 'Home::logout', ['filter' => 'dontHaveSession']);
$routes->get('/pesananmasuk', 'Admin::pesananmasuk', ['filter' => 'dontHaveSession']);
$routes->get('/dashboard', 'Staff', ['filter' => 'dontHaveSession']);
$routes->get('/reset', 'Home::reset');
$routes->get('/', 'Home', ['filter' => 'haveSession']);


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
