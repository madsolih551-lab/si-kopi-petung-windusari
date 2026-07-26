<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::attemptLogin');
$routes->get('/logout', 'Auth::logout');
$routes->get('/admin/dashboard', 'Admin::dashboard');
$routes->get('/pelanggan/beranda', 'Pelanggan::beranda');
$routes->get('/produk', 'Produk::index');
$routes->get('/produk/create', 'Produk::create');
$routes->post('/produk/store', 'Produk::store');
$routes->get('/produk/edit/(:num)', 'Produk::edit/$1');
$routes->post('/produk/update/(:num)', 'Produk::update/$1');
$routes->get('/produk/delete/(:num)', 'Produk::delete/$1');
$routes->get('/stok', 'Stok::index');
$routes->get('/stok/tambah/(:num)', 'Stok::tambah/$1');
$routes->post('/stok/simpan-masuk', 'Stok::simpanMasuk');
$routes->post('/stok/simpan-keluar', 'Stok::simpanKeluar');
$routes->get('/stok/riwayat/(:num)', 'Stok::riwayat/$1');
$routes->get('/katalog', 'Katalog::index');
$routes->get('/pesanan/buat/(:num)', 'Pesanan::buat/$1');
$routes->post('/pesanan/simpan', 'Pesanan::simpan');
$routes->get('/pesanan/riwayat', 'Pesanan::riwayat');
$routes->get('/pesanan/kelola', 'Pesanan::kelola');
$routes->get('/pesanan/detail/(:num)', 'Pesanan::detail/$1');
$routes->post('/pesanan/update-status/(:num)', 'Pesanan::updateStatus/$1');
$routes->get('/data-pelanggan', 'DataPelanggan::index');
$routes->get('/data-pelanggan/detail/(:num)', 'DataPelanggan::detail/$1');
$routes->get('/laporan', 'Laporan::index');
$routes->get('/laporan/pdf', 'Laporan::exportPdf');
$routes->get('/profil', 'Profil::index');
$routes->post('/profil/update', 'Profil::update');



