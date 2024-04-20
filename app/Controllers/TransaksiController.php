<?php

namespace App\Controllers;
use App\Models\PenjualanModel;
use App\Models\DetailPenjualanModel;

class TransaksiController extends BaseController
{
    protected $penjualan, $detail_penjualan;
    public function __construct()
    {
        $this->penjualan = new PenjualanModel();
        $this->detail_penjualan = new DetailPenjualanModel();
    }

    public function transaksi(){
        $data = [
            'transaksi' => $this->detail_penjualan->select("penjualan.*, tipe.keterangan, sum(detail_penjualan.harga) as total_harga")->join("penjualan", "kode_penjualan = penjualan.kode")->join("tipe", "penjualan.kode_tipe = tipe.kode")->groupBy("kode_penjualan")->get()->getResultArray(),
        ];
        return view('transaksiPenjualan', $data);
    }

    public function detailTransaksi($id){
        $data = [
            'detail_transaksi' => $this->detail_penjualan->select("detail_gudang_jadi.*, detail_penjualan.*, gudang_jadi.nama_pakaian")->join("detail_gudang_jadi", "detail_gudang_jadi.kode = detail_penjualan.kode_detail_gudang_jadi")->join("gudang_jadi", "gudang_jadi.kode = detail_gudang_jadi.kode_gudang_jadi")->where("kode_penjualan", $id)->get()->getResultArray(),
        ];
        return view('detailTransaksiPenjualan', $data);
    }

    public function invoice(){
        return view('invoicePenjualan');
    }

    public function detailInvoice($id){
        return view('detailInvoicePenjualan');
    }

}