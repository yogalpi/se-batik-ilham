<?php

namespace App\Controllers;
use App\Models\PenggunaModel;

class GudangController extends BaseController
{
    public function dataGudang(){
        return view('dataGudang');
    }
    public function inputGudang(){
        return view('inputGudang');
    }
}