<?php

namespace App\Models;

use CodeIgniter\Model;

class AsetModel extends Model
{
    protected $table      = 'aset';
    protected $primaryKey = 'kode_aset';

    protected $allowedFields = ['kode_aset' ,'tanggal', 'nama_aset', 'jumlah', 'jenis_aset'];
}
