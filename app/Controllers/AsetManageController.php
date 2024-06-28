<?php

namespace App\Controllers;
use App\Models\AsetModel;
use App\Models\KeuanganModel;
use App\Models\PenggunaModel;
use App\Models\PermintaanModel;
use CodeIgniter\I18n\Time;

class AsetManageController extends BaseController
{
    private $aset;
    private $keuangan;
    private $permintaan;
    public function __construct(){
        $this->aset = new AsetModel();
        $this->keuangan = new KeuanganModel();
        $this->permintaan = new PermintaanModel();
    }
    public function asetManage(){
        $data = [
            'aset' => $this->aset->select('RIGHT(kode_aset, 3)+1 AS kode_aset')->orderBy('kode_aset', 'desc')->findAll(1)
        ];

        if(empty($data['aset'])){
            $data = ['aset' => 

            [
                0 => [
                    'kode_aset' => 1
                    ]
            ]];
        }

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

        $hitungKode = [
            'hitungan'  => $this->permintaan->selectCount('kode_permintaan', 'hitung')->findAll()
        ];

        $kode_permintaan = (int)$hitungKode['hitungan'][0]['hitung'] + 1;

        $date = Time::today('Asia/Jakarta', );

        $this->permintaan->insert([
            'kode_permintaan'   => $kode_permintaan,
            'tanggal'           => $date,
            'keterangan'        => 'Pemeliharaan Aset '.$post['kode_aset'],
            'nominal'           => $post['biaya'],
            'kode'              => session()->get("user")[0]["kode"],
            'file'              => '-',
            'status'            => 'PENDING'
        ]);

        
        $data = $this->aset->select('nama_aset')->where('kode_aset', $post['kode_aset'])->findAll();

        session()->setFlashdata('sukses', 'Data Pembiayan Untuk Aset <strong>'.$data[0]['nama_aset'].'</strong> Berhasil Diinputkan.');

        return redirect()->to('pemeliharaan_aset');
    }
    
    public function editAset($kode_aset){
        $data = [
            'aset'  => $this->aset->where('kode_aset', $kode_aset)->findAll(1)
        ];

        return view('editAsset', $data);
    }

    public function updateAset(){
        $post = $this->request->getPost(['kode_aset','aset', 'jenis_aset', 'jumlah', 'tanggal']);

        $nama_aset = $this->aset->where('kode_aset', $post['kode_aset'])->findAll();

        $this->aset->where([
            'kode_aset'     => $post['kode_aset'],
            
        ])->set([
            'jenis_aset'    => $post['jenis_aset'],
            'nama_aset'     => $post['aset'],
            'jumlah'        => $post['jumlah'],
            'tanggal'       => $post['tanggal']
        ])->update();
        
        session()->setFlashdata('edit', 'Data Untuk Aset <strong>'.$nama_aset[0]['nama_aset'].' ('.$post['kode_aset'].')</strong> Berhasil Di Ubah.');

        return redirect()->to('daftar_aset');
    }

    public function hapusAset($kode_aset){
        $nama_aset = $this->aset->where('kode_aset', $kode_aset)->findAll();
        
        $this->aset->where('kode_aset', $kode_aset)->delete();

        session()->setFlashdata('hapus', 'Data Untuk Aset <strong>'.$nama_aset[0]['nama_aset'].' ('.$kode_aset.')</strong> Berhasil Di Hapus.');

        return redirect()->to('daftar_aset');
    }
}