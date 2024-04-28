<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    protected $table      = 'supplier';
    protected $primaryKey = 'kode_supplier';

    protected $allowedFields = ['kode_supplier' ,'nama', 'alamat', 'nomor_hp'];
}
