<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailProduksiModel extends Model
{
    protected $table      = 'detail_produksi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','kode_produksi' ,'kode_barang', 'jumlah_barang', 'satuan'];
}
