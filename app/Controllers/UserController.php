<?php

namespace App\Controllers;
use App\Models\PenggunaModel;

class UserController extends BaseController
{
    public function akunPelanggan(){
        return view('akunPelanggan');
    }
    public function customerService(){
        return view('customerService');
    }
}