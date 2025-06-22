<?php

namespace App\Models;

use CodeIgniter\Model;

class SosialisasiModel extends Model
{
    protected $table = 'sosialisasi';
    // protected $primaryKey = 'id_kasus'; // Sesuaikan dengan nama kolom primary key
    protected $allowedFields = [
        'alamat','peserta', 'tempat_sosialisasi', 'id_kelurahan'
    ];
}
