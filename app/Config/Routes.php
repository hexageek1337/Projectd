<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
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

/**
* Pages Routes
*/
$routes->get('/', 'Home::index');
// Projectd
$routes->get('/projectd', 'Admin::index');
$routes->get('/projectd/add', 'Admin::tambah');
$routes->get('/projectd/detail/(:alphanum)', 'Admin::detail/$1');
// Safelink
$routes->get('/(:alphanum)', 'Safelink::goLink/$1');
$routes->get('/go/(:alphanum)', 'Safelink::goLink/$1');
$routes->get('/link', 'Safelink::index');
$routes->get('/link/add', 'Safelink::tambah');
$routes->get('/link/detail/(:num)', 'Safelink::detail/$1');

/**
* Action Routes
*/
$routes->post('/login', 'Admin::login');
$routes->get('/logout', 'Admin::logout');
$routes->post('/kontak', 'Home::contact');
// Projectd
$routes->post('/projectd/save', 'Admin::simpan');
$routes->post('/projectd/update', 'Admin::ubah');
$routes->get('/projectd/delete/(:alphanum)', 'Admin::hapus/$1');
// Safelink
$routes->post('/link/save', 'Safelink::simpan');
$routes->post('/link/update', 'Safelink::ubah');
$routes->get('/link/delete/(:num)', 'Safelink::hapus/$1');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
