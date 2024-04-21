<?php

namespace App\Models;

use CodeIgniter\Model;

class ProduksiModel extends Model
{
    protected $table      = 'produksi';
    protected $primaryKey = 'kode_produksi';

    protected $allowedFields = ['kode_pengadaan' ,'kode_produksi', 'tanggal_mulai', 'tanggal_selesai', 'status'];
}
