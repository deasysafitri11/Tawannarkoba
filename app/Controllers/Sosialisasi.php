<?php

namespace App\Controllers;

use App\Models\SosialisasiModel;
use App\Models\KelurahanModel;

class Sosialisasi extends BaseController
{
    public function index()
    {
        $this->tampil(); // Memanggil method tampil
    }

    public function tampil()
    {
        $sosialisasi = new SosialisasiModel();

        // Mengambil semua data di tabel `sosialisasi`
        $data['query'] = $sosialisasi->join('kelurahan', 'sosialisasi.id_kelurahan = kelurahan.id_kelurahan', 'left')
                                     ->select('sosialisasi.*')
                                     ->select('kelurahan.nama_kelurahan')
                                     ->findAll();

        // Mengambil nilai variabel msg pada session flashdata
        $data['msg'] = session()->getFlashdata('msg');

        // Memanggil file view tampil
        echo view('sosialisasi/tampil', $data);
    }

    public function tambah()
    {
        $kelurahan = new KelurahanModel();

        // Mengambil semua data di tabel `kelurahan`
        $data['kelurahan'] = $kelurahan->findAll();

        // Mengambil nilai variabel msg pada session flashdata
        $data['msg'] = session()->getFlashdata('msg');

        // Memanggil view form tambah
        return view('sosialisasi/tambah', $data);
    }

    public function simpan()
    {
        $sosialisasi = new SosialisasiModel();

        // Menyimpan data ke dalam array untuk dimasukkan ke tabel
        $data_sosialisasi = [
            'alamat'              => $this->request->getVar('alamat'),
            'peserta'             => $this->request->getVar('peserta'),
            'tempat_sosialisasi'  => $this->request->getVar('tempat_sosialisasi'),
            'id_kelurahan'        => $this->request->getVar('id_kelurahan'),
        ];

        // Menggunakan query builder untuk insert data
        $sosialisasi->insert($data_sosialisasi);

        // Mengatur pesan flashdata berdasarkan hasil operasi
        if ($sosialisasi->affectedRows() > 0) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil disimpan!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>';
        }

        session()->setFlashdata('msg', $msg);
        return redirect()->to('sosialisasi');
    }

    public function edit($id)
    {
        $sosialisasi = new SosialisasiModel();
        $kelurahan = new KelurahanModel();

        // Mengambil semua data di tabel `kelurahan`
        $data['kelurahan'] = $kelurahan->findAll();

        // Mengambil data berdasarkan id
        $data['query'] = $sosialisasi->find($id);
        $data['id'] = $id; // Untuk keperluan update

        // Memanggil view form edit
        return view('sosialisasi/edit', $data);
    }

    public function update($id)
    {
        $sosialisasi = new SosialisasiModel();

        // Menyimpan data yang diupdate
        $data_sosialisasi = [
            'alamat'              => $this->request->getVar('alamat'),
            'peserta'             => $this->request->getVar('peserta'),
            'tempat_sosialisasi'  => $this->request->getVar('tempat_sosialisasi'),
            'id_kelurahan'        => $this->request->getVar('id_kelurahan'),
        ];

        // Menggunakan query builder untuk update data
        $sosialisasi->update($id, $data_sosialisasi);

        if ($sosialisasi->affectedRows() > 0) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil diupdate!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal diupdate!</div>';
        }

        session()->setFlashdata('msg', $msg);
        return redirect()->to('sosialisasi');
    }

    public function hapus($id)
    {
        $sosialisasi = new SosialisasiModel();

        // Menghapus data berdasarkan id
        $sosialisasi->delete($id);

        if ($sosialisasi->affectedRows() > 0) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil dihapus!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal dihapus!</div>';
        }

        session()->setFlashdata('msg', $msg);
        return redirect()->to('sosialisasi');
    }
}
