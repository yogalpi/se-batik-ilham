<?php

namespace App\Controllers;
use App\Models\DetailProduksiModel;
use App\Models\ProduksiModel;
use App\Models\PenggunaModel;

class ProduksiController extends BaseController
{
    private $produksi, $detail_produksi;
    public function __construct(){
        $this->produksi = new ProduksiModel();
        $this->detail_produksi = new DetailProduksiModel();
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
        $post = $this->request->getPost(['kode_pengadaan','kode_produksi', 'tanggal_mulai', 'tanggal_selesai', 'rencana_produksi', 'jenis_baju', 'ukuran']);
        $this->produksi->db->transStart();
        $this->produksi->insert([
            'kode_pengadaan'   => $post['kode_pengadaan'],
            'kode_produksi'  => $post['kode_produksi'],
            'tanggal_mulai' => $post['tanggal_mulai'],
            'tanggal_selesai'    => $post['tanggal_selesai'],
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
    
        $post = $this->request->getPost(['kode_pengadaan', 'kode_produksi', 'tanggal_mulai', 'tanggal_selesai', 'rencana_produksi', 'jenis_baju', 'ukuran']);
        // dd($post);
        $this->produksi->db->transStart();
        $this->produksi->where([
            // 'kode_pengadaan' => $post['kode_pengadaan'],
            'kode_produksi' => $post['kode_produksi'],
            
        ])->set([
            'tanggal_mulai' => $post['tanggal_mulai'],
            'tanggal_selesai' => $post['tanggal_selesai'],
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