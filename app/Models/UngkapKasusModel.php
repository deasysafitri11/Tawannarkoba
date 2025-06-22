<?php

namespace App\Models;

use CodeIgniter\Model;

class UngkapKasusModel extends Model
{
    protected $table = 'ungkap_kasus';
    protected $primaryKey = 'id_kasus'; // Sesuaikan dengan nama kolom primary key
    protected $allowedFields = [
        'id_kasus','Nama', 'JK', 'Umur', 'golonganumur', 'Pekerjaan',
        'BB', 'JmlBB', 'Satuan', 'MO', 'Tahun', 'id_kelurahan', 'Jam', 'TKP'
    ];
}
