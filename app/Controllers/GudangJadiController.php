<?php

namespace App\Controllers;

use App\Models\DetailGudangJadiModel;
use App\Models\GudangJadiModel;
use App\Models\ProduksiModel;

class GudangJadiController extends BaseController
{
    protected $produksi;
    protected $gudang_jadi, $detail_gudang_jadi;
    public function __construct()
    {
        $this->produksi = new ProduksiModel();
        $this->gudang_jadi = new GudangJadiModel();
        $this->detail_gudang_jadi = new DetailGudangJadiModel();
    }

    public function dataGudangJadi(){
        $data = [
            'gudang_jadi' => $this->gudang_jadi->findAll(),
        ];
        return view('dataGudangJadi', $data);
    }
    public function inputGudangJadi(){
        $data = [
            'produksi' => $this->produksi->findAll()
        ];
        return view('inputGudangJadi', $data);
    }

    public function simpanGudangJadi(){
        $post = $this->request->getPost(['kode_barang', 'kode_produksi', 'nama_barang','ukuran', 'jumlah', 'harga']);
        $this->gudang_jadi->db->transStart();
        $this->gudang_jadi->insert([
            'kode_produksi' => $post["kode_produksi"],
            'kode' => $post["kode_barang"],
            'nama_pakaian' => $post["nama_barang"]
        ]);
        $this->detail_gudang_jadi->insert([
            'kode_gudang_jadi' => $post["kode_barang"],
            'kode' => $post["kode_barang"],
            'ukuran' => $post["ukuran"],
            'jumlah' => $post["jumlah"],
            'harga' => $post["harga"]
        ]);
        $this->gudang_jadi->db->transComplete();
        return redirect()->to("/data_gudang_jadi");
    }
}