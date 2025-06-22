<?php

namespace App\Controllers;

use App\Models\ClientRehabilitasiModel;
use App\Models\KelurahanModel;

class ClientRehabilitasi extends BaseController
{
    public function index()
    {
        return $this->tampil(); // Memanggil method tampil
    }

    public function tampil()
    {
        $clientrehabilitasi = new ClientRehabilitasiModel();

        // Mengambil semua data di tabel `client_rehabilitasi`
        $data['query'] = $clientrehabilitasi->join('kelurahan','clientrehabilitasi.id_kelurahan = kelurahan.id_kelurahan','left')
                                            ->select('clientrehabilitasi.*')
                                            ->select('kelurahan.nama_kelurahan')
                                            ->findAll();

        // Mengambil nilai variabel msg pada session flashdata
        $data['msg'] = session()->getFlashdata('msg');

        // Memanggil file view tampil
        return view('clientrehabilitasi/tampil', $data);
    }

    public function tambah()
    {
        // Memanggil view form tambah
        $kelurahan = new KelurahanModel();

        // Mengambil semua data di tabel `ungkapkasus`
        $data['kelurahan'] = $kelurahan->join('kecamatan','kelurahan.id_kecamatan = kecamatan.id_kecamatan','left')
                                      ->select('kelurahan.*')
                                      ->select('kecamatan.nama_kecamatan')
                                      ->findAll();
        return view('clientrehabilitasi/tambah', $data);
    }

    public function simpan()
    {
        $clientrehabilitasi = new ClientRehabilitasiModel();

        // Menyimpan data ke dalam array untuk dimasukkan ke tabel
        $data_klien = [
            'id_klien'      => $this->request->getVar('id_klien'),
            'Nama'           => $this->request->getVar('Nama'),
            'JK'             => $this->request->getVar('JK'),
            'Umur'           => $this->request->getVar('Umur'),
            'golonganumur'  => $this->request->getVar('golonganumur'),
            'Pekerjaan'      => $this->request->getVar('Pekerjaan'),
            'JenisZat'      => $this->request->getVar('JenisZat'),
            'Kategori'       => $this->request->getVar('Kategori'),
            'Tahun'          => $this->request->getVar('Tahun'),
            'id_kelurahan'          => $this->request->getVar('id_kelurahan'),
            'Tipe'          => $this->request->getVar('Tipe'),
        ];

        // Menggunakan query builder untuk insert data
        $clientrehabilitasi->insert($data_klien);

        // Mengatur pesan flashdata berdasarkan hasil operasi
        if ($clientrehabilitasi->affectedRows() > 0) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil disimpan!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>';
        }

        session()->setFlashdata('msg', $msg);
        return redirect()->to('/clientrehabilitasi');
    }

    public function edit($id)
    {
        $clientrehabilitasi = new ClientRehabilitasiModel();
        $kelurahan = new KelurahanModel();

        // Mengambil semua data di tabel `ungkapkasus`
        $data['kelurahan'] = $kelurahan->join('kecamatan','kelurahan.id_kecamatan = kecamatan.id_kecamatan','left')
                                      ->select('kelurahan.*')
                                      ->select('kecamatan.nama_kecamatan')
                                      ->findAll();

        // Mengambil data berdasarkan id
        $data['query'] = $clientrehabilitasi->find($id);
        $data['id'] = $id; // Untuk keperluan update

        // Memanggil view form edit
        return view('clientrehabilitasi/edit', $data);
    }

    public function update($id)
    {
        $clientrehabilitasi = new ClientRehabilitasiModel();

        // Menyimpan data yang diupdate
        $data_klien = [
            'id_klien'      => $this->request->getVar('id_klien'),
            'Nama'           => $this->request->getVar('Nama'),
            'JK'             => $this->request->getVar('JK'),
            'Umur'           => $this->request->getVar('Umur'),
            'golonganumur'  => $this->request->getVar('golonganumur'),
            'Pekerjaan'      => $this->request->getVar('Pekerjaan'),
            'JenisZat'      => $this->request->getVar('JenisZat'),
            'Kategori'       => $this->request->getVar('Kategori'),
            'Tahun'          => $this->request->getVar('Tahun'),
            'id_kelurahan'          => $this->request->getVar('id_kelurahan'),
            'Tipe'          => $this->request->getVar('Tipe'),
        ];

        // Menggunakan query builder untuk update data
        $clientrehabilitasi->update($id, $data_klien);

        // Mengatur pesan flashdata berdasarkan hasil operasi
        if ($clientrehabilitasi->affectedRows() > 0) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil diupdate!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal diupdate!</div>';
        }

        session()->setFlashdata('msg', $msg);
        return redirect()->to('/clientrehabilitasi');
    }

    public function hapus($id)
    {
        $clientrehabilitasi = new ClientRehabilitasiModel();

        // Menghapus data berdasarkan id
        $clientrehabilitasi->delete($id);

        // Mengatur pesan flashdata berdasarkan hasil operasi
        if ($clientrehabilitasi->affectedRows() > 0) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil dihapus!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal dihapus!</div>';
        }

        session()->setFlashdata('msg', $msg);
        return redirect()->to('/clientrehabilitasi');
    }
}
