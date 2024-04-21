<?php

namespace App\Controllers;

use App\Models\KeuanganModel;
use App\Models\PenggunaModel;

class KeuanganController extends BaseController
{
    private $uangMasukdanKeluar;
    public function __construct(){
    
        $this->uangMasukdanKeluar = new KeuanganModel();    
    }

    public function uangMasukdanKeluar(){
   
        return view('uangMasukdanKeluar');
    }
    public function bukuBesar(){
        return view('bukuBesar');
    }
    public function detailbukuBesar($id){
        return view('detailbukuBesar');
    }
    public function datauangMasukdanKeluar(){
        $data = [
            'keuangan' => $this->uangMasukdanKeluar->findAll()
        ];
        return view('datauangMasukdanKeluar',$data);
    }
     public function simpanUangMasukdanKeluar(){
        $post = $this->request->getPost(['kode','tanggal','status','jumlah','keterangan','kode_pengguna']); 
        $this->uangMasukdanKeluar->insert([
            'kode' => $post['kode'],
            'tanggal' => $post['tanggal'],
            'status' => $post['status'],
            'jumlah' => $post['jumlah'],
            'keterangan' => $post['keterangan'],
            'kode_pengguna' => $post['kode_pengguna']
        ]);
        return redirect()->to('/datauangMasukdanKeluar');
    }
}