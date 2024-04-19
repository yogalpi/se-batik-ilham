<?php

namespace App\Controllers;
use App\Models\PenggunaModel;

class PegawaiController extends BaseController
{
    public function pegawaiManage(){
        return view('inputPegawai');
    }

    public function daftarPegawai(){
        return view('daftarPegawai');
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

}