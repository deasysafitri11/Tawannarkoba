<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    // Nama tabel di database
    protected $table = 'user';

    // Primary key tabel
    protected $primaryKey = 'id_user';

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

    // Mengambil semua data kelurahan
    public function getKelurahan()
    {
        return $this->findAll();
    }

    // Mengambil data kelurahan berdasarkan ID
    public function getKelurahanById($id)
    {
        return $this->where('id_kelurahan', $id)->first();
    }
}
