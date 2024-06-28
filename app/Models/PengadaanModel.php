<?php

namespace App\Models;

use CodeIgniter\Model;

class PengadaanModel extends Model
{
    protected $table      = 'pengadaan';
    protected $primaryKey = 'kode_pengadaan';

    protected $allowedFields = ['kode_pengadaan' ,'kode', 'tanggal', 'kode_barang','jumlah_barang', 'satuan','harga','kode_supplier'];
}
