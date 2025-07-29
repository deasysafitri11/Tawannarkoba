<?php
// app/Controllers/SearchController.php
namespace App\Controllers;

use App\Models\UserModel;
use App\Models\KelurahanModel;
use App\Models\UngkapKasusModel;

class SearchController extends BaseController
{
    public function index()
    {
        $keyword = $this->request->getPost('query');

        // Pencarian di tabel users
        $userModel = new UserModel();
        $users = $userModel->like('username', $keyword)
                           ->orLike('nama', $keyword)
                           ->findAll();

        // Pencarian di tabel kelurahan
        $kelurahanModel = new KelurahanModel();
        $kelurahans = $kelurahanModel->like('nama_kelurahan', $keyword)->findAll();

        // Pencarian di tabel ungkap_kasus (gunakan kolom BB sebagai jenis narkotika)
        $kasusModel = new UngkapKasusModel();
        $kasus = $kasusModel->like('BB', $keyword)->findAll();

        $data = [
            'users' => $users,
            'kelurahans' => $kelurahans,
            'kasus' => $kasus,
            'keyword' => $keyword
        ];

        return view('search/result', $data);
    }
}
