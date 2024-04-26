<?php

namespace App\Models;

use CodeIgniter\Model;

class GajiUmumModel extends Model
{
    protected $table      = 'gaji_pegawai_umum';
    protected $primaryKey = 'kode_gaji';

    protected $allowedFields = ['kode_gaji' ,'jumlah_absensi', 'kode', 'total_gaji'];
}
