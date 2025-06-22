<?php

namespace App\Controllers;

use App\Models\AgenPemulihanModel;
use App\Models\KelurahanModel;


class AgenPemulihan extends BaseController
{
    public function index()
    {
        $this->tampil(); // Memanggil method tampil
    }

    public function tampil()
    {
        $agenPemulihan = new AgenPemulihanModel();

        // Mengambil semua data di tabel `agenpemulihan`
        $data['query'] = $agenPemulihan->join('kelurahan','agenpemulihan.id_kelurahan = kelurahan.id_kelurahan','left')
                                        ->select('agenpemulihan.*')
                                        ->select('kelurahan.nama_kelurahan')
                                        ->findAll();

        // Mengambil nilai variabel msg pada session flashdata
        $data['msg'] = session()->getFlashdata('msg');

        // Memanggil file view tampil
        echo view('agenpemulihan/tampil', $data);
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
        return view('agenpemulihan/tambah',$data);
    }

    public function simpan()
    {
        $agenPemulihan = new AgenPemulihanModel();

        // Menyimpan data ke dalam array untuk dimasukkan ke tabel
        $data_agenPemulihan = [
            'id_agen'          => $this->request->getVar('id_agen'),
            'Nama'          => $this->request->getVar('Nama'),
            'JK'            => $this->request->getVar('JK'),
            'Umur'          => $this->request->getVar('Umur'),
            'golonganumur' => $this->request->getVar('golonganumur'),
            'Pekerjaan'     => $this->request->getVar('Pekerjaan'),
            'Tahun'         => $this->request->getVar('Tahun'),
            'id_kelurahan'        => $this->request->getVar('id_kelurahan'),            
            'NoHp'          => $this->request->getVar('NoHp'),
        ];

        // Menggunakan query builder untuk insert data
        $agenPemulihan->insert($data_agenPemulihan);

        // Mengatur pesan flashdata berdasarkan hasil operasi
        if ($agenPemulihan->affectedRows() > 0) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil disimpan!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>';
        }

        session()->setFlashdata('msg', $msg);
        return redirect()->to('agenpemulihan');
    }

    public function edit($id)
    {
        $agenPemulihan = new AgenPemulihanModel();
        $kelurahan = new KelurahanModel();

        // Mengambil semua data di tabel `ungkapkasus`
        $data['kelurahan'] = $kelurahan->join('kecamatan','kelurahan.id_kecamatan = kecamatan.id_kecamatan','left')
                                      ->select('kelurahan.*')
                                      ->select('kecamatan.nama_kecamatan')
                                      ->findAll();

        // Mengambil data berdasarkan id
        $data['query'] = $agenPemulihan->find($id);
        $data['id'] = $id; // Untuk keperluan update

        // Memanggil view form edit
        return view('agenpemulihan/edit', $data);
    }

    public function update($id)
    {
        $agenPemulihan = new AgenPemulihanModel();

        // Menyimpan data yang diupdate
        $data_agenPemulihan = [
            'id_agen'          => $this->request->getVar('id_agen'),
            'Nama'          => $this->request->getVar('Nama'),
            'JK'            => $this->request->getVar('JK'),
            'Umur'          => $this->request->getVar('Umur'),
            'golonganumur' => $this->request->getVar('golonganumur'),
            'Pekerjaan'     => $this->request->getVar('Pekerjaan'),
            'Tahun'         => $this->request->getVar('Tahun'),
            'id_kelurahan'        => $this->request->getVar('id_kelurahan'),            
            'NoHp'          => $this->request->getVar('NoHp'),
        ];

        // Menggunakan query builder untuk update data
        $agenPemulihan->update($id, $data_agenPemulihan);

        if ($agenPemulihan->affectedRows() > 0) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil diupdate!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal diupdate!</div>';
        }

        session()->setFlashdata('msg', $msg);
        return redirect()->to('agenpemulihan');
    }

    public function hapus($id)
    {
        $agenPemulihan = new AgenPemulihanModel();

        // Menghapus data berdasarkan id
        $agenPemulihan->delete($id);

        if ($agenPemulihan->affectedRows() > 0) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil dihapus!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal dihapus!</div>';
        }

        session()->setFlashdata('msg', $msg);
        return redirect()->to('agenpemulihan');
    }
}
