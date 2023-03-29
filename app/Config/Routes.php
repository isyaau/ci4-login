<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);

// Data Akun 
$routes->get('/data-akun', 'DataAkun::index', ['filter' => 'auth']);
$routes->post('/data-akun/save', 'DataAkun::save', ['filter' => 'auth']);
$routes->delete('/data-akun/(:num)', 'DataAkun::delete/$1', ['filter' => 'auth']);
$routes->get('/data-akun/edit/(:num)', 'DataAkun::edit/$1', ['filter' => 'auth']);
$routes->post('/data-akun/update/(:num)', 'DataAkun::update/$1', ['filter' => 'auth']);
$routes->get('/data-akun/detail/(:num)', 'DataAkun::detail/$1', ['filter' => 'auth']);

$routes->get('/', 'Login::index');
$routes->get('/logout', 'Login::logout');
$routes->get('/register', 'Register::index');
$routes->post('/register/save', 'Register::save');
$routes->post('/login/auth', 'Login::auth');

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
