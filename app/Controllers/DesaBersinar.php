<?php

namespace App\Controllers;

use App\Models\KecamatanModel;
use App\Models\KelurahanModel;

use App\Models\DesaBersinarModel;


class DesaBersinar extends BaseController
{
    // Fungsi default saat membuka halaman Kelurahan
    public function index()
    {
         $this->tampil(); // Alihkan ke fungsi tampil
    }

    // Fungsi untuk menampilkan data Kelurahan
    public function tampil()
    {
        $desa_bersinar = new DesaBersinarModel();
        $data['query'] = $desa_bersinar->join('kelurahan', 'desa_bersinar.id_kelurahan=kelurahan.id_kelurahan','LEFT')
                                        ->join('kecamatan', 'kelurahan.id_kecamatan=kecamatan.id_kecamatan','LEFT')
                                        ->select('desa_bersinar.*')
                                        ->select('kelurahan.nama_kelurahan')
                                        ->select('kecamatan.nama_kecamatan')->findAll(); // Ambil semua data dari tabel Kelurahan
        $data['msg'] = session()->getFlashdata('msg'); // Ambil pesan flashdata (jika ada)
        echo view('desabersinar/tampil', $data); // Tampilkan view dengan data yang diambil
    }
    // Fungsi untuk menambahkan data Kelurahan
    public function tambah()
    {
        $kelurahan = new KelurahanModel();
        $data['kelurahan'] = $kelurahan->join('kecamatan','kelurahan.id_kecamatan = kecamatan.id_kecamatan','left')
                                      ->select('kelurahan.*')
                                      ->select('kecamatan.nama_kecamatan')
                                      ->findAll();
        return view('desabersinar/tambah', $data); // Tampilkan form tambah
    }

    // Fungsi untuk menyimpan data Kelurahan ke database
    public function simpan()
    {
        $desa_bersinar = new DesaBersinarModel();
        $data_desa_bersinar = [
            'id_desa_bersinar' => $this->request->getVar('id_desa_bersinar'),
            'id_kelurahan' => $this->request->getVar('id_kelurahan'),
            'tahun' => $this->request->getVar('tahun'),
            'pic' => $this->request->getVar('pic')
        ];

        // Simpan data ke database
        $desa_bersinar->insert($data_desa_bersinar);
        if ($desa_bersinar->affectedRows() > 0) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil disimpan!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>';
        }
        session()->setFlashdata('msg', $msg);
        return redirect()->to('desa-bersinar'); 

    }

    // Fungsi untuk menampilkan form edit
    public function edit($id)
    {
        $desa_bersinar = new DesaBersinarModel(); // Ambil data Kecamatan
        $kelurahan = new KelurahanModel();
        $data['kelurahan'] = $kelurahan->join('kecamatan','kelurahan.id_kecamatan = kecamatan.id_kecamatan','left')
                                      ->select('kelurahan.*')
                                      ->select('kecamatan.nama_kecamatan')
                                      ->findAll();
        $data['query'] = $desa_bersinar->find($id); // Ambil data Kelurahan berdasarkan ID
        $data['id'] = $id;
        return view('desabersinar/edit', $data); // Tampilkan form edit
    }

    // Fungsi untuk memperbarui data Kelurahan
    public function update()
    {
        $desa_bersinar = new DesaBersinarModel();
        $data_desa_bersinar = [
            'id_desa_bersinar' => $this->request->getVar('id_desa_bersinar'),
            'id_kelurahan' => $this->request->getVar('id_kelurahan'),
            'tahun' => $this->request->getVar('tahun'),
            'pic' => $this->request->getVar('pic')
        ];

        // Update data di database
        if ($desa_bersinar->update($this->request->getVar('id_desa_bersinar'), $data_desa_bersinar)) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil diperbarui!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal diperbarui!</div>';
        }

        // Simpan pesan flashdata
        session()->setFlashdata('msg', $msg);
        // Redirect ke halaman tampil
        return redirect()->to('desa-bersinar');
    }

    // Fungsi untuk menghapus data Kelurahan
    public function hapus($id)
    {
        $desa_bersinar = new DesaBersinarModel();
        // Hapus data berdasarkan ID
        if ($desa_bersinar->delete(['id_kelurahan' => $id])) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil dihapus!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal dihapus!</div>';
        }

        // Simpan pesan flashdata
        session()->setFlashdata('msg', $msg);
        return redirect()->to('desa-bersinar');
    }
}
