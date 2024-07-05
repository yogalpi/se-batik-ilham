<?php

namespace App\Controllers;

use App\Models\DetailGudangJadiModel;
use App\Models\GudangJadiModel;
use App\Models\ProduksiModel;

class GudangJadiController extends BaseController
{
    protected $produksi;
    protected $gudang_jadi, $detail_gudang_jadi;
    public function __construct()
    {
        $this->produksi = new ProduksiModel();
        $this->gudang_jadi = new GudangJadiModel();
        $this->detail_gudang_jadi = new DetailGudangJadiModel();
    }

    public function dataGudangJadi()
    {
        $data = [
            'gudang_jadi' => $this->gudang_jadi->findAll(),
        ];
        return view('dataGudangJadi', $data);
    }
    public function inputGudangJadi()
    {
        $data = [
            'produksi' => $this->produksi->findAll()
        ];
        return view('inputGudangJadi', $data);
    }

    public function simpanGudangJadi()
    {
        $post = $this->request->getPost(['kode', 'kode_barang', 'kode_produksi', 'nama_barang', 'ukuran', 'jumlah', 'harga']);
        $this->gudang_jadi->db->transStart();
        $this->gudang_jadi->insert([
            'kode_produksi' => $post["kode_produksi"],
            'kode' => $post["kode_barang"],
            'nama_pakaian' => $post["nama_barang"]
        ]);
        for ($i = 0; $i < count($post["ukuran"]); $i++) {
            $this->detail_gudang_jadi->insert([
                'kode_gudang_jadi' => $post["kode_barang"],
                // 'kode' => $post["kode"][$i],
                'ukuran' => $post["ukuran"][$i],
                'jumlah' => $post["jumlah"][$i],
                'harga' => $post["harga"][$i]
            ]);
        }
        $this->gudang_jadi->db->transComplete();
        return redirect()->to("/data_gudang_jadi");
    }

    public function detailGudangJadi($id)
    {
        $data = [
            'detail_gudang_jadi' => $this->gudang_jadi->join("detail_gudang_jadi", "detail_gudang_jadi.kode_gudang_jadi = gudang_jadi.kode")->where("gudang_jadi.kode", $id)->findAll()
        ];
        return view('detailGudangJadi', $data);
    }

    public function editGudangJadi($id)
    {
        $data = [
            'produksi' => $this->produksi->findAll(),
            'detail_gudang_jadi' => $this->gudang_jadi->join("detail_gudang_jadi", "detail_gudang_jadi.kode_gudang_jadi = gudang_jadi.kode")->where("gudang_jadi.kode", $id)->findAll()
        ];
        return view('editGudangJadi', $data);
    }

    public function deleteItemGudangJadi($kode, $ukuran)
    {
        $this->detail_gudang_jadi->where([
            'kode' => $kode,
            'ukuran' => $ukuran
        ])->delete();
        return redirect()->to("/edit_gudang_jadi/{$kode}");
    }

    public function updateGudangJadi()
    {
        $post = $this->request->getPost(['kode', 'kode_barang', 'kode_produksi', 'nama_barang', 'ukuran', 'jumlah', 'harga']);
        $this->gudang_jadi->db->transStart();

        $this->gudang_jadi->where([
            'kode_produksi' => $post["kode_produksi"],
            'kode' => $post["kode_barang"],
        ])->set([
            'nama_pakaian' => $post["nama_barang"]
        ])->update();

        for ($i = 0; $i < count($post["ukuran"]); $i++) {
            $isExist = $this->detail_gudang_jadi->where([
                'kode_gudang_jadi' => $post["kode_barang"],
                // 'kode' => $post["kode"][$i],
                'ukuran' => $post["ukuran"][$i],
            ])->first();

            if ($isExist != null) {
                $this->detail_gudang_jadi->where([
                    'kode_gudang_jadi' => $post["kode_barang"],
                    'kode' => $post["kode"][$i],
                    'ukuran' => $post["ukuran"][$i],
                ])->set([
                    'jumlah' => $post["jumlah"][$i],
                    'harga' => $post["harga"][$i]
                ])->update();
            } else {
                $this->detail_gudang_jadi->insert([
                    'kode_gudang_jadi' => $post["kode_barang"],
                    // 'kode' => $post["kode"][$i],
                    'ukuran' => $post["ukuran"][$i],
                    'jumlah' => $post["jumlah"][$i],
                    'harga' => $post["harga"][$i]
                ]);
            }
        }

        $this->gudang_jadi->db->transComplete();
        return redirect()->to("/edit_gudang_jadi/{$post['kode_barang']}");
    }

    public function deleteGudangJadi($kode)
    {
        $this->gudang_jadi->where([
            'kode' => $kode,
        ])->delete();
        return redirect()->to("/data_gudang_jadi");
    }

    public function hapusItem($kode, $ukuran)
    {
        $this->detail_gudang_jadi->where([
            'kode' => $kode,
            'ukuran'    => $ukuran
        ])->delete();
        return redirect()->back();
    }
}
