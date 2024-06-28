<?php

namespace App\Models;

use CodeIgniter\Model;

class PermintaanModel extends Model
{
    protected $table      = 'permintaan';
    protected $primaryKey = 'kode_permintaan';

    protected $allowedFields = ['kode_permintaan' , 'tanggal', 'keterangan', 'nominal', 'file','kode', 'status'];
}
