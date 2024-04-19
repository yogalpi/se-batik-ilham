<?php

namespace App\Controllers;
use App\Models\PenggunaModel;

class PembelianController extends BaseController
{
    public function dataPembelian(){
        return view('dataPembelian');
    }
    public function inputPembelian(){
        return view('inputPembelian');
    }
}