<?php

namespace App\Controllers;
use App\Models\DetailProduksiModel;
use App\Models\ProduksiModel;
use App\Models\PenggunaModel;
use App\Models\GudangBahanBakuModel;
use App\Models\PengadaanModel;

class ProduksiController extends BaseController
{
    private $produksi, $detail_produksi, $bahan_baku, $pengadaan;
    public function __construct(){
        $this->produksi = new ProduksiModel();
        $this->detail_produksi = new DetailProduksiModel();
        $this->bahan_baku = new GudangBahanBakuModel();
        $this->pengadaan = new PengadaanModel();
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
        $data = [
            'bahan_baku' => $this->bahan_baku->orderBy('kode_barang', 'DESC')->findAll(),
            'pengadaan' => $this->pengadaan->orderBy('kode_pengadaan', 'DESC')->findAll()
        ];

        return view('inputProduksi', $data);
    }

    public function simpanProduksi(){
        $post = $this->request->getPost(['kode_pengadaan','kode_barang','jumlah_barang','kode_produksi', 'tanggal_mulai', 'rencana_produksi', 'jenis_baju', 'ukuran']);
        $this->produksi->db->transStart();
        $this->produksi->insert([
            'kode_pengadaan'   => $post['kode_pengadaan'],
            'kode_barang'   => $post['kode_barang'],
            'jumlah_barang'   => $post['jumlah_barang'],
            'kode_produksi'  => $post['kode_produksi'],
            'tanggal_mulai' => $post['tanggal_mulai'],
            'rencana_produksi'    => $post['rencana_produksi']
        ]);

        for ($i = 0; $i < count($post["jenis_baju"]); $i++) {
            if ($post['jenis_baju'][$i] != "") {
                $this->detail_produksi->insert([
                    'kode_produksi' => $post['kode_produksi'],
                    'jenis_baju' => $post['jenis_baju'][$i],
                    'ukuran' => $post['ukuran'][$i],
                    
                ]);
            }
        }
        // dd($post);
        $this->produksi->db->transComplete();
        return redirect()->to("/data_produksi");
    }

    public function editProduksi($kode_produksi)
    {
        // dd($kode_produksi);
        $data = [
            // cara satu tabel
            // 'produksi' => $this->produksi->where("kode_pengadaan",$kode_pengadaan)->find()

            // cara dua tabel yaitu pake join
            'produksi' => $this->produksi->join("detail_produksi","detail_produksi.kode_produksi = produksi.kode_produksi")->where("produksi.kode_produksi",$kode_produksi)->findAll()

        ];
        // dd($data['produksi']);
        return view('editProduksi', $data);
    }

    public function updateProduksi()
    {
    
        $post = $this->request->getPost(['kode_pengadaan', 'kode_barang','jumlah_barang', 'kode_produksi','tanggal_mulai', 'rencana_produksi', 'jenis_baju', 'ukuran']);
        // dd($post);
        $this->produksi->db->transStart();
        $this->produksi->where([
            // 'kode_pengadaan' => $post['kode_pengadaan'],
            'kode_produksi' => $post['kode_produksi'],
            
        ])->set([
            'jumlah_barang' => $post['jumlah_barang'],
            'tanggal_mulai' => $post['tanggal_mulai'],
            'rencana_produksi' => $post['rencana_produksi'],
            
        ])->update();

        for ($i = 0; $i < count($post["jenis_baju"]); $i++) {
            if ($post['jenis_baju'][$i] != "") {
                $this->detail_produksi->where([
                    'kode_produksi' => $post['kode_produksi'],
                    
                ])->set([
                    'jenis_baju' => $post['jenis_baju'][$i],
                    'ukuran' => $post['ukuran'][$i],
                ])->update();
            }
        }
        
        
        $this->produksi->db->transComplete();
        session()->setFlashdata('sukses', 'Berhasil Di Ubah');
        return redirect()->to("/data_produksi");
    }

    public function detailProduksi($id)
    {
        $data = [
            'detail_produksi' => $this->detail_produksi->where(['kode_produksi' => $id])->get()->getResultArray()
        ];
        return view('detailProduksi', $data);

    }
}