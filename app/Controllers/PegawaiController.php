<?php

namespace App\Controllers;

use App\Models\GajiModel;
use App\Models\GajiProduksiModel;
use App\Models\KaryawanModel;
use App\Models\PenggunaModel;

class PegawaiController extends BaseController
{

    private $karyawan;
    private $gaji_pegawai_produksi;
    private $gaji;

    public function __construct(){
        $this->karyawan = new KaryawanModel();
        $this->gaji_pegawai_produksi = new GajiProduksiModel();
        $this->gaji = new GajiModel();
    }
    public function pegawaiManage(){
        return view('inputPegawai');
    }

    public function daftarPegawai(){
        $data = [
            'karyawan' => $this->karyawan->findAll()
        ];

        return view('daftarPegawai', $data);
    }

    public function manajemenGaji(){
        return view('manajemenGaji');
    }
    public function gajiProduksi(){
        return view('gajiProduksi');
    }
    public function inputGajiProduksi(){
        $data = [
            'gaji' => $this->gaji->findAll()
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

        $data = [
            'gaji' => $this->gaji_pegawai_produksi->findAll()
        ]; 

        return view('gajiProduksi', $data);
    }

    public function gajiUmum(){
        return view('gajiUmum');
    }
    public function inputGajiUmum(){
        return view('inputGajiUmum');
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