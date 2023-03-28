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
// $routes->get('/helloworld', 'helloworld::index');

$routes->get('/mahasiswa', 'CMahasiswa::index');
$routes->get('/CMahasiswa', 'CMahasiswa::index');
$routes->post('/mahasiswa/add', 'CMahasiswa::add');
$routes->post('/mahasiswa/hapus', 'CMahasiswa::hapus');
$routes->get('/VDetailMhs/(:segment)', 'CMahasiswa::detail/$1');

//TEMPLATE PRIMITF
// $routes->get('/home', 'CHome::index'); // untuk menampilkan data
// $routes->get('/info', 'CInfo::index'); // untuk menampilkan data
$routes->post('/mahasiswa', 'CMahasiswa::display'); // untuk menampilkan data
$routes->get('/mahasiswa', 'CMahasiswa::add'); // untuk menampilkan data
$routes->get('/mahasiswa', 'CMahasiswa::update'); // untuk menampilkan data
$routes->get('/mahasiswa/hapus', 'CMahasiswa::hapus');

//setelah login
$routes->get('/home' , 'CHome::index', ['filter' => 'auth']);
$routes->get('/info' , 'CInfo::index', ['filter' => 'auth']);

$routes->get('/', 'CHome::index',['filter' => 'auth']);
$routes->get('/', 'CInfo::index',['filter' => 'auth']); 

//LOGIN
$routes->get('/login', 'CLogin::index');
$routes->get('/logout', 'CLogin::logout');
$routes->post('login/auth', 'CLogin::auth');

//REGISTER
$routes->get('/logout', 'CRegister::logout');
// $routes->get('/login', 'CLogin::index');
// $routes->post('/', 'CLogin::index');
$routes->get('/logout', 'CLogin::logout');
$routes->post('/register', 'CRegister::auth');
$routes->post('/register/save', 'CRegister::save');
$routes->get('/register', 'CRegister::save');

//ADD MAHASISWA
$routes->get('/mahasiswa/add', 'CMahasiswa::addMhs');
$routes->post('/mahasiswa/store', 'CMahasiswa::store');

//SEARCH
$routes->post('/mahasiswa/search', 'CMahasiswa::search');

//EDIT DAN UPDATE
$routes->get('/mahasiswa/edit/(:segment)', 'CMahasiswa::edit/$1', ['filter' => 'auth']);
$routes->post('/mahasiswa/update', 'CMahasiswa::update');

//ROUTE PEGAWAI
$routes->get('/pegawai', 'CPegawai::index',['filter' => 'auth']); // untuk menampilkan data
$routes->get('/pegawai/add', 'CPegawai::add',['filter' => 'auth']); // untuk menambahkan data
$routes->post('/pegawai/save', 'CPegawai::save'); // untuk menyimpan data
$routes->get('/pegawai/(:segment)', 'CPegawai::detail/$1',['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->get('/pegawai/editMahasiswa/(:segment)', 'CPegawai::editMahasiswa/$1',['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/pegawai/update', 'CPegawai::update'); // untuk mengupdate data
$routes->get('/pegawai/delete/(:segment)', 'CPegawai::delete/$1',['filter' => 'auth']); // (:segment) = parameter, $1 = parameter pertama yang di ambil
$routes->post('/pegawai/search', 'CPegawai::search'); // untuk mencari data pegawai berdasarkan nama

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
