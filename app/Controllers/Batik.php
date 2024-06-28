<?php

namespace App\Controllers;

use App\Models\KeuanganModel;
use App\Models\PenggunaModel;

class Batik extends BaseController
{
    private $keuangan;

    public function __construct(){
        $this->keuangan = new KeuanganModel();
    }
    public function index()
    {
        if(session()->get("user") == null){
            return redirect()->to('/login');
        }

        $data = [
            'keuangan'  => $this->keuangan->findall()
        ];

        return view('index', $data);
    }
    public function login()
    {
        return view('login-form');
    }

    public function asetManage(){
        return view('manajemenAsset');
    }

    public function loginAction()
    {
        $data = $this->request->getPost(["username", "password"]);
        $p = new PenggunaModel();
        $result = $p->GetDataPengguna($data["username"], $data["password"]);

        if(count($result) <= 0 ){
            return redirect()->to("/login");
        }

        session()->set("user", $result);

        return redirect()->to("/");
    }
}