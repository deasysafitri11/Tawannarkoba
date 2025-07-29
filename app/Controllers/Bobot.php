<?php

namespace App\Controllers;

use App\Models\BobotModel;

class Bobot extends BaseController
{
    protected $bobotModel;

    public function __construct()
    {
        $this->bobotModel = new BobotModel();
    }

    public function index()
    {
        $data['bobot'] = $this->bobotModel->findAll();
        return view('bobot/index', $data);
    }

    public function tambah()
    {
        return view('bobot/tambah');
    }

    public function simpan()
    {
        $this->bobotModel->save([
            'jenis' => $this->request->getPost('jenis'),
            'nilai' => $this->request->getPost('nilai')
        ]);

        return redirect()->to('/bobot');
    }

    public function edit()
    {
        $model = new \App\Models\BobotModel();

        // Ambil semua data bobot
        $data['bobot'] = [];
        foreach ($model->findAll() as $b) {
            $data['bobot'][strtolower($b['jenis'])] = $b['nilai'];
        }

        return view('bobot/edit', $data);
    }

    public function update()
    {
        $post = $this->request->getPost();

        // Ambil total
        $total = array_sum([
            $post['bandar'],
            $post['pengedar'],
            $post['pengguna'],
            $post['klien'],
            $post['kosthm']
        ]);

        if ($total != 100) {
            return redirect()->back()->with('msg', 'Total bobot harus 100%! Saat ini: ' . $total . '%');
        }

        // Simpan perubahan
        foreach (['bandar', 'pengedar', 'pengguna', 'klien', 'kosthm'] as $jenis) {
            $this->bobotModel->updateBobot($jenis, $post[$jenis]); // bisa juga pakai updateByJenis jika tidak pakai log
        }

        return redirect()->to('/bobot')->with('msg', 'Bobot berhasil diperbarui.');
    }
}