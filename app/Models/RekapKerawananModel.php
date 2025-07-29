<?php

namespace App\Models;

use CodeIgniter\Model;

class RekapKerawananModel extends Model
{
    protected $table = 'rekap_kerawanan_kelurahan';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_kelurahan', 'tahun', 'jml_kasus', 'jml_pengedar', 'barang_bukti',
        'jml_bandar', 'jml_pengguna', 'jml_hiburan', 'jml_kos', 'tingkat_kerawanan',
        'created_at', 'updated_at'
    ];
    protected $useTimestamps = true;
}
