<?php

namespace App\Controllers;
use App\Models\AsetModel;
use App\Models\KeuanganModel;
use App\Models\PenggunaModel;

class AsetManageController extends BaseController
{
    private $aset;
    private $keuangan;
    public function __construct(){
        $this->aset = new AsetModel();
        $this->keuangan = new KeuanganModel();
    }
    public function asetManage(){
        $data = [
            'aset' => $this->aset->countAllResults()+1
        ];
        // dd($data);
        return view('inputAset', $data);
    }
    public function daftarAset(){
        $data = [
            'aset' => $this->aset->findAll()
        ];
            
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
            'aset'  => $this->aset->findAll(),
            'nama'  => $this->aset->select('nama_aset')->where('kode_aset', $post['kode_aset'])->findAll()
        ];
        // dd($data['nama'][0]['nama_aset']);
        session()->setFlashdata('sukses', 'Data Aset <strong>'.$data['nama'][0]['nama_aset'].'</strong> Berhasil Diinputkan.');
        
        return view('daftarAsset', $data);
    }

    public function inputBiayaAset(){
        $data = [
            'aset' => $this->aset->findAll()
        ];
        return view('inputBiayaAset', $data);
    }

    public function simpanBiayaAset(){
        $post = $this->request->getPost(['kode_aset', 'biaya', 'keterangan', 'tanggal']);

        $kode = $this->aset->select('kode_aset')->orderBy('kode_aset', 'desc')->findAll(1);
        $digit = $this->keuangan->countAllResults()+1;
        
        $this->keuangan->insert([
            'kode'          => $kode[0]['kode_aset'].$digit,
            'tanggal'       => $post['tanggal'],
            'status'        => 'KREDIT',
            'jumlah'        => $post['biaya'],
            'keterangan'    => $post['keterangan'],
            'kode_pengguna' => session()->get("user")[0]["kode"] 
        ]);

        $data = $this->aset->select('nama_aset')->where('kode_aset', $post['kode_aset'])->findAll();
        session()->setFlashdata('sukses', 'Data Pembiayan Untuk Aset <strong>'.$data[0]['nama_aset'].'</strong> Berhasil Diinputkan.');

        return redirect()->to('pemeliharaan_aset');
    }
    
}