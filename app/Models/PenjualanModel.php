<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualanModel extends Model
{
    protected $table      = 'penjualan';
    protected $primaryKey = 'kode';

    protected $allowedFields = ['kode' ,'kode_tipe', 'tanggal'];
}
