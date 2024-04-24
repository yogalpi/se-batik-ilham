<?php

namespace App\Models;

use CodeIgniter\Model;

class GudangJadiModel extends Model
{
    protected $table      = 'gudang_jadi';
    protected $primaryKey = 'kode';

    protected $allowedFields = ['kode_produksi' ,'kode', 'nama_pakaian'];
}
