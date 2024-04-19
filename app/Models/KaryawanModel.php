<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table      = 'karyawan';
    protected $primaryKey = 'kode';

    protected $allowedFields = ['kode' ,'tanggal', 'nama', 'alamat', 'jenis_kelamin', 'kode_jenis'];
}
