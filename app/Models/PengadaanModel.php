<?php

namespace App\Models;

use CodeIgniter\Model;

class PengadaanModel extends Model
{
    protected $table      = 'pengadaan';
    protected $primaryKey = 'kode_pengadaan';

    protected $allowedFields = ['kode_pengadaan' ,'kode_pengguna', 'tanggal', 'rencana_pengadaan', 'jenis','status'];
}
