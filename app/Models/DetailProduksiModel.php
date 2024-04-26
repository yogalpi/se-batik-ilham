<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailProduksiModel extends Model
{
    protected $table      = 'detail_produksi';
    protected $allowedFields = ['kode_produksi' ,'jenis_baju', 'ukuran'];
}
