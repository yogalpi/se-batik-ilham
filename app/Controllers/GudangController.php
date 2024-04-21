<?php

namespace App\Controllers;
use App\Models\GudangBahanBakuModel;

class GudangController extends BaseController
{
    private $gudangBahan;
    public function __construct(){
        $this->gudangBahan = new GudangBahanBakuModel();
    }
    public function gudangBahan(){
        
        return view('inputGudang');
    }
    public function dataGudang(){
        $data = [
            'gudangBahan' => $this->gudangBahan->findAll()
        ];
        return view('dataGudang', $data);
    }
    public function inputGudang(){

        return view('inputGudang');
    }

    public function simpanBahan(){
        $post = $this->request->getPost(['kode_barang','kode_produksi', 'nama_barang', 'jumlah', 'jenis', 'keterangan', 'tanggal']);
        $this->gudangBahan->insert([
            'kode_barang'   => $post['kode_barang'],
            'kode_produksi'  => $post['kode_produksi'],
            'nama_barang' => $post['nama_barang'],
            'jumlah'    => $post['jumlah'],
            'jenis_barang'    => $post['jenis'],
            'keterangan'    => $post['keterangan'],
            'tanggal'    => $post['tanggal'],
        ]);
        return redirect()->to("/data_gudang");
    }
}