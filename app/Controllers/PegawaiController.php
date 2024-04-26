<?php

namespace App\Controllers;

use App\Models\GajiModel;
use App\Models\GajiProduksiModel;
use App\Models\GajiUmumModel;
use App\Models\KaryawanModel;
use App\Models\KeuanganModel;
use App\Models\PenggunaModel;
use App\Models\ProduksiModel;
use CodeIgniter\I18n\Time;

class PegawaiController extends BaseController
{

    private $karyawan;
    private $gaji_pegawai_produksi;
    private $gaji_pegawai_umum;
    private $gaji;
    private $keuangan;
    private $produksi;

    public function __construct(){
        $this->karyawan = new KaryawanModel();
        $this->gaji_pegawai_produksi = new GajiProduksiModel();
        $this->gaji_pegawai_umum = new GajiUmumModel();
        $this->gaji = new GajiModel();
        $this->keuangan = new KeuanganModel();
        $this->produksi = new ProduksiModel();
    }
    public function pegawaiManage(){
        return view('inputPegawai');
    }

    public function daftarPegawai(){
        $data = [
            'karyawan' => $this->karyawan->where('status', 'aktif')->findAll()
        ];

        return view('daftarPegawai', $data);
    }

    public function manajemenGaji(){
        return view('manajemenGaji');
    }
    public function gajiProduksi(){

        $data = [
            'gaji' => $this->karyawan->select('karyawan.kode, karyawan.nama, gaji_pegawai_produksi.jumlah_produksi, gaji_pegawai_produksi.total_gaji')
                    ->join('gaji_pegawai_produksi', 'karyawan.kode = gaji_pegawai_produksi.kode')
                    ->where('karyawan.kode_jenis', 'KP')
                    ->where('karyawan.status', 'aktif')
                    ->findAll()
        ]; 

        return view('gajiProduksi', $data);
    }
    public function inputGajiProduksi(){
        $data = [
            'gaji'                  => $this->gaji->select('karyawan.* ,gaji.*')
                                    ->join('karyawan', 'karyawan.kode_jenis = gaji.kode_jenis')
                                    ->where('karyawan.kode_jenis', 'KP')
                                    ->where('karyawan.status', 'aktif')
                                    ->findAll(),
            'produksi'              => $this->produksi->orderBy('kode_produksi', 'DESC')->findAll(5),
            'kode_gaji'             => $this->gaji_pegawai_produksi->select('RIGHT(kode_gaji, 3) AS kode_gaji')->orderBy('kode_gaji', 'desc')->first()
        ]; 

        return view('inputGajiProduksi', $data);
    }

    public function inputGajiKaryawanProduksi(){
        $post = $this->request->getPost(['kode_gaji' ,'kode_karyawan', 'kode_produksi', 'jumlah_produksi', 'total_gaji']);
        $this->gaji_pegawai_produksi->insert([
            'kode_gaji'         => $post['kode_gaji'],
            'kode'              => $post['kode_karyawan'],
            'kode_produksi'     => $post['kode_produksi'],
            'jumlah_produksi'   => $post['jumlah_produksi'],
            'total_gaji'        => $post['total_gaji']
        ]); 

        $date = Time::today('Asia/Jakarta', );

        $this->keuangan->insert([
            'kode'          => $post['kode_gaji'],
            'tanggal'       => $date->toDateString(),
            'status'        => 'KREDIT',
            'jumlah'        => $post['total_gaji'],
            'keterangan'    => 'Gaji Karyawan Produksi Tanggal '. $date->toDateString(),
            'kode_pengguna' => session()->get("user")[0]["kode"] 
        ]);

        return redirect()->to('gaji_produksi');
    }

    public function gajiUmum(){
        $data = [
            'gaji' => $this->karyawan->select('karyawan.kode, karyawan.nama, gaji_pegawai_umum.jumlah_absensi, gaji_pegawai_umum.total_gaji')
                    ->join('gaji_pegawai_umum', 'karyawan.kode = gaji_pegawai_umum.kode')
                    ->where('karyawan.kode_jenis', 'KU')
                    ->findAll()
        ]; 

        return view('gajiUmum', $data);
    }
    public function inputGajiUmum(){
        $data = [
            'gaji' => $this->gaji->findAll()
        ]; 

        return view('inputGajiUmum', $data);
    }

    public function inputGajiKaryawanUmum(){
        $post = $this->request->getPost(['kode_gaji' ,'kode_karyawan', 'jumlah_absensi', 'total_gaji']);
        $this->gaji_pegawai_umum->insert([
            'kode_gaji'         => $post['kode_gaji'],
            'kode'              => $post['kode_karyawan'],
            'jumlah_absensi'    => $post['jumlah_absensi'],
            'total_gaji'        => $post['total_gaji']
        ]); 

        $date = Time::today('Asia/Jakarta', );

        $this->keuangan->insert([
            'kode'          => $post['kode_gaji'],
            'tanggal'       => $date->toDateString(),
            'status'        => 'KREDIT',
            'jumlah'        => $post['total_gaji'],
            'keterangan'    => 'Gaji Karyawan Umum Tanggal '. $date->toDateString(),
            'kode_pengguna' => session()->get("user")[0]["kode"] 
        ]);

        return redirect()->to('gaji_umum');
    }

    public function inputPegawai(){
        $post = $this->request->getPost(['kode_karyawan', 'nama_karyawan', 'jenis_kelamin', 'tanggal_lahir', 'jenis_karyawan', 'alamat']);
        $this->karyawan->insert([
            'kode'          => $post['kode_karyawan'],
            'tanggal'       => $post['tanggal_lahir'],
            'nama'          => $post['nama_karyawan'],
            'alamat'        => $post['alamat'],
            'jenis_kelamin' => $post['jenis_kelamin'],
            'kode_jenis'    => $post['jenis_karyawan']
        ]);

        $data = [
            'karyawan' => $this->karyawan->findAll()
        ];

        return view('daftarPegawai', $data);
    }

}