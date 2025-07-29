<?php

namespace App\Controllers;

use App\Models\RekapKerawananModel;
use App\Models\KelurahanModel;

class RekapKerawanan extends BaseController
{
    public function index()
    {
        $rekapModel = new RekapKerawananModel();
        $kelurahanModel = new KelurahanModel();

        $rekapData = $rekapModel->findAll();

        // Ambil data nama kelurahan sekaligus
        foreach ($rekapData as &$row) {
            $kelurahan = $kelurahanModel->getKelurahanById($row['id_kelurahan']);
            $row['nama_kelurahan'] = $kelurahan ? $kelurahan->nama_kelurahan : 'Tidak Diketahui';
        }

        $data['rekap'] = $rekapData;

        return view('rekapkerawanan/index', $data);
    }
}
