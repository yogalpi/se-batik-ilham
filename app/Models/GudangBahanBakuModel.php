<?php

namespace App\Models;

use CodeIgniter\Model;

class GudangBahanBakuModel extends Model
{
    protected $table      = 'bahan_baku';
    protected $primaryKey = 'kode_barang';

    protected $allowedFields = ['kode_barang' , 'nama_barang', 'jumlah', 'satuan', 'keterangan', 'tanggal'];
}
