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
            // 'detail_produksi' => $this->detail_produksi->select('detail_produksi.*, bahan_baku.*')
            // ->join('bahan_baku', 'detail_produksi.kode_barang = bahan_baku.kode_barang')->findAll(),
            'produksi' => $this->produksi->orderBy('tanggal_mulai')->findAll(),
            'bahan_baku' => $this->bahan_baku->select('bahan_baku.*')->orderBy('tanggal')->findAll()

        ];
        
        // dd($data["bahan_baku"]);
        return view('dataProduksi', $data);
    }
    public function inputProduksi(){
        $data = [
            'bahan_baku' => $this->bahan_baku->orderBy('kode_barang', 'DESC')->findAll(),
            'pengadaan' => $this->pengadaan->orderBy('kode_pengadaan', 'DESC')->findAll(),
            'produksi' => $this->produksi->select('RIGHT(kode_produksi, 3)+1 AS kode_produksi')->orderBy('kode_produksi', 'desc')->findAll(1)
        ];
        if(empty($data['produksi'])){
            $data ['produksi']= 

            [
                0 => [
                    'kode_produksi' => 1
                    ]
            ];
        }
        
        return view('inputProduksi', $data);
    }

    public function simpanProduksi(){
        $post = $this->request->getPost(['kode_produksi', 'tanggal_mulai', 'tanggal_selesai','rencana_produksi', 'kode_barang','jumlah_barang', 'satuan']);
        $this->produksi->db->transStart();
        $this->produksi->insert([
            
            'kode_produksi'  => $post['kode_produksi'],
            'tanggal_mulai' => $post['tanggal_mulai'],
            'tanggal_selesai' => $post['tanggal_selesai'],
            'rencana_produksi'    => $post['rencana_produksi']
        ]);
        
        for ($i = 0; $i < count($post["kode_barang"]); $i++) {
            $maxJumlah = $this->bahan_baku->select('jumlah')->where('kode_barang', $post['kode_barang'][$i])->findall(1);
            if ($post['kode_barang'][$i] != "") 
            {
                $namaBarang = $this->bahan_baku->select('nama_barang')->where('kode_barang', $post['kode_barang'][$i])->findall(1);
                if((int)$post['jumlah_barang'][$i] <= (int)$maxJumlah[0]['jumlah']){
                    $this->detail_produksi->insert([
                        'kode_produksi' => $post['kode_produksi'],
                        'kode_barang' => $post['kode_barang'][$i],
                        'jumlah_barang' => $post['jumlah_barang'][$i],
                        'satuan' => $post['satuan'][$i],
                    ]);
                }else{
                    session()->setFlashdata('max', 'STOK' .$namaBarang[0]['nama_barang'] . 'TIDAK CUKUP');
                    return redirect()->back();
                }
            }
        }

        // dd($post);
        $data = $this->produksi->select('kode_produksi')->where('kode_produksi', $post['kode_produksi'])->findAll();
        session()->setFlashdata('sukses', 'Data  <strong>'.$data[0]['kode_produksi'].'</strong> Berhasil Di Input.');
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
    
        $post = $this->request->getPost(['id', 'kode_produksi','tanggal_mulai','tanggal_selesai', 'rencana_produksi', 'kode_barang', 'jumlah_barang', 'satuan']);
        // dd($post);
        $this->produksi->db->transStart();
        $this->produksi->where([
            // 'kode_pengadaan' => $post['kode_pengadaan'],
            'kode_produksi' => $post['kode_produksi'],
            
        ])->set([
            'jumlah_barang' => $post['jumlah_barang'],
            'tanggal_mulai' => $post['tanggal_mulai'],
            'tanggal_selesai' => $post['tanggal_selesai'],
            'rencana_produksi' => $post['rencana_produksi'],
            
        ])->update();

        for ($i = 0; $i < count($post["kode_barang"]); $i++) {
            if ($post['kode_barang'][$i] != "") {
                $this->detail_produksi->where([
                    'id' => $post['id'][$i],
                    'kode_produksi' => $post['kode_produksi'],
                    'kode_barang' => $post['kode_barang'][$i],
                    
                ])->set([
                    'jumlah_barang' => $post['jumlah_barang'][$i],
                    'satuan' => $post['satuan'][$i],
                ])->update();
            }
        }
        
        
        $this->produksi->db->transComplete();
        
        $data = $this->produksi->select('kode_produksi')->where('kode_produksi', $post['kode_produksi'])->findAll();
        session()->setFlashdata('sukses', 'Data  <strong>'.$data[0]['kode_produksi'].'</strong> Berhasil Diubah.');

        return redirect()->to("/data_produksi");
    }

    public function detailProduksi($kode_produksi)
    {
        $data = [
            'detail_produksi' => $this->detail_produksi->select('detail_produksi.*, bahan_baku.nama_barang')
            ->join('bahan_baku', 'detail_produksi.kode_barang = bahan_baku.kode_barang')->where('detail_produksi.kode_produksi', $kode_produksi)->findAll()
            // 'detail_produksi' => $this->detail_produksi->where(['kode_produksi' => $id])->get()->getResultArray(),
            // 'bahan_baku' => $this->bahan_baku->select('bahan_baku.*, detail_produksi.kode_barang')->join('detail_produksi', 'bahan_baku.kode_barang = detail_produksi.kode_barang')->findAll()
        ];
        // dd($data);
        return view('detailProduksi', $data);
    

    }

    public function deleteProduksi($kode_produksi)
    {
        $this->produksi->delete($kode_produksi);
        return redirect()->to("/data_produksi");
    }

}