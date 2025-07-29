<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $returnType = 'array';
    protected $useAutoIncrement = false;

    protected $allowedFields = ['username', 'password_hash', 'nama', 'hak_akses', 'no_hp', 'is_active'];
}
