<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->get('/', 'Login::index');

//$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/login', 'Login::index');
$routes->post('login/process', 'Login::process');


$routes->group('admin', ['filter' => 'role:admin,user'], function ($routes) {
    $routes->get('dashboard', 'Dashboard::index');

    // ROUTING APARAT
    $routes->group('aparat', function ($routes) {
        $routes->get('', 'Aparat::index');
        $routes->get('get-aparat', 'Aparat::ajaxDatatable');
        $routes->get('create', 'Aparat::create'); //Form Create
        $routes->add('store', 'Aparat::store'); //Action Create
        $routes->get('edit/(:segment)', 'Aparat::edit/$1'); //Form Edit
        $routes->get('delete/(:segment)/delete', 'Aparat::delete/$1');
    });
    // END ROUTING APARAT

    // ROUTING APARAT
    $routes->group('tanah', function ($routes){
        $routes->get('','Tanah::index');
        $routes->get('get-tanah','Tanah::ajaxDatatable');
        $routes->get('create','Tanah::create'); //Form Create
        $routes->add('store','Tanah::store'); //Action Create
        $routes->get('edit/(:segment)','Tanah::edit/$1'); //Form Edit
        $routes->get('delete/(:segment)/delete', 'Tanah::delete/$1');
    });
    // END ROUTING APARAT
    // Route Keuputsan Camat

    $routes->group('keputusan-camat', function ($routes) {
        $routes->get('', 'keputusanCamat::index');
        $routes->get('get-keputusan-camat', 'keputusanCamat::ajaxDatatable');
        $routes->get('create', 'keputusanCamat::create'); //Form Create
        $routes->add('store', 'keputusanCamat::store'); //Action Create
        $routes->get('edit/(:segment)', 'keputusanCamat::edit/$1'); //Form Edit
        $routes->get('delete/(:segment)/delete', 'keputusanCamat::delete/$1');
    });
});


// Todo : akan dipakai jika sudah ditentukan
// Route Keuputsan Camat

$routes->group('admin', ['filter' => 'role:admin'], function ($routes) {
    $routes->group('users', function ($routes) {
        $routes->get('', 'User::index');
        $routes->get('getAll', 'User::ajaxDatatable');
        $routes->get('create', 'User::create'); //Form Create
        $routes->add('store', 'User::store'); //Action Create
        $routes->get('edit/(:segment)', 'User::edit/$1'); //Form Edit
        $routes->get('delete/(:segment)/delete', 'User::delete/$1');
    });

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
