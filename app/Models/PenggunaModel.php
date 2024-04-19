<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
    protected $table      = 'pengguna';
    protected $primaryKey = 'kode';

    // protected $allowedFields = ['*'];

    function GetDataPengguna($username, $password){
        return $this->where("username", $username)->where("password", $password)->find();
    }

}