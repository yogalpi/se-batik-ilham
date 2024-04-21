<?php

namespace App\Models;

use CodeIgniter\Model;

class KeuanganModel extends Model
{
    protected $table      = 'keuangan';
    protected $primaryKey = 'kode';
    protected $allowedFields = ['kode','tanggal' ,'status', 'jumlah', 'keterangan', 'kode_pengguna'];
}
