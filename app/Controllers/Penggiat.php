<?php

namespace App\Controllers;

use App\Models\PenggiatModel;
use App\Models\KelurahanModel;

class Penggiat extends BaseController
{
    protected $penggiatModel;
    protected $kelurahanModel;

    public function __construct()
    {
        $this->penggiatModel = new PenggiatModel();
        $this->kelurahanModel = new KelurahanModel();       

    }

    public function index()
    {
        $data = [
            'query' => $this->penggiatModel->join('kelurahan','penggiat.id_kelurahan = kelurahan.id_kelurahan','left')
                                            ->select('penggiat.*')
                                            ->select('kelurahan.nama_kelurahan')
                                            ->findAll(), // Mengambil semua data di tabel penggiat
            'msg' => session()->getFlashdata('msg'), // Mengambil nilai msg dari session flashdata
            'title' => 'Daftar Penggiat' // Menambahkan judul halaman
        ];
        // Memanggil file view tampil
        echo view('penggiat/tampil', $data);
    }

    // Menampilkan form tambah data
    public function tambah()
    {
        $kelurahan = new KelurahanModel();
        $data['kelurahan'] = $kelurahan->join('kecamatan','kelurahan.id_kecamatan = kecamatan.id_kecamatan','left')
                                      ->select('kelurahan.*')
                                      ->select('kecamatan.nama_kecamatan')
                                      ->findAll();
       
        return view('penggiat/tambah', $data);
    }

    // Menyimpan data ke database
    public function simpan()
    {
        $data_penggiat = [
            'id_penggiat' => $this->request->getPost('id_penggiat'),
            'nama' => $this->request->getPost('nama'),
            'jk' => $this->request->getPost('jk'),
            'umur' => $this->request->getPost('umur'),
            'golonganumur' => $this->request->getPost('golonganumur'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'tahun' => $this->request->getPost('tahun'),
            'id_kelurahan' => $this->request->getPost('id_kelurahan'),          
            'nohp' => $this->request->getPost('nohp'),
            'lembaga' => $this->request->getPost('lembaga')
        ];

        // Menggunakan query builder untuk insert data
        $this->penggiatModel->insert($data_penggiat);

        // Mengatur pesan flashdata berdasarkan hasil operasi
        if ($this->penggiatModel->affectedRows() > 0) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil disimpan!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>';
        }

        session()->setFlashdata('msg', $msg);
        return redirect()->to('/penggiat');
    }

    // Menampilkan form edit data
    public function edit($id)
    {
        $kelurahan = new KelurahanModel();
        $data['kelurahan'] = $kelurahan->join('kecamatan','kelurahan.id_kecamatan = kecamatan.id_kecamatan','left')
                                      ->select('kelurahan.*')
                                      ->select('kecamatan.nama_kecamatan')
                                      ->findAll();
        $data['query']= $this->penggiatModel->find($id);
        $data['id'] = $id;
           
        return view('penggiat/edit', $data);
    }

    // Mengupdate data
    public function update($id)
    {
        $data_penggiat = [
            'id_penggiat' => $this->request->getPost('id_penggiat'),
            'nama' => $this->request->getPost('nama'),
            'jk' => $this->request->getPost('jk'),
            'umur' => $this->request->getPost('umur'),
            'golonganumur' => $this->request->getPost('golonganumur'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'tahun' => $this->request->getPost('tahun'),
            'id_kelurahan' => $this->request->getPost('id_kelurahan'),          
            'nohp' => $this->request->getPost('nohp'),
            'lembaga' => $this->request->getPost('lembaga'),
        ];

        $this->penggiatModel->update($id, $data_penggiat);

        // Mengatur pesan flashdata berdasarkan hasil operasi
        if ($this->penggiatModel->affectedRows() > 0) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil diupdate!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal diupdate!</div>';
        }

        session()->setFlashdata('msg', $msg);
        return redirect()->to('/penggiat')->with('msg', 'Penggiat berhasil diperbarui!');
    }

    // Hapus data penggiat
    public function hapus($id)
    {
        $this->penggiatModel->delete($id);
        return redirect()->to('/penggiat')->with('msg', 'Penggiat berhasil dihapus!');
    }
}
