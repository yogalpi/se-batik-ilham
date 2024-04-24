<?php

namespace App\Models;

use CodeIgniter\Model;

class GajiProduksiModel extends Model
{
    protected $table      = 'gaji_pegawai_produksi';
    protected $primaryKey = 'kode_gaji';

    protected $allowedFields = ['kode_gaji' ,'jumlah_produksi', 'kode', 'kode_produksi', 'total_gaji'];
}