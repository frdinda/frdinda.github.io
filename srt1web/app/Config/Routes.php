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
$routes->get('/', 'Login\Home::index');
$routes->post('/login', 'Login\Home::login');
$routes->get('/logout', 'Login\Home::logout');


$routes->get('/pegawai', 'Pegawai\Home::index');
$routes->get('/pegawai/search', 'Pegawai\Home::searchView');

$routes->get('/admin', 'Admin\Home::index');
$routes->get('/admin/search', 'Admin\Home::searchView');

$routes->get('/super', 'SuperAdmin\Home::index');
$routes->get('/super/search', 'SuperAdmin\Home::searchView');

// Kelola User
$routes->get('/mng_user', 'KelolaUser\Home::index');
$routes->get('/tambah_user', 'KelolaUser\TambahUser::index');
// $routes->post('/tambah_user/tambah', 'KelolaUser\TambahUser::tambah_user');
$routes->post('/tambah_user/getbagian', 'KelolaUser\TambahUser::getbagian');
$routes->post('/tambah_user/getsubbagian', 'KelolaUser\TambahUser::getsubbagian');
$routes->post('/tambah_user/saveusersbg', 'KelolaUser\TambahUser::saveUserSubbagian');
$routes->post('/tambah_user/saveuserkbg', 'KelolaUser\TambahUser::saveUserBagian');
$routes->post('/tambah_user/saveuserkdv', 'KelolaUser\TambahUser::saveUserDivisi');
$routes->post('/tambah_user/saveuseradm', 'KelolaUser\TambahUser::saveUserAdmin');
$routes->post('/tambah_user/saveusersupadm', 'KelolaUser\TambahUser::saveUserSuperAdmin');
$routes->post('/tambah_user/saveuserkkw', 'KelolaUser\TambahUser::saveUserKakanwil');

// Kelola Divisi
$routes->get('/div', 'Divisi\Home::index');
$routes->get('/div/tambah_div', 'Divisi\Home::TambahDiv');
$routes->post('/div/save_div', 'Divisi\Home::saveDiv');
$routes->delete('/div/hapus/(:any)', 'Divisi\Home::hapus/$1');

// Kelola Bagian
$routes->get('/bag', 'Bagian\Home::index');
$routes->get('/bag/tambah_bag', 'Bagian\Home::TambahBag');
$routes->post('/bag/save_bag', 'Bagian\Home::saveBag');
$routes->delete('/bag/hapus/(:any)', 'Bagian\Home::hapus/$1');

// Kelola Subbagian
$routes->get('/subbag', 'Subbagian\Home::index');
$routes->get('/subbag/tambah_subbag', 'Subbagian\Home::TambahSubbag');
$routes->post('/subbag/save_subbag', 'Subbagian\Home::saveSubbag');
$routes->delete('/subbag/hapus/(:any)', 'Subbagian\Home::hapus/$1');

// Kelola Akses
$routes->get('/akses', 'Akses\Home::index');
$routes->get('/akses/tambah_akses', 'Akses\Home::TambahAkses');
$routes->post('/akses/save_akses', 'Akses\Home::saveAkses');
$routes->delete('/akses/hapus/(:any)', 'Akses\Home::hapus/$1');

// Edit Password
$routes->get('/edit_password', 'EditPassword\Home::index');
$routes->post('/edit_pass/updatepass', 'EditPassword\Home::savePassword');

// Nomor
$routes->get('/nomor/hari_ini', 'Nomor\Home::hari_ini');
$routes->get('/nomor/hitung_mundur', 'Nomor\Home::hitung_mundur');
$routes->post('/nomor/hitung_mundur_input', 'Nomor\Home::hitung_mundur_input');
$routes->post('/nomor_hitung_mundur/save_nomor', 'Nomor\Home::saveNomorMundur');
$routes->get('/nomor/edit_surat/(:any)', 'Nomor\Home::edit_surat/$1');
$routes->get('/nomor/detail_revisi/(:any)', 'Nomor\DetailRevisi::index/$1');
$routes->delete('/nomor/hapus/(:any)', 'Nomor\Home::hapusSurat/$1');
$routes->post('/nomor/getsubs1', 'Nomor\Home::getMasalahSubs1');
$routes->post('/nomor/getsubs2', 'Nomor\Home::getMasalahSubs2');
$routes->post('/nomor/search', 'Nomor\Home::getSuratSearch');

// Nomor Hari Ini
$routes->post('/nomor_hari_ini/save_nomor', 'Nomor\Home::saveNomor');
$routes->get('/nomor_hari_ini/resi', 'Nomor\Home::resi');

// ALL UPDATE YANG ADA ['0']-NYA
// Update User
$routes->get('/edit_user/(:any)', 'KelolaUser\EditUser::index/$1');
$routes->delete('/edit_user/hapus/(:any)', 'KelolaUser\EditUser::hapus/$1');
$routes->post('/edit_user/updateuser', 'KelolaUser\EditUser::UpdateUser');
// Update Divisi
$routes->get('/div/(:any)', 'Divisi\Home::editDiv/$1');
$routes->post('/div/updatediv', 'Divisi\Home::UpdateDiv');
// Update Bagian
$routes->get('/bag/(:any)', 'Bagian\Home::editBag/$1');
$routes->post('/bag/updatebag', 'Bagian\Home::UpdateBag');
// Update Subbagian
$routes->get('/subbag/(:any)', 'Subbagian\Home::editSubbag/$1');
$routes->post('/subbag/updatesubbag', 'Subbagian\Home::UpdateSubbag');
// Update Subbagian
$routes->get('/akses/(:any)', 'Akses\Home::editAkses/$1');
$routes->post('/akses/updateakses', 'Akses\Home::UpdateAkses');
// Update Surat
$routes->get('/nomor/(:any)', 'Nomor\Home::edit_surat/$1');
$routes->post('/nomor/updatesurat', 'Nomor\Home::UpdateSurat');

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
