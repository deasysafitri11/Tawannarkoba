<?php

namespace App\Models;

use CodeIgniter\Model;

class KerawananModel extends Model
{
    protected $table = 'data_kerawanan';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'tahun', 'desa', 'bandar', 'pengedar', 'pengguna', 'klien', 'kosthm',
        'nilaikerawanan', 'kategori'
    ];
    protected $useTimestamps = false;
}