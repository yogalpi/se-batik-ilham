<?php

namespace App\Models;

use CodeIgniter\Model;

class GajiModel extends Model
{
    protected $table      = 'gaji';
    protected $primaryKey = 'kode_jenis';

    protected $allowedFields = ['kode_jenis', 'gaji'];
}
