<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanModel extends Model
{
    protected $table      = 'todo';
    protected $allowedFields = ['nomor', 'kegiatan', 'status', 'kode'];
}
