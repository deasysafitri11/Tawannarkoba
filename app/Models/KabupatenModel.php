<?php

namespace App\Models;

use CodeIgniter\Model;

class KabupatenModel extends Model
{
    protected $table = 'kabupaten'; // Nama tabel di database
    protected $primaryKey = 'id_kabupaten'; // Primary key tabel
    protected $allowedFields = ['nama_kabupaten', 'latitude', 'longitude', 'created_at', 'updated_at']; // Kolom yang dapat diubah
}
