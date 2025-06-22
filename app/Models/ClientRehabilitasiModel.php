<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientRehabilitasiModel extends Model
{
    protected $table = 'clientrehabilitasi'; // Nama tabel
    protected $primaryKey = 'id_klien'; // Primary key
    protected $protectFields = false;
     // Kolom yang boleh diisi
}
