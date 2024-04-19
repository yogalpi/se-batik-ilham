<?php

namespace App\Controllers;
use App\Models\PenggunaModel;

class ProduksiController extends BaseController
{
    public function dataProduksi(){
        return view('dataProduksi');
    }
    public function inputProduksi(){
        return view('inputProduksi');
    }
}