<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailPenjualanModel extends Model
{
    protected $table      = 'detail_penjualan';
    protected $allowedFields = ['kode_penjualan' ,'kode_detail_gudang_jadi', 'qty'];
}
