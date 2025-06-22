<?php

namespace Config;

$routes = Services::routes();
$routes->setDefaultNamespace('App\Controllers');
// Controller default yang dipanggil pertama kali saat aplikasi dijalankan
$routes->setDefaultController('Dashboard');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

// Routing URL Controller Dashboard
$routes->get('/', 'Dashboard::index');
$routes->get('dashboard', 'Dashboard::index');
$routes->get('getdata', 'Dashboard::getData');
$routes->get('dashboard_aoc', 'Dashboard::aoc');
$routes->get('getdatakecamatan', 'Dashboard::getDataKecamatan');
$routes->get('getdatakerawanan', 'Dashboard::getDataKerawanan');

// Routing URL Controller Kecamatan
$routes->get('kecamatan', 'Kecamatan::index');
$routes->get('tambahkecamatan', 'Kecamatan::tambah');
$routes->get('editkecamatan/(:any)', 'Kecamatan::edit/$1');
$routes->get('hapuskecamatan/(:any)', 'Kecamatan::hapus/$1');
$routes->post('simpankecamatan', 'Kecamatan::simpan');
$routes->post('updatekecamatan', 'Kecamatan::update');

// Routing URL Controller Data
$routes->get('ungkapkasus', 'Ungkapkasus::tampil');
$routes->get('data/tambah', 'DataController::tambah');
$routes->post('data/simpan', 'DataController::simpan');
$routes->get('data/edit/(:num)', 'DataController::edit/$1');
$routes->post('data/update', 'DataController::update');
$routes->get('data/hapus/(:num)', 'DataController::hapus/$1');

// Routing URL Controller Ungkap Kasus
$routes->get('ungkapkasus', 'Ungkapkasus::index');
$routes->get('ungkapkasus/tambah', 'Ungkapkasus::tambah');
$routes->post('ungkapkasus/simpan', 'Ungkapkasus::simpan');
$routes->get('ungkapkasus/edit/(:any)', 'Ungkapkasus::edit/$1');
$routes->post('ungkapkasus/update/(:any)', 'Ungkapkasus::update/$1');
$routes->get('ungkapkasus/hapus/(:any)', 'Ungkapkasus::hapus/$1');

// Routing URL Controller Kelurahan
$routes->get('kelurahan', 'Kelurahan::index'); // Menampilkan data kelurahan
$routes->get('kelurahan/tambah', 'Kelurahan::tambah'); // Form tambah kelurahan
$routes->post('kelurahan/simpan', 'Kelurahan::simpan'); // Menyimpan data kelurahan baru
$routes->get('kelurahan/edit/(:any)', 'Kelurahan::edit/$1'); // Form edit kelurahan
$routes->post('kelurahan/update/(:any)', 'Kelurahan::update/$1'); // Update data kelurahan
$routes->get('kelurahan/hapus/(:any)', 'Kelurahan::hapus/$1'); // Menghapus kelurahan


// Routing URL Controller Penggiat
$routes->get('penggiat', 'Penggiat::index'); // Menampilkan data penggiat
$routes->get('penggiat/tambah', 'Penggiat::tambah'); // Form tambah penggiat
$routes->post('penggiat/simpan', 'Penggiat::simpan'); // Menyimpan data penggiat
$routes->get('penggiat/edit/(:any)', 'Penggiat::edit/$1'); // Form edit penggiat
$routes->post('penggiat/update/(:any)', 'Penggiat::update/$1'); // Update data penggiat
$routes->get('penggiat/hapus/(:any)', 'Penggiat::hapus/$1'); // Menghapus penggiat


// Routing URL Controller CLient Rehabilitasi
$routes->get('clientrehabilitasi', 'ClientRehabilitasi::');
$routes->get('tambahclientrehabilitasi', 'ClientRehabilitasi::tambah');
$routes->post('clientrehabilitasi/simpan', 'ClientRehabilitasi::simpan');
$routes->get('clientrehabilitasi/edit/(:any)', 'ClientRehabilitasi::edit/$1');
$routes->post('clientrehabilitasi/update/(:any)', 'ClientRehabilitasi::update/$1');
$routes->get('clientrehabilitasi/hapus/(:any)', 'ClientRehabilitasi::hapus/$1');

// Routing URL Controller Agen Pemulihan
$routes->get('agenpemulihan', 'AgenPemulihan::index');
$routes->get('agenpemulihan/tambah', 'AgenPemulihan::tambah');
$routes->post('agenpemulihan/simpan', 'AgenPemulihan::simpan');
$routes->get('agenpemulihan/edit/(:any)', 'AgenPemulihan::edit/$1');
$routes->post('agenpemulihan/update/(:any)', 'AgenPemulihan::update/$1');
$routes->get('agenpemulihan/hapus/(:any)', 'AgenPemulihan::hapus/$1');

$routes->get('/kabupaten', 'Kabupaten::index');                  // Menampilkan daftar kabupaten
$routes->get('/kabupaten/tambah', 'Kabupaten::tambah');           // Menampilkan form tambah kabupaten
$routes->post('/kabupaten/simpan', 'Kabupaten::simpan');         // Proses simpan data kabupaten
$routes->get('/kabupaten/edit/(:num)', 'Kabupaten::edit/$1');    // Menampilkan form edit kabupaten berdasarkan ID
$routes->post('/kabupaten/update/(:num)', 'Kabupaten::update/$1'); // Proses update data kabupaten
$routes->get('kabupaten/delete/(:num)', 'Kabupaten::delete/$1');

$routes->get('/user', 'User::index');                  // Menampilkan daftar kabupaten
$routes->get('/user/tambah', 'User::tambah');           // Menampilkan form tambah kabupaten
$routes->post('/user/simpan', 'User::simpan');         // Proses simpan data kabupaten
$routes->get('/user/edit/(:any)', 'User::edit/$1');    // Menampilkan form edit kabupaten berdasarkan ID
$routes->post('/user/update/(:any)', 'User::update/$1'); // Proses update data kabupaten
$routes->get('user/hapus/(:any)', 'User::delete/$1');

$routes->get('/rts', 'Rts::index');                  // Menampilkan daftar kabupaten
$routes->get('/rts/tambah', 'Rts::tambah');           // Menampilkan form tambah kabupaten
$routes->post('/rts/simpan', 'Rts::simpan');         // Proses simpan data kabupaten
$routes->get('/rts/edit/(:any)', 'Rts::edit/$1');    // Menampilkan form edit kabupaten berdasarkan ID
$routes->post('/rts/update/(:any)', 'Rts::update/$1'); // Proses update data kabupaten
$routes->get('rts/hapus/(:any)', 'Rts::hapus/$1');

$routes->get('/desa-bersinar', 'DesaBersinar::index');                  // Menampilkan daftar kabupaten
$routes->get('/desa-bersinar/tambah', 'DesaBersinar::tambah');           // Menampilkan form tambah kabupaten
$routes->post('/desa-bersinar/simpan', 'DesaBersinar::simpan');         // Proses simpan data kabupaten
$routes->get('/desa-bersinar/edit/(:any)', 'DesaBersinar::edit/$1');    // Menampilkan form edit kabupaten berdasarkan ID
$routes->post('/desa-bersinar/update/(:any)', 'DesaBersinar::update/$1'); // Proses update data kabupaten
$routes->get('desa-bersinar/hapus/(:any)', 'DesaBersinar::hapus/$1');

$routes->get('sosialisasi', 'Sosialisasi::index');                  // Menampilkan daftar kabupaten
$routes->get('sosialisasi/tambah', 'Sosialisasi::tambah');           // Menampilkan form tambah kabupaten
$routes->post('sosialisasi/simpan', 'Sosialisasi::simpan');         // Proses simpan data kabupaten
$routes->get('sosialisasi/edit/(:any)', 'Sosialisasi::edit/$1');    // Menampilkan form edit kabupaten berdasarkan ID
$routes->post('sosialisasi/update/(:any)', 'Sosialisasi::update/$1'); // Proses update data kabupaten
$routes->get('sosialisasi/hapus/(:any)', 'Sosialisasi::hapus/$1');



// Memuat file routing tambahan berdasarkan lingkungan aplikasi
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
