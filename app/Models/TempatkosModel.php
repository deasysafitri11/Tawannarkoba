<?php

namespace App\Models;

use CodeIgniter\Model;

class TempatkosModel extends Model
{
    protected $table = 'tempatkos'; // nama tabel di database
    protected $primaryKey = 'id'; // sesuaikan dengan primary key-mu

    protected $allowedFields = ['namakos', 'alamat', 'id_kelurahan', 'jumlahkamar', 'keterangan'];
}
