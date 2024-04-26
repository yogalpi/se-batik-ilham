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
$routes->post('/simpan_produksi', 'ProduksiController::simpanProduksi');
$routes->post('/produksi', 'ProduksiController::produksi');
$routes->get('/editProduksi/(:any)', 'ProduksiController::editProduksi/$1');
$routes->post('/updateProduksi', 'ProduksiController::updateProduksi');
$routes->get('/detail_produksi/(:any)', 'ProduksiController::detailProduksi/$1');

// GUDANG
$routes->get('/data_gudang', 'GudangController::dataGudang');
$routes->get('/input_gudang', 'GudangController::inputGudang');
$routes->post('/input_gudang', 'GudangController::simpanBahan');
$routes->post('/gudang', 'GudangController::gudangBahan');
$routes->get('/editGudang/(:any)', 'GudangController::editGudang/$1');
$routes->post('/updateGudang', 'GudangController::updateGudang');

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
$routes->post('/input_gaji_umum', 'PegawaiController::inputGajiKaryawanUmum');


$routes->get('/gaji_produksi', 'PegawaiController::gajiProduksi');
$routes->get('/gaji_umum', 'PegawaiController::gajiUmum');

$routes->get('/input_gaji_produksi', 'PegawaiController::InputGajiProduksi');
$routes->get('/input_gaji_umum', 'PegawaiController::InputGajiUmum');

// PEMBELIAN
$routes->get('/input_pembelian', 'PembelianController::inputPembelian');
$routes->get('/data_pembelian', 'PembelianController::dataPembelian');

// PENGADAAN
$routes->get('/input_pengadaan', 'PengadaanController::inputPengadaan');
$routes->get('/data_pengadaan', 'PengadaanController::dataPengadaan');

$routes->post('/input_pengadaan', 'PengadaanController::simpanPengadaan');
$routes->post('/pengadaan', 'PengadaanController::pengadaan');
$routes->get('/detail_pengadaan/(:any)', 'PengadaanController::detailPengadaan/$1');
$routes->get('/editPengadaan/(:any)', 'PengadaanController::editPengadaan/$1');
$routes->post('/updatePengadaan', 'PengadaanController::updatePengadaan');

// GUDANG Jadi
$routes->get('/data_gudang_jadi', 'GudangJadiController::dataGudangJadi');
$routes->get('/input_gudang_jadi', 'GudangJadiController::inputGudangJadi');
$routes->post('/simpan_gudang_jadi', 'GudangJadiController::simpanGudangJadi');

// PENJUALAN
$routes->get('/transaksi_penjualan', 'TransaksiController::transaksi');
$routes->get('/detail_transaksi/(:any)', 'TransaksiController::detailTransaksi/$1');
$routes->get('/invoice', 'TransaksiController::invoice');
$routes->get('/detail_invoice/(:any)', 'TransaksiController::detailInvoice/$1');
$routes->post('/simpanStatus', 'TransaksiController::simpanStatus');

// KEUANGAN
// $routes->get('/uang_masuk', 'KeuanganController::uangMasuk');
// $routes->get('/uang_keluar', 'KeuanganController::uangKeluar');
// $routes->get('/buku_besar', 'KeuanganController::bukuBesar');
// $routes->get('/detail_buku_besar/(:any)', 'KeuanganController::detailbukuBesar/$1');

// KEUANGAN
$routes->get('/uangMasukdanKeluar', 'KeuanganController::uangMasukdanKeluar');
$routes->get('/buku_besar', 'KeuanganController::bukuBesar');
$routes->get('/detail_buku_besar/(:any)', 'KeuanganController::detailbukuBesar/$1');

$routes->get('/datauangMasukdanKeluar', 'KeuanganController::datauangMasukdanKeluar');
$routes->post('/simpanUang', 'KeuanganController::simpanUangMasukdanKeluar');


// USER
$routes->get('/akun_pelanggan', 'UserController::akunPelanggan');
$routes->get('/customer_service', 'UserController::customerService');