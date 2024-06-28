<?php

namespace App\Controllers;

use App\Models\DetailGudangJadiModel;
use App\Models\DetailPenjualanModel;
use App\Models\GudangJadiModel;
use App\Models\PenjualanModel;
use App\Models\PreSaleModel;
use Dompdf\Dompdf;

class KasirController extends BaseController
{
    protected $gudang_jadi;
    protected $detail_gudang_jadi;
    protected $penjualan;
    protected $detail_penjualan;
    protected $pre_sale;

    public function __construct()
    {
        $this->gudang_jadi          = new GudangJadiModel();
        $this->detail_gudang_jadi   = new DetailGudangJadiModel();
        $this->penjualan            = new PenjualanModel();
        $this->detail_penjualan     = new DetailPenjualanModel();
        $this->pre_sale             = new PreSaleModel();
    }

    public function index()
    {
        $lastPenjualan = $this->penjualan->orderBy("kode", "DESC")->first();
        $urut = explode("-", $lastPenjualan['kode']);
        $data = [
            'barang'    => $this->gudang_jadi
                ->join("detail_gudang_jadi", "detail_gudang_jadi.kode_gudang_jadi = gudang_jadi.kode")
                ->findAll(),
            'pre_sale'  => $this->pre_sale->where('kode_pengguna', session()->get('user')[0]['kode'])
                ->findAll(),
            'no_urut' => (int) $urut[1],
        ];


        return view("kasir", $data);
    }

    public function preSale()
    {
        $post = $this->request->getPost();

        if (empty($post['kode_penjualan']) || empty($post['items']) || empty($post['qty'])) {
            return redirect()->back()->withInput();
        }

        $items = explode("#", $post['items']);
        $barang = $this->gudang_jadi
            ->join("detail_gudang_jadi", "detail_gudang_jadi.kode_gudang_jadi = gudang_jadi.kode")
            ->where('detail_gudang_jadi.kode', $items[0])
            ->where('detail_gudang_jadi.ukuran', $items[1])
            ->first();

        if($post['qty'] > $barang['jumlah'] || $post['qty'] <= 0) {
            return redirect()->back()->withInput();
        }

        $this->pre_sale->insert([
            'kode'                      => $post['kode_penjualan'],
            'tanggal'                   => $post['tanggal'],
            'barang'                    => $barang['nama_pakaian'],
            'ukuran'                    => $barang['ukuran'],
            'qty'                       => $post['qty'],
            'harga'                     => $barang['harga'],
            'kode_pengguna'             => session()->get('user')[0]['kode'],
            'kode_detail_gudang_jadi'   => $barang['kode'],
        ]);

        return redirect()->back()->withInput();
    }

    public function deleteItem($id)
    {
        $this->pre_sale->where("id", $id)->delete();
        return redirect()->back()->withInput();
    }

    public function simpanTransaksi()
    {
        $db = \Config\Database::connect();
        $db->transBegin();
        
        try {
            $sale = $this->pre_sale->where([
                'kode_pengguna' => session()->get('user')[0]['kode']
            ])->findAll();

            $this->penjualan->insert([
                'kode'              => $sale[0]['kode'],
                'kode_tipe'         => 'OFF',
                'tanggal'           => $sale[0]['tanggal'],
                'kode_pelanggan'    => 'CUS-000',
                'status'            => 'Dikirim',
                'metode_pembayaran' => 'CASH',
                'jenis_pengiriman'  => 'Offline',
            ]);

            foreach ($sale as $value) {
                $this->detail_penjualan->insert([
                    'kode_penjualan'            => $value['kode'],
                    'kode_detail_gudang_jadi'   => $value['kode_detail_gudang_jadi'],
                    'ukuran'                    => $value['ukuran'],
                    'qty'                       => $value['qty'],
                    'harga'                     => $value['harga'],
                ]);

                $detail_gudang_jadi = $this->detail_gudang_jadi->where([
                    'kode'  => $value['kode_detail_gudang_jadi'],
                    'ukuran'    => $value['ukuran'],
                ])
                ->join("gudang_jadi", "gudang_jadi.kode = detail_gudang_jadi.kode_gudang_jadi")
                ->first();

                $this->detail_gudang_jadi->where([
                    'kode_gudang_jadi'  => $detail_gudang_jadi['kode_gudang_jadi'],
                    'kode'  => $value['kode_detail_gudang_jadi'],
                    'ukuran'    => $value['ukuran'],
                ])->set('jumlah', $detail_gudang_jadi['jumlah'] - $value['qty'])
                    ->update();
            }
            $this->pre_sale->where('kode_pengguna', session()->get('user')[0]['kode'])->delete();
            $db->transCommit();
        } catch (\Throwable $th) {
            $db->transRollback();
            $db->transComplete();
            return redirect()->back()->with('error', 'Gagal melakukan transaksi!');
        }
        $db->transComplete();
        return redirect()->back()->with('succes', 'Berhasil melakukan transaksi!');
    }

    public function laporanKasir()
    {
        $data = [
            'penjualan' => $this->detail_penjualan->join("penjualan", "penjualan.kode = detail_penjualan.kode_penjualan")
                ->join("detail_gudang_jadi", "detail_gudang_jadi.kode = detail_penjualan.kode_detail_gudang_jadi")
                ->join("gudang_jadi", "gudang_jadi.kode = detail_gudang_jadi.kode_gudang_jadi")
                ->orderBy("penjualan.tanggal")
                ->findAll()
        ];
        return view('dataPenjualan', $data);
    }

    public function exportLaporanKasir()
    {
        $dompdf = new Dompdf();
        $post = $this->request->getPost();
        $data = [
            'penjualan' => $this->detail_penjualan->join("penjualan", "penjualan.kode = detail_penjualan.kode_penjualan")
                ->join("detail_gudang_jadi", "detail_gudang_jadi.kode = detail_penjualan.kode_detail_gudang_jadi")
                ->join("gudang_jadi", "gudang_jadi.kode = detail_gudang_jadi.kode_gudang_jadi")
                ->where("penjualan.tanggal", $post['tanggal'])
                ->orderBy("penjualan.tanggal")
                ->orderBy("penjualan.kode")
                ->findAll(),
            'tanggal'   => $post['tanggal'],
        ];
        $html = view('laporanPenjualan', $data);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4');
        $dompdf->render();
        $dompdf->stream('laporanPenjualan', ['Attachment' => 0]);
    }
}
