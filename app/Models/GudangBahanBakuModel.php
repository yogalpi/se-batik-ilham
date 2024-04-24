<?php

namespace App\Models;

use CodeIgniter\Model;

class GudangBahanBakuModel extends Model
{
    protected $table      = 'bahan_baku';
    protected $primaryKey = 'kode_barang';

    protected $allowedFields = ['kode_barang' ,'kode_produksi', 'nama_barang', 'jumlah', 'jenis', 'keterangan', 'tanggal'];
}
