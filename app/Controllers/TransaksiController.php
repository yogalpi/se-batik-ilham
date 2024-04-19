<?php

namespace App\Controllers;
use App\Models\PenggunaModel;

class TransaksiController extends BaseController
{
    public function transaksi(){
        return view('transaksiPenjualan');
    }

    public function detailTransaksi($id){
        return view('detailTransaksiPenjualan');
    }

    public function invoice(){
        return view('invoicePenjualan');
    }

    public function detailInvoice($id){
        return view('detailInvoicePenjualan');
    }

}