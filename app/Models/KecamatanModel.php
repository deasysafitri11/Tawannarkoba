<?php

namespace App\Models;

use CodeIgniter\Model;

class KecamatanModel extends Model
{
    // Nama tabel di database
    protected $table = 'kecamatan';

    // Primary key tabel
    protected $primaryKey = 'id_kecamatan';

    // Tipe data yang dikembalikan (array atau object)
    protected $returnType = 'object';

    // Fitur soft deletes tidak digunakan
    protected $useSoftDeletes = false;

    // Primary key menggunakan auto-increment
    protected $useAutoIncrement = true;

    // Kolom yang boleh diisi (insert/update)
    protected $allowedFields = [
       'id_kecamatan', 'id_kabupaten', 'nama_kecamatan', 'latitude', 'longitude'
    ];

    // Fitur validasi dinonaktifkan
    protected $skipValidation = true;

    // Fitur created_at dan updated_at otomatis
    protected $useTimestamps = true;

    // Mengambil semua data kecamatan
    public function getKecamatan()
    {
        $this->join('kabupaten', 'kecamatan.id_kabupaten=kabupaten.id_kabupaten','LEFT');
        $this->select('kecamatan.*');
        $this->select('kabupaten.nama_kabupaten');
        return $this->findAll();
    }

    // Mengambil data kecamatan berdasarkan ID
    public function getKecamatanById($id)
    {
        return $this->where('id_kecamatan', $id)->first();
    }
}
