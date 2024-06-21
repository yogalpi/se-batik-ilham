<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Batik::index');

$routes->get('/login', 'Batik::login');
$routes->post('/login', 'Batik::loginAction');

$routes->post('/input_todo', 'Batik::inputTodo');
$routes->post('/selesai_todo', 'Batik::selesaiTodo');


//PEMBELIAN

//PRODUKSI
$routes->get('/data_produksi', 'ProduksiController::dataProduksi');
$routes->get('/input_produksi', 'ProduksiController::inputProduksi');

// GUDANG
$routes->get('/data_gudang', 'GudangController::dataGudang');
$routes->get('/input_gudang', 'GudangController::inputGudang');
$routes->post('/input_gudang', 'GudangController::simpanBahan');
$routes->post('/gudang', 'GudangController::gudangBahan');

// ASSET_MANAGEMEN
$routes->get('/manajemen_aset', 'AsetManageController::asetManage');
$routes->get('/daftar_aset', 'AsetManageController::daftarAset');

$routes->post('/input_aset', 'AsetManageController::inputAset');
$routes->post('/input_biaya_aset', 'AsetManageController::simpanBiayaAset');
$routes->get('/pemeliharaan_aset', 'AsetManageController::inputBiayaAset');

$routes->get('/edit_aset/(:any)', 'AsetManageController::editAset/$1');
$routes->post('/update_aset', 'AsetManageController::updateAset');
$routes->post('/hapus_aset/(:any)', 'AsetManageController::hapusAset/$1');

//KEPEGAWAIAN
$routes->post('/cari_absen', 'PegawaiController::cariAbsen');
$routes->get('/manajemen_pegawai', 'PegawaiController::pegawaiManage');
$routes->get('/daftar_pegawai', 'PegawaiController::daftarPegawai');
$routes->get('/manajemen_gaji', 'PegawaiController::manajemenGaji');

$routes->post('/input_pegawai', 'PegawaiController::inputPegawai');
$routes->post('/input_gaji_produksi', 'PegawaiController::inputGajiKaryawanProduksi');
$routes->post('/input_gaji_umum', 'PegawaiController::inputGajiKaryawanUmum');


$routes->get('/gaji_produksi', 'PegawaiController::gajiProduksi');
$routes->get('/gaji_umum', 'PegawaiController::gajiUmum');
$routes->get('/absensi_pegawai', 'PegawaiController::absensiPegawai');
$routes->post('/input_absensi', 'PegawaiController::inputAbsensi');
$routes->get('/daftar_absensi', 'PegawaiController::dataAbsensi');
$routes->post('/filter_absen', 'PegawaiController::dataAbsensiBulanan');

$routes->get('/input_gaji_produksi', 'PegawaiController::InputGajiProduksi');
$routes->get('/input_gaji_umum', 'PegawaiController::InputGajiUmum');

$routes->post('/input_permintaan_gaji_produksi', 'PegawaiController::InputPermintaanGajiProduksi');
$routes->post('/input_permintaan_gaji_umum', 'PegawaiController::InputPermintaanGajiUmum');

$routes->get('/edit_absensi_pegawai/(:any)/(:any)', 'PegawaiController::editAbsensiPegawai/$1/$2');
$routes->post('/update_absensi', 'PegawaiController::updateAbsensi');

$routes->get('/edit_pegawai/(:any)', 'PegawaiController::editPegawai/$1');
$routes->post('/update_pegawai', 'PegawaiController::updatePegawai');

$routes->get('/edit_gaji_pegawai_produksi/(:any)', 'PegawaiController::editGajiPegawaiProduksi/$1');
$routes->post('/update_gaji_produksi', 'PegawaiController::updateGajiPegawaiProduksi');
$routes->post('/hapus_gaji_produksi/(:any)/(:any)/(:any)', 'PegawaiController::hapusGajiProduksi/$1/$2/$3');

$routes->get('/edit_gaji_pegawai_umum/(:any)', 'PegawaiController::editGajiPegawaiUmum/$1');
$routes->post('/update_gaji_umum', 'PegawaiController::updateGajiPegawaiUmum');
$routes->post('/hapus_gaji_umum/(:any)/(:any)/(:any)', 'PegawaiController::hapusGajiUmum/$1/$2/$3');

$routes->post('/input_gaji', 'PegawaiController::inputGaji');

$routes->get('/laporan_gaji_pegawai_umum_excel', 'PegawaiController::laporanGajiPegawaiUmumExcel');
$routes->post('/laporan_gaji_pegawai_umum_pdf', 'PegawaiController::laporanGajiPegawaiUmumPdf');

$routes->get('/laporan_gaji_pegawai_produksi_excel', 'PegawaiController::laporanGajiPegawaiProduksiExcel');
$routes->post('/laporan_gaji_pegawai_produksi_pdf', 'PegawaiController::laporanGajiPegawaiProduksiPdf');
// $routes->get('/laporan_gaji_pegawai_produksi', 'PegawaiController::laporanGajiPegawaiProduksi');

$routes->get('/unduh_file/(:any)', 'PegawaiController::unduhFIle/$1');

// PEMBELIAN
$routes->get('/input_pembelian', 'PembelianController::inputPembelian');
$routes->get('/data_pembelian', 'PembelianController::dataPembelian');

// PENGADAAN
$routes->get('/input_pengadaan', 'PengadaanController::inputPengadaan');
$routes->get('/data_pengadaan', 'PengadaanController::dataPengadaan');

$routes->post('/input_pengadaan', 'PengadaanController::simpanPengadaan');
$routes->post('/pengadaan', 'PengadaanController::pengadaan');
$routes->get('/detail_pengadaan/(:any)', 'PengadaanController::detailPengadaan/$1');

// GUDANG Jadi
$routes->get('/data_gudang_jadi', 'GudangJadiController::dataGudangJadi');
$routes->get('/input_gudang_jadi', 'GudangJadiController::inputGudangJadi');
$routes->post('/simpan_gudang_jadi', 'GudangJadiController::simpanGudangJadi');
$routes->get('/detail_gudang_jadi/(:any)', 'GudangJadiController::detailGudangJadi/$1');
$routes->get('/edit_gudang_jadi/(:any)', 'GudangJadiController::editGudangJadi/$1');
$routes->get('/delete_gudang_jadi/(:any)', 'GudangJadiController::deleteGudangJadi/$1');
$routes->get('/item_gudang_jadi/(:any)/delete/(:any)', 'GudangJadiController::deleteItemGudangJadi/$1/$2');
$routes->post('/update_gudang_jadi', 'GudangJadiController::updateGudangJadi');

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