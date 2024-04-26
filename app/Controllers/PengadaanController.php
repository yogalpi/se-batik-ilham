<?php

namespace App\Controllers;

use App\Models\DetailPengadaanModel;
use App\Models\PengadaanModel;

class PengadaanController extends BaseController
{
    private $pengadaan, $detail_pengadaan;
    public function __construct()
    {
        $this->pengadaan = new PengadaanModel();
        $this->detail_pengadaan = new DetailPengadaanModel();
    }
    public function pengadaan()
    {

        return view('inputPengadaan');
    }
    public function dataPengadaan()
    {
        $data = [
            'pengadaan' => $this->pengadaan->findAll()
        ];
        return view('dataPengadaan', $data);
    }
    public function inputPengadaan()
    {
        return view('inputPengadaan');
    }

    public function simpanPengadaan()
    {
        $post = $this->request->getPost(['kode_pengadaan', 'kode_pengguna', 'tanggal', 'rencana_pengadaan', 'jenis', 'status', 'barang_kebutuhan', 'estimasi_pengeluaran', 'supplier']);
        $this->pengadaan->db->transStart();
        $this->pengadaan->insert([
            'kode_pengadaan' => $post['kode_pengadaan'],
            'kode_pengguna' => $post['kode_pengguna'],
            'tanggal' => $post['tanggal'],
            'rencana_pengadaan' => $post['rencana_pengadaan'],
            'jenis' => $post['jenis'],
            'status' => $post['status'],
        ]);
        for ($i = 0; $i < count($post["barang_kebutuhan"]); $i++) {
            if ($post['barang_kebutuhan'][$i] != "") {
                $this->detail_pengadaan->insert([
                    'kode_pengadaan' => $post['kode_pengadaan'],
                    'kebutuhan' => $post['barang_kebutuhan'][$i],
                    'biaya' => $post['estimasi_pengeluaran'][$i],
                    'kode_supplier' => $post['supplier'][$i],
                ]);
            }
        }
        $this->pengadaan->db->transComplete();
        return redirect()->to("/data_pengadaan");
    }

    public function detailPengadaan($id)
    {
        $data = [
            'detail_pengadaan' => $this->detail_pengadaan->where(['kode_pengadaan' => $id])->get()->getResultArray()
        ];
        return view('detailPengadaan', $data);

    }

    public function editPengadaan($kode_pengadaan)
    {
        $data = [
            // cara satu tabel
            // 'pengadaan' => $this->pengadaan->where("kode_pengadaan",$kode_pengadaan)->first()

            // cara dua tabel yaitu pake join
            'pengadaan' => $this->pengadaan->join("detail_pengadaan","detail_pengadaan.kode_pengadaan = pengadaan.kode_pengadaan")->where("pengadaan.kode_pengadaan",$kode_pengadaan)->findAll()

        ];
        // dd($data['pengadaan']);
        return view('editPengadaan', $data);
    }

    public function updatePengadaan()
    {
        $post = $this->request->getPost(['kode_pengadaan', 'kode_pengguna', 'tanggal', 'rencana_pengadaan', 'jenis', 'status', 'barang_kebutuhan', 'estimasi_pengeluaran', 'supplier']);
        $this->pengadaan->db->transStart();
        $this->pengadaan->where([
            'kode_pengadaan' => $post['kode_pengadaan'],
            // 'kode_pengguna' => $post['kode_pengguna'],
            
        ])->set([
            'tanggal' => $post['tanggal'],
            'rencana_pengadaan' => $post['rencana_pengadaan'],
            'jenis' => $post['jenis'],
            'status' => $post['status'],
        ])->update();
        
        for ($i = 0; $i < count($post["barang_kebutuhan"]); $i++) {
            if ($post['barang_kebutuhan'][$i] != "") {
                $this->detail_pengadaan->where([
                    'kode_pengadaan' => $post['kode_pengadaan'],
                    
                ])->set([
                    'kebutuhan' => $post['barang_kebutuhan'][$i],
                    'biaya' => $post['estimasi_pengeluaran'][$i],
                    'kode_supplier' => $post['supplier'][$i],
                ])->update();
            }
        }
        $this->pengadaan->db->transComplete();
        return redirect()->to("/data_pengadaan");
    }

}