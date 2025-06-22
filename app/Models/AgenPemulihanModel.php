<?php

namespace App\Models;

use CodeIgniter\Model;

class AgenPemulihanModel extends Model
{
    protected $table = 'agenpemulihan'; // Nama tabel
    protected $primaryKey = 'id_agen'; // Primary key
    protected $protectFields = false;
}
