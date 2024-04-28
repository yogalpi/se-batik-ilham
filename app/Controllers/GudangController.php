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
            'jenis'    => $post['jenis'],
            'keterangan'    => $post['keterangan'],
            'tanggal'    => $post['tanggal'],
        ]);
        return redirect()->to("/data_gudang");
    }

    public function editGudang($kode_barang)
    {
        $data = [
            // cara satu tabel
            'gudangBahan' => $this->gudangBahan->where("kode_barang",$kode_barang)->find()

            // cara dua tabel yaitu pake join
            // 'pengadaan' => $this->pengadaan->join("detail_pengadaan","detail_pengadaan.kode_pengadaan = pengadaan.kode_pengadaan")->where("pengadaan.kode_pengadaan",$kode_pengadaan)->findAll()

        ];
        // dd($data['gudangBahan']);
        return view('editGudang', $data);
    }

    public function updateGudang()
    {
        $post = $this->request->getPost(['kode_barang', 'kode_produksi', 'nama_barang', 'jumlah', 'jenis', 'keterangan', 'tanggal']);
        $this->gudangBahan->db->transStart();
        $this->gudangBahan->where([
            'kode_barang' => $post['kode_barang'],
            'kode_produksi' => $post['kode_produksi'],
            
        ])->set([
            'nama_barang' => $post['nama_barang'],
            'jumlah' => $post['jumlah'],
            'jenis' => $post['jenis'],
            'keterangan' => $post['keterangan'],
            'tanggal' => $post['tanggal'],
        ])->update();
        
        
        $this->gudangBahan->db->transComplete();
        session()->setFlashdata('sukses', 'Berhasil Di Ubah');
        return redirect()->to("/data_gudang");
    }
}