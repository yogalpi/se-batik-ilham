<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Batik::index');

$routes->get('/login', 'Batik::login');
$routes->post('/login', 'Batik::loginAction');

//PEMBELIAN

//PRODUKSI
$routes->get('/data_produksi', 'ProduksiController::dataProduksi');
$routes->get('/input_produksi', 'ProduksiController::inputProduksi');

// GUDANG
$routes->get('/data_gudang', 'GudangController::dataGudang');
$routes->get('/input_gudang', 'GudangController::inputGudang');

// ASSET_MANAGEMEN
$routes->get('/manajemen_aset', 'AsetManageController::asetManage');
$routes->get('/daftar_aset', 'AsetManageController::daftarAset');

$routes->post('/input_aset', 'AsetManageController::inputAset');

//KEPEGAWAIAN
$routes->get('/manajemen_pegawai', 'PegawaiController::pegawaiManage');
$routes->get('/daftar_pegawai', 'PegawaiController::daftarPegawai');
$routes->get('/manajemen_gaji', 'PegawaiController::manajemenGaji');

$routes->post('/input_pegawai', 'PegawaiController::inputPegawai');
$routes->post('/input_gaji_produksi', 'PegawaiController::inputGajiKaryawanProduksi');


$routes->get('/gaji_produksi', 'PegawaiController::gajiProduksi');
$routes->get('/gaji_umum', 'PegawaiController::gajiUmum');

$routes->get('/input_gaji_produksi', 'PegawaiController::InputGajiProduksi');
$routes->get('/input_gaji_umum', 'PegawaiController::InputGajiUmum');

// PEMBELIAN
$routes->get('/input_pembelian', 'PembelianController::inputPembelian');
$routes->get('/data_pembelian', 'PembelianController::dataPembelian');

// GUDANG Jadi
$routes->get('/data_gudang_jadi', 'GudangJadiController::dataGudangJadi');
$routes->get('/input_gudang_jadi', 'GudangJadiController::inputGudangJadi');

// PENJUALAN
$routes->get('/transaksi_penjualan', 'TransaksiController::transaksi');
$routes->get('/detail_transaksi/(:any)', 'TransaksiController::detailTransaksi/$1');
$routes->get('/invoice', 'TransaksiController::invoice');
$routes->get('/detail_invoice/(:any)', 'TransaksiController::detailInvoice/$1');

// KEUANGAN
$routes->get('/uang_masuk', 'KeuanganController::uangMasuk');
$routes->get('/uang_keluar', 'KeuanganController::uangKeluar');
$routes->get('/buku_besar', 'KeuanganController::bukuBesar');
$routes->get('/detail_buku_besar/(:any)', 'KeuanganController::detailbukuBesar/$1');

// USER
$routes->get('/akun_pelanggan', 'UserController::akunPelanggan');
$routes->get('/customer_service', 'UserController::customerService');