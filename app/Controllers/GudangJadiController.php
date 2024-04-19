<?php

namespace App\Controllers;
use App\Models\PenggunaModel;

class GudangJadiController extends BaseController
{
    public function dataGudangJadi(){
        return view('dataGudangJadi');
    }
    public function inputGudangJadi(){
        return view('inputGudangJadi');
    }
}