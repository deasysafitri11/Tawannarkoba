<?php

namespace App\Models;

use CodeIgniter\Model;

class RtsModel extends Model
{
    protected $table = 'rts'; // Nama tabel di database
    protected $primaryKey = 'id_rts'; // Primary key tabel
    protected $protectFields = false;
}
