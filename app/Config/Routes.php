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
$routes->get('/', 'Home::index');

$routes->get('marque', 'MarqueController::index');
$routes->get('marque/(:num)', 'MarqueController::show/$1');
$routes->post('marque', 'MarqueController::create');
$routes->post('marque/(:num)', 'MarqueController::update/$1');
$routes->put('marque/(:num)', 'MarqueController::update/$1');
$routes->delete('marque/(:num)', 'MarqueController::delete/$1');

$routes->get('categorie', 'CategorieController::index');
$routes->get('categorie/(:num)', 'CategorieController::show/$1');
$routes->post('categorie', 'CategorieController::create');
$routes->post('categorie/(:num)', 'CategorieController::update/$1');
$routes->put('categorie/(:num)', 'CategorieController::update/$1');
$routes->delete('categorie/(:num)', 'CategorieController::delete/$1');

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
