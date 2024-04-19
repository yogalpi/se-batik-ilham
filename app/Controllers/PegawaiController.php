<?php

namespace App\Controllers;

use App\Models\KaryawanModel;
use App\Models\PenggunaModel;

class PegawaiController extends BaseController
{

    private $karyawan;

    public function __construct(){
        $this->karyawan = new KaryawanModel();
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
        return view('inputGajiProduksi');
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