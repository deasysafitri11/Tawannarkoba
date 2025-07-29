<?php

namespace App\Controllers;

use App\Models\TempatkosModel;
use App\Models\KelurahanModel;

class Tempatkos extends BaseController
{
    public function index()
{
    return $this->tampil();
}


    public function tampil()
    {
        $tempatkos = new TempatkosModel();

        // Mengambil semua data di tabel `tempat kos
        $data['query'] = $tempatkos->join('kelurahan', 'tempatkos.id_kelurahan = kelurahan.id_kelurahan', 'left')
                                     ->select('tempatkos.*')
                                     ->select('kelurahan.nama_kelurahan')
                                     ->findAll();

        // Mengambil nilai variabel msg pada session flashdata
        $data['msg'] = session()->getFlashdata('msg');

        // Memanggil file view tampil
        echo view('tempatkos/tampil', $data);
    }

    public function tambah()
    {
        $kelurahan = new KelurahanModel();

        // Mengambil semua data di tabel `kelurahan`
        $data['kelurahan'] = $kelurahan->findAll();

        // Mengambil nilai variabel msg pada session flashdata
        $data['msg'] = session()->getFlashdata('msg');

        // Memanggil view form tambah
        return view('tempatkos/tambah', $data);
    }

    public function simpan()
    {
        $tempatkos = new TempatkosModel();

        // Menyimpan data ke dalam array untuk dimasukkan ke tabel
        $data_tempatkos = [
            'namakos'              => $this->request->getVar('namakos'),
            'alamat'             => $this->request->getVar('alamat'),
            'id_kelurahan'  => $this->request->getVar('id_kelurahan'),
            'jumlahkamar'        => $this->request->getVar('jumlahkamar'),
            'keterangan'        => $this->request->getVar('keterangan'),
        ];

        // Menggunakan query builder untuk insert data
        $tempatkos->insert($data_tempatkos);

        // Mengatur pesan flashdata berdasarkan hasil operasi
        if ($tempatkos->affectedRows() > 0) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil disimpan!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>';
        }

        session()->setFlashdata('msg', $msg);
        return redirect()->to('tempatkos');
    }

    public function edit($id)
    {
        $tempatkos = new TempatkosModel();
        $kelurahan = new KelurahanModel();

        // Mengambil semua data di tabel `kelurahan`
        $data['kelurahan'] = $kelurahan->findAll();

        // Mengambil data berdasarkan id
        $data['query'] = $tempatkos->find($id);
        $data['id'] = $id; // Untuk keperluan update

        // Memanggil view form edit
        return view('tempatkos/edit', $data);
    }

    public function update($id)
    {
        $tempatkos = new TempatkosModel();

        // Menyimpan data yang diupdate
        $data_tempatkos = [
            'namakos'              => $this->request->getVar('alamat'),
            'alamat'             => $this->request->getVar('peserta'),
            'id_kelurahan'  => $this->request->getVar('tempat_sosialisasi'),
            'id_kelurahan'        => $this->request->getVar('id_kelurahan'),
        ];

        // Menggunakan query builder untuk update data
        $tempatkos->update($id, $data_tempatkos);

        if ($tempatkos->affectedRows() > 0) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil diupdate!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal diupdate!</div>';
        }

        session()->setFlashdata('msg', $msg);
        return redirect()->to('tempatkos');
    }

    public function hapus($id)
    {
        $tempatkos = new TempatkosModel();

        // Menghapus data berdasarkan id
        $tempatkos->delete($id);

        if ($tempatkos->affectedRows() > 0) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil dihapus!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal dihapus!</div>';
        }

        session()->setFlashdata('msg', $msg);
        return redirect()->to('tempatkos');
    }
}
