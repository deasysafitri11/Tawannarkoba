<?php

namespace App\Models;

use CodeIgniter\Model;

class DesaBersinarModel extends Model
{
    // Nama tabel di database
    protected $table = 'desa_bersinar';

    // Primary key tabel
    protected $primaryKey = 'id_desa_bersinar';

    // Tipe data yang dikembalikan (array atau object)
    protected $returnType = 'object';

    // Fitur soft deletes tidak digunakan
    protected $useSoftDeletes = false;

    // Primary key tidak menggunakan auto-increment
    protected $useAutoIncrement = false;

    // Kolom yang boleh diisi (insert/update)
    protected $protectFields = false;

    // Fitur validasi dinonaktifkan
    protected $skipValidation = true;

    // Fitur created_at dan updated_at otomatis dinonaktifkan
    protected $useTimestamps = false;

   
}
