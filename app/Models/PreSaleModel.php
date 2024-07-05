<?php

namespace App\Models;

use CodeIgniter\Model;

class PreSaleModel extends Model
{
    protected $table      = 'pre-sale';
    protected $allowedFields = ['id', 'kode' ,'tanggal', 'barang', 'ukuran', 'qty', 'harga', 'kode_pengguna', 'kode_detail_gudang_jadi'];
}
