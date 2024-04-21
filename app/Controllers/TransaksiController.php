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
        $data = [
            'invoice' => $this->penjualan->select("penjualan.*, akun_pelanggan.*, penjualan.kode as kode_penjualan, sum((detail_penjualan.harga)*(detail_penjualan.qty)) as total")->join("akun_pelanggan", "akun_pelanggan.kode = penjualan.kode_pelanggan")->join("detail_penjualan", "detail_penjualan.kode_penjualan = penjualan.kode")->groupBy("kode_penjualan")->get()->getResultArray(),
        ];
        return view('invoicePenjualan', $data);
    }

    public function detailInvoice($id){
        $data = [
            'detail_penjualan' => $this->penjualan->select("penjualan.*, akun_pelanggan.*, penjualan.kode as kode_penjualan, sum((detail_penjualan.harga)*(detail_penjualan.qty)) as total")->join("akun_pelanggan", "akun_pelanggan.kode = penjualan.kode_pelanggan")->join("detail_penjualan", "detail_penjualan.kode_penjualan = penjualan.kode")->where("penjualan.kode", $id)->first(),
            'barang' => $this->detail_penjualan->select("detail_gudang_jadi.*, detail_penjualan.*, gudang_jadi.nama_pakaian")->join("detail_gudang_jadi", "detail_gudang_jadi.kode = detail_penjualan.kode_detail_gudang_jadi")->join("gudang_jadi", "gudang_jadi.kode = detail_gudang_jadi.kode_gudang_jadi")->where("kode_penjualan", $id)->get()->getResultArray(),
        ];
        return view('detailInvoicePenjualan', $data);
    }

    public function simpanStatus(){
        $post = $this->request->getPost(["kode_transaksi","status"]);
        $this->penjualan->where("kode", $post["kode_transaksi"])
        ->set("status", $post["status"])->update();
        return redirect()->to("/invoice");
    }
}