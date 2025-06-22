<?php

namespace App\Controllers;

use App\Models\RtsModel;
use App\Models\KelurahanModel;

class Rts extends BaseController
{
    protected $rtsModel;
    protected $kelurahanModel;

    public function __construct()
    {
        $this->rtsModel = new RtsModel();
        $this->kelurahanModel = new KelurahanModel();       

    }

    public function index()
    {
        $data = [
            'query' => $this->rtsModel->join('kelurahan','rts.id_kelurahan = kelurahan.id_kelurahan','left')
                                            ->select('rts.*')
                                            ->select('kelurahan.nama_kelurahan')
                                            ->findAll(), // Mengambil semua data di tabel penggiat
            'msg' => session()->getFlashdata('msg'), // Mengambil nilai msg dari session flashdata
            'title' => 'Daftar Penggiat' // Menambahkan judul halaman
        ];
        // Memanggil file view tampil
        echo view('rts/tampil', $data);
    }

    // Menampilkan form tambah data
    public function tambah()
    {
        $kelurahan = new KelurahanModel();
        $data['kelurahan'] = $kelurahan->join('kecamatan','kelurahan.id_kecamatan = kecamatan.id_kecamatan','left')
                                      ->select('kelurahan.*')
                                      ->select('kecamatan.nama_kecamatan')
                                      ->findAll();
       
        return view('rts/tambah', $data);
    }

    // Menyimpan data ke database
    public function simpan()
    {
        $data_rts = [
            'id_rts' => $this->request->getPost('id_rts'),
            'nama' => $this->request->getPost('nama'),
            'jk' => $this->request->getPost('jk'),
            'umur' => $this->request->getPost('umur'),
            'tahun' => $this->request->getPost('tahun'),
            'id_kelurahan' => $this->request->getPost('id_kelurahan'),          
            'nohp' => $this->request->getPost('nohp'),
            'asal_sekolah' => $this->request->getPost('asal_sekolah')
        ];

        // Menggunakan query builder untuk insert data
        $this->rtsModel->insert($data_rts);

        // Mengatur pesan flashdata berdasarkan hasil operasi
        if ($this->rtsModel->affectedRows() > 0) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil disimpan!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>';
        }

        session()->setFlashdata('msg', $msg);
        return redirect()->to('/rts');
    }

    // Menampilkan form edit data
    public function edit($id)
    {
        $kelurahan = new KelurahanModel();
        $data['kelurahan'] = $kelurahan->join('kecamatan','kelurahan.id_kecamatan = kecamatan.id_kecamatan','left')
                                      ->select('kelurahan.*')
                                      ->select('kecamatan.nama_kecamatan')
                                      ->findAll();
        $data['query']= $this->rtsModel->find($id);
        $data['id'] = $id;
           
        return view('rts/edit', $data);
    }

    // Mengupdate data
    public function update($id)
    {
        $data_rts = [
            'id_rts' => $this->request->getPost('id_rts'),
            'nama' => $this->request->getPost('nama'),
            'jk' => $this->request->getPost('jk'),
            'umur' => $this->request->getPost('umur'),
            'tahun' => $this->request->getPost('tahun'),
            'id_kelurahan' => $this->request->getPost('id_kelurahan'),          
            'nohp' => $this->request->getPost('nohp'),
            'asal_sekolah' => $this->request->getPost('asal_sekolah')
        ];

        $this->rtsModel->update($id, $data_rts);

        // Mengatur pesan flashdata berdasarkan hasil operasi
        if ($this->rtsModel->affectedRows() > 0) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil diupdate!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal diupdate!</div>';
        }

        session()->setFlashdata('msg', $msg);
        return redirect()->to('/rts')->with('msg', 'RTS berhasil diperbarui!');
    }

    // Hapus data penggiat
    public function hapus($id)
    {
        $this->rtsModel->delete($id);
        return redirect()->to('/rts')->with('msg', 'RTS berhasil dihapus!');
    }
}
