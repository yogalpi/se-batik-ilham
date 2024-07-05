<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailGudangJadiModel extends Model
{
    protected $table      = 'detail_gudang_jadi';
    protected $primaryKey = 'kode';
    protected $allowedFields = ['kode', 'kode_gudang_jadi', 'ukuran', 'jumlah', 'harga'];
}
