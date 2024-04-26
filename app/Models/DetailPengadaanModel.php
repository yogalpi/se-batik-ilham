<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailPengadaanModel extends Model
{
    protected $table      = 'detail_pengadaan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'kode_pengadaan' ,'kebutuhan', 'biaya', 'kode_supplier'];
}
