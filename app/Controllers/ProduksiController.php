<?php

namespace App\Controllers;
use App\Models\ProduksiModel;
use App\Models\PenggunaModel;

class ProduksiController extends BaseController
{
    private $produksi;
    public function __construct(){
        $this->produksi = new ProduksiModel();
    }
    public function produksi(){
        
        return view('inputProduksi');
    }
    public function dataProduksi(){
        $data = [
            'produksi' => $this->produksi->findAll()
        ];
        return view('dataProduksi', $data);
    }
    public function inputProduksi(){

        return view('inputProduksi');
    }

    public function simpanProduksi(){
        $post = $this->request->getPost(['kode_pengadaan','kode_produksi', 'tanggal_mulai', 'tanggal_selesai', 'status']);
        $this->produksi->insert([
            'kode_pengadaan'   => $post['kode_pengadaan'],
            'kode_produksi'  => $post['kode_produksi'],
            'tanggal_mulai' => $post['tanggal_mulai'],
            'tanggal_selesai'    => $post['tanggal_selesai'],
            'status'    => $post['status']
        ]);
        return redirect()->to("/data_produksi");
    }
}