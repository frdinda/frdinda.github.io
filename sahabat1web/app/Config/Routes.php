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

$routes->get('/', 'Beranda\Beranda::index');


// MAGANG
$routes->get('/magang', 'IzinMagang\IzinMagang::index');
// routes untuk proses login magang
$routes->post('/20a3', 'IzinMagang\IzinMagang::login');
// beranda magang
$routes->get('/brdmg', 'IzinMagang\IzinMagang::beranda_magang');
$routes->get('/allmg', 'IzinMagang\IzinMagang::semua_magang');
$routes->get('/tblmg', 'IzinMagang\IzinMagang::table_magang');
$routes->get('/tblpnl', 'IzinMagang\IzinMagang::table_penelitian');
$routes->get('/ajkmg', 'IzinMagang\IzinMagang::form_ajukan_magang');
$routes->get('/outmg', 'IzinMagang\IzinMagang::logout');

$routes->get('/mgrgs', 'IzinMagang\IzinMagang::form_registrasi');
$routes->post('/30b3', 'IzinMagang\IzinMagang::registrasi');
$routes->get('/33b3/(:any)', 'IzinMagang\IzinMagang::verify_registrasi/$1');
$routes->get('/viewpdf/(:any)', 'IzinMagang\IzinMagang::view_pdf/$1');
$routes->get('/vmg/(:any)', 'IzinMagang\IzinMagang::form_proses_permohonan/$1');

$routes->post('/56c4', 'IzinMagang\IzinMagang::upload_file');
$routes->post('/v7r3', 'IzinMagang\IzinMagang::proses_permohonan');


// PELANTIKAN
$routes->get('/pelantikan', 'IzinPelantikan\IzinPelantikan::index');
$routes->post('/40t5', 'IzinPelantikan\IzinPelantikan::login');

$routes->get('/plnrgs', 'IzinPelantikan\IzinPelantikan::form_registrasi');
$routes->post('/7m4e', 'IzinPelantikan\IzinPelantikan::registrasi');
$routes->get('/8m4r/(:any)', 'IzinPelantikan\IzinPelantikan::verify_registrasi/$1');
$routes->get('/brdpln', 'IzinPelantikan\IzinPelantikan::beranda_pelantikan');
$routes->get('/allpln', 'IzinPelantikan\IzinPelantikan::semua_pelantikan');
$routes->get('/ajkpln', 'IzinPelantikan\IzinPelantikan::form_ajukan_pelantikan');
$routes->post('/3v7a', 'IzinPelantikan\IzinPelantikan::upload_file');

$routes->get('/tblntr', 'IzinPelantikan\IzinPelantikan::table_notaris');
$routes->get('/tblnpg', 'IzinPelantikan\IzinPelantikan::table_notaris_pengganti');
$routes->get('/tblppns', 'IzinPelantikan\IzinPelantikan::table_ppns');
$routes->get('/tblkwng', 'IzinPelantikan\IzinPelantikan::table_kewarganegaraan');

$routes->get('/vpln/(:any)', 'IzinPelantikan\IzinPelantikan::form_proses_permohonan/$1');
$routes->post('/v9y7', 'IzinPelantikan\IzinPelantikan::proses_permohonan');


$routes->get('/outpln', 'IzinPelantikan\IzinPelantikan::logout');

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
