<?php
namespace App\Models;

use CodeIgniter\Model;

class BobotLogModel extends Model
{
    protected $table = 'log_bobot'; // <- pastikan ini sesuai nama tabel yang kamu buat
    protected $primaryKey = 'id';
    protected $allowedFields = ['jenis', 'nilai_lama', 'nilai_baru', 'user', 'created_at'];
    public $timestamps = false; // karena kita pakai created_at manual default
}