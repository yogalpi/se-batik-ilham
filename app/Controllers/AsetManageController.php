<?php

namespace App\Controllers;
use App\Models\AsetModel;
use App\Models\PenggunaModel;

class AsetManageController extends BaseController
{
    private $aset;
    public function __construct(){
        $this->aset = new AsetModel();
    }
    public function asetManage(){
        return view('inputAset');
    }
    public function daftarAset(){
        $data = [
            'aset' => $this->aset->findAll()];
            
        return view('daftarAsset', $data);
    }
    public function inputAset(){
        $post = $this->request->getPost(['kode_aset','aset', 'jenis_aset', 'jumlah', 'tanggal']);
        $this->aset->insert([
            'kode_aset'     => $post['kode_aset'],
            'jenis_aset'    => $post['jenis_aset'],
            'nama_aset'     => $post['aset'],
            'jumlah'        => $post['jumlah'],
            'tanggal'       => $post['tanggal']
        ]);

        $data = [
            'aset' => $this->aset->findAll()
        ];
        return view('daftarAsset', $data);
    }
    
}