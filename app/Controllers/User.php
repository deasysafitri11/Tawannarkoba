<?php

namespace App\Controllers;

use App\Models\UserModel;


class User extends BaseController
{
    // Fungsi default saat membuka halaman Kelurahan
    public function index()
    {
         $this->tampil(); // Alihkan ke fungsi tampil
    }

    // Fungsi untuk menampilkan data Kelurahan
    public function tampil()
    {
        $user = new UserModel();
        $data['query'] = $user->findAll(); // Ambil semua data dari tabel Kelurahan
        $data['msg'] = session()->getFlashdata('msg'); // Ambil pesan flashdata (jika ada)
        echo view('user/tampil', $data); // Tampilkan view dengan data yang diambil
    }
    // Fungsi untuk menambahkan data Kelurahan
    public function tambah()
    {
         // Kirim data Kecamatan ke view
        return view('user/tambah'); // Tampilkan form tambah
    }

    // Fungsi untuk menyimpan data Kelurahan ke database
    public function simpan()
    {
        $user = new UserModel();
        $data_user = [
            'id_user' => $this->request->getVar('id_user'),
            'username' => $this->request->getVar('username'),
            'password_hash' => md5($this->request->getVar('password')),
            'nama' => $this->request->getVar('nama'),
            'hak_akses' => $this->request->getVar('hak_akses'),
            'no_hp' => $this->request->getVar('no_hp'),
            'is_active' => $this->request->getVar('is_active')
        ];

        // Simpan data ke database
        $user->insert($data_user);
        if ($user->affectedRows() > 0) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil disimpan!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>';
        }
        session()->setFlashdata('msg', $msg);
        return redirect()->to('user'); 

    }

    // Fungsi untuk menampilkan form edit
    public function edit($id)
    {
        
        $user = new UserModel();
        $data['query'] = $user->find($id); // Ambil data Kelurahan berdasarkan ID
        $data['id'] = $id;
        return view('user/edit/', $data); // Tampilkan form edit
    }

    // Fungsi untuk memperbarui data Kelurahan
    public function update($id)
    {
        $user = new UserModel();
        $data_user = [
            'id_user' => $this->request->getVar('id_user'),
            'username' => $this->request->getVar('username'),
            'password_hash' => md5($this->request->getVar('password')),
            'nama' => $this->request->getVar('nama'),
            'hak_akses' => $this->request->getVar('hak_akses'),
            'no_hp' => $this->request->getVar('no_hp'),
            'is_active' => $this->request->getVar('is_active')
        ];

        // Update data di database
        if ($user->update($id, $data_user)) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil diperbarui!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal diperbarui!</div>';
        }

        // Simpan pesan flashdata
        session()->setFlashdata('msg', $msg);
        // Redirect ke halaman tampil
        return redirect()->to('user');
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
