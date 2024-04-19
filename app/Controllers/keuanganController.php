<?php

namespace App\Controllers;
use App\Models\PenggunaModel;

class KeuanganController extends BaseController
{
    public function uangMasuk(){
        return view('uangMasuk');
    }
    public function uangKeluar(){
        return view('uangKeluar');
    }
    public function bukuBesar(){
        return view('bukuBesar');
    }
    public function detailbukuBesar($id){
        return view('detailbukuBesar');
    }
}