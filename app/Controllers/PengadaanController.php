<?php

namespace App\Controllers;


use App\Models\PengadaanModel;
use App\Models\SupplierModel;
use App\Models\PenggunaModel;
use App\Models\GudangBahanBakuModel;
use App\Models\PermintaanModel;
use CodeIgniter\I18n\Time;
class PengadaanController extends BaseController
{
    private $pengadaan, $detail_pengadaan, $supplier, $pengguna, $gudang_bahan, $permintaan;
    public function __construct()
    {
        $this->pengadaan = new PengadaanModel();
        $this->permintaan = new PermintaanModel();
        
        $this->supplier = new SupplierModel();
        $this->pengguna = new PenggunaModel();
        $this->gudang_bahan = new GudangBahanBakuModel();
    }
    public function pengadaan()
    {
        
        return view('inputPengadaan');
    }
    public function permintaan()
    {

        return view('inputPermintaan');
    }
    public function dataPengadaan()
    {
        $data = [
            'pengadaan' => $this->pengadaan->select('pengadaan.*, pengguna.nama as nama_pengguna,bahan_baku.nama_barang,supplier.nama as nama_supplier, (jumlah_barang * harga) as total_harga')
            ->join('pengguna', 'pengadaan.kode = pengguna.kode')->join('bahan_baku','pengadaan.kode_barang = bahan_baku.kode_barang ')->join('supplier','pengadaan.kode_supplier = supplier.kode_supplier')->orderBy('tanggal')->findAll(),
            // 'total_harga' => $this->pengadaan->select('harga*jumlah_barang as total_harga')
            // 'pengadaan' => $this->pengadaan->findAll()


            
        ];
        // dd($data);
        return view('dataPengadaan',$data);
    }
    public function dataPermintaan()
    {
        $data =[ 'permintaan' => $this->permintaan->select('permintaan.*')->where('kode',session()->get("user")[0]["kode"])->findAll()];
        return view('dataPermintaan',$data);
    }
    public function inputPengadaan()
    {
        $data = [

            'pengguna' => $this->pengguna->orderBy('kode', 'DESC')->findAll(),
            'gudang_bahan' => $this->gudang_bahan->orderBy('kode_barang', 'DESC')->findAll(),
            'supplier' => $this->supplier->orderBy('kode_supplier', 'DESC')->findAll(),
            'pengadaan' => $this->pengadaan->select('RIGHT(kode_pengadaan, 3)+1 AS kode_pengadaan')->orderBy('kode_pengadaan', 'desc')->findAll(1)
        ];

        if(empty($data['pengadaan'])){
            $data['pengadaan'] =
            [
                0 => [
                    'kode_pengadaan' => 1
                    ]
            ];
        }
        return view('inputPengadaan',$data );
    }
    public function inputPermintaan()
    {
        $data = [
            'hitungan'  => $this->permintaan->selectCount('kode_permintaan', 'hitung')->findAll(),
            'permintaan' => $this->permintaan->select('RIGHT(kode_permintaan, 3)+1 AS kode_permintaan')->orderBy('kode_permintaan', 'desc')->findAll(1)
        ];   
        if(empty($data['permintaan'])){
            $data ['permintaan']= 

            [
                0 => [
                    'kode_permintaan' => 1
                    ]
            ];
        }

        
        return view('inputPermintaan', $data);
    }

    public function simpanPengadaan()
    {
        
        $post = $this->request->getPost(['kode_pengadaan', 'kode', 'tanggal', 'kode_barang', 'jumlah_barang', 'satuan', 'harga', 'kode_supplier']);
        $this->pengadaan->db->transStart();
        $this->pengadaan->insert([
            'kode_pengadaan' => $post['kode_pengadaan'],
            'kode' => $post['kode'],
            'tanggal' => $post['tanggal'],
            'kode_barang' => $post['kode_barang'],
            'jumlah_barang' => $post['jumlah_barang'],
            'satuan' => $post['satuan'],
            'harga' => $post['harga'],
            'kode_supplier' => $post['kode_supplier'],
        ]);
        
        // dd($post);
        $this->pengadaan->db->transComplete();
        $data = $this->gudang_bahan->select('nama_barang')->where('kode_barang', $post['kode_barang'])->findAll();
        session()->setFlashdata('sukses', 'Data Pengadaan <strong>'.$data[0]['nama_barang'].'</strong> Berhasil Di Input.');
        return redirect()->to("/data_pengadaan");
    }
    public function simpanPermintaan()
    {
        $post = $this->request->getPost(['kode_permintaan', 'tanggal', 'keterangan', 'nominal', '']);
        
        $this->permintaan->insert([
            'kode_permintaan' => $post['kode_permintaan'],
            'tanggal' => $post['tanggal'],
            'keterangan' => $post['keterangan'],
            'nominal' => $post['nominal'],
            'file' => '-',
            'kode' => session()->get("user")[0]["kode"],
            'status' => 'PENDING',
        ]);
        
        // dd($post);
        $data = $this->permintaan->select('keterangan')->where('kode_permintaan', $post['kode_permintaan'])->findAll();
        session()->setFlashdata('sukses', 'Data Pengadaan <strong>'.$data[0]['keterangan'].'</strong> Berhasil Di Input.');
        return redirect()->to("/data_permintaan");
    }

    

    public function editPengadaan($kode_pengadaan)
    {
        $data = [
            // cara satu tabel
            'pengadaan' => $this->pengadaan->where("kode_pengadaan",$kode_pengadaan)->findAll(),
            'pengguna'  => $this->pengguna->findall(),
            'gudang_bahan'  => $this->gudang_bahan->findall(),
            'supplier'      => $this->supplier->findall()
            

            // cara dua tabel yaitu pake join
            // 'pengadaan' => $this->pengadaan->join("detail_pengadaan","detail_pengadaan.kode_pengadaan = pengadaan.kode_pengadaan")->where("pengadaan.kode_pengadaan",$kode_pengadaan)->findAll()

        ];
        // dd($data);
        return view('editPengadaan', $data);
        
    }

    public function updatePengadaan()
    {
        $post = $this->request->getPost(['kode_pengadaan', 'kode', 'tanggal', 'kode_barang', 'jumlah_barang', 'satuan', 'harga', 'kode_supplier']);
        $this->pengadaan->db->transStart();
        $this->pengadaan->where([
            'kode_pengadaan' => $post['kode_pengadaan'],
            // 'kode_pengguna' => $post['kode_pengguna'],
            
        ])->set([
            'tanggal' => $post['tanggal'],
            'kode' => $post['kode'],
            'kode_barang' => $post['kode_barang'],
            'jumlah_barang' => $post['jumlah_barang'],
            'satuan' => $post['satuan'],
            'harga' => $post['harga'],
            'kode_supplier' => $post['kode_supplier'],
        ])->update();
        
        
        $this->pengadaan->db->transComplete();

        $data = $this->gudang_bahan->select('nama_barang')->where('kode_barang', $post['kode_barang'])->findAll();
        session()->setFlashdata('sukses', 'Data Pengadaan <strong>'.$data[0]['nama_barang'].'</strong> Berhasil Diubah.');

        // dd($post['barang_kebutuhan'][0]);

        return redirect()->to("/data_pengadaan");
    }

    public function deletePengadaan($kode_pengadaan)
    {
        $this->pengadaan->delete($kode_pengadaan);
        return redirect()->to("/data_pengadaan");
    }

    

}