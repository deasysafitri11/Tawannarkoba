<?php

namespace App\Controllers;

use App\Models\KecamatanModel;
use App\Models\KelurahanModel;


class Kelurahan extends BaseController
{
    // Fungsi default saat membuka halaman Kelurahan
    public function index()
    {
         $this->tampil(); // Alihkan ke fungsi tampil
    }

    // Fungsi untuk menampilkan data Kelurahan
    public function tampil()
    {
        $kelurahan = new KelurahanModel();
        $data['query'] = $kelurahan->join('kecamatan', 'kelurahan.id_kecamatan=kecamatan.id_kecamatan','LEFT')
        ->select('kelurahan.*')->select('kecamatan.nama_kecamatan')->findAll(); // Ambil semua data dari tabel Kelurahan
        $data['msg'] = session()->getFlashdata('msg'); // Ambil pesan flashdata (jika ada)
        echo view('kelurahan/tampil', $data); // Tampilkan view dengan data yang diambil
    }
    // Fungsi untuk menambahkan data Kelurahan
    public function tambah()
    {
        $kecamatan = new KecamatanModel();
        $data['kecamatan'] = $kecamatan->findAll(); // Kirim data Kecamatan ke view
        return view('kelurahan/tambah', $data); // Tampilkan form tambah
    }

    // Fungsi untuk menyimpan data Kelurahan ke database
    public function simpan()
    {
        $kelurahan = new KelurahanModel();
        $data_kelurahan = [
            'id_kelurahan' => $this->request->getVar('id_kelurahan'),
            'id_kecamatan' => $this->request->getVar('id_kecamatan'),
            'nama_kelurahan' => $this->request->getVar('nama_kelurahan'),
            'pic' => $this->request->getVar('pic')
        ];

        // Simpan data ke database
        $kelurahan->insert($data_kelurahan);
        if ($kelurahan->affectedRows() > 0) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil disimpan!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>';
        }
        session()->setFlashdata('msg', $msg);
        return redirect()->to('kelurahan'); 

    }

    // Fungsi untuk menampilkan form edit
    public function edit($id_kelurahan)
    {
        $kecamatan = new KecamatanModel();
        $data['kecamatan'] = $kecamatan->findAll(); // Ambil data Kecamatan
        $kelurahan = new KelurahanModel();
        $data['query'] = $kelurahan->find($id_kelurahan); // Ambil data Kelurahan berdasarkan ID
        $data['id'] = $id_kelurahan;
        return view('kelurahan/edit', $data); // Tampilkan form edit
    }

    // Fungsi untuk memperbarui data Kelurahan
    public function update()
    {
        $kelurahan = new KelurahanModel();
        $id = $this->request->getVar('id_kelurahan'); // Ambil ID dari form
        $data_kelurahan = [
            'id_kecamatan' => $this->request->getVar('id_kecamatan'),
            'nama_kelurahan' => $this->request->getVar('nama_kelurahan'),
            'pic' => $this->request->getVar('pic')
        ];

        // Update data di database
        if ($kelurahan->update($id, $data_kelurahan)) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil diperbarui!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal diperbarui!</div>';
        }

        // Simpan pesan flashdata
        session()->setFlashdata('msg', $msg);
        // Redirect ke halaman tampil
        return redirect()->to('kelurahan');
    }

    // Fungsi untuk menghapus data Kelurahan
    public function hapus($id_kelurahan)
    {
        $kelurahan = new KelurahanModel();
        // Hapus data berdasarkan ID
        if ($kelurahan->delete(['id_kelurahan' => $id_kelurahan])) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil dihapus!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal dihapus!</div>';
        }

        // Simpan pesan flashdata
        session()->setFlashdata('msg', $msg);
        return redirect()->to('kelurahan');
    }
}
