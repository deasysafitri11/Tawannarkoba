<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggiatModel extends Model
{
    protected $table = 'penggiat'; // Nama tabel di database
    protected $primaryKey = 'id_penggiat'; // Primary key tabel
    protected $protectFields = false;
}
