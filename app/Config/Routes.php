<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'User::login');
 
$routes->post('/login', 'User::prosesLogin');
$routes->get('/logout', 'User::logout');

$routes->get('/daftar', 'User::registrasi');
$routes->post('/daftar', 'User::registrasi');

$routes->get('/profile', 'User::profile');

//dashboard
$routes->get('/dashboard-admin', 'User::dashboardAdmin',['filter'=>'otentifikasi']);

//user
$routes->get('/data-user', 'User::dataUser');
$routes->get('/edit-user/(:num)', 'User::editUser/$1');
$routes->post('/perbarui-user', 'User::simpanEditUser');
$routes->get('/hapus-user/(:num)', 'User::hapusUser/$1');

//kategori
$routes->get('/kategori-produk', 'Kategori::dataKategori');
$routes->get('/tambah-kategori', 'Kategori::tambahKategori');
$routes->post('/simpan-kategori', 'Kategori::simpanKategori');
$routes->get('/edit-kategori/(:num)', 'Kategori::editKategori/$1');
$routes->post('/perbarui-kategori', 'Kategori::simpanEditKategori');
$routes->post('/hapus-kategori/(:num)', 'Kategori::hapusKategori/$1');
$routes->get('/cek-kategori-digunakan/(:segment)', 'Kategori::cek_keterkaitan_data/$1');

//satuan
$routes->get('/satuan-produk', 'Satuan::satuanProduk');
$routes->get('/tambah-satuan', 'Satuan::tambahSatuan');
$routes->post('/simpan-satuan', 'Satuan::simpanSatuan');
$routes->get('/edit-satuan/(:num)', 'Satuan::editSatuan/$1');
$routes->post('/perbarui-satuan', 'Satuan::simpanEditSatuan');
$routes->get('/edit-satuan', 'Satuan::simpanEditSatuan');
$routes->post('/hapus-satuan/(:num)', 'Satuan::hapusSatuan/$1');
$routes->get('/cek-satuan-digunakan/(:segment)', 'Satuan::cek_keterkaitan_data/$1');

//produk
$routes->get('/data-produk', 'Produk::dataProduk');
$routes->get('/tambah-produk', 'Produk::tambahProduk');
$routes->post('/simpan-produk', 'Produk::simpanProduk');
$routes->get('/edit-produk/(:num)', 'Produk::editProduk/$1');
$routes->post('/update-produk/(:num)', 'Produk::simpanEdit/$1');
$routes->delete('/produk/(:num)', 'Produk::delete/$1');

//penjualan
$routes->get('/transaksi', 'Penjualan::index',['filter'=>'otentifikasi']);
$routes->post('/transaksi','Penjualan::simpanPenjualan');
$routes->get('/pembayaran','Penjualan::index',['filter'=>'otentifikasi']);
$routes->get('/pembayaran-transaksi','Penjualan::simpanPembayaran');
$routes->post('/hapus-produk/(:num)', 'Satuan::hapusProduk/$1');

//laporan
$routes->get('/laporan-stok', 'Produk::dataLaporan');
$routes->get('/pdf', 'PdfController::index');
$routes->get('/pdf/generate', 'PdfController::generate');
$routes->get('/pdf/generate/(:num)', 'PdfController::generate/$1');

$routes->get('/laporan-penjualan', 'Produk::dataLaporanPenjualan');
$routes->get('/pdf-penjualan', 'PdfController::pdfPenjualan');
$routes->get('/pdf/generate-penjualan', 'PdfController::generatePenjualan');

