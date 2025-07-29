<?php

namespace App\Controllers;

use App\Models\UngkapKasusModel;
use App\Models\KelurahanModel;

helper('rekap');
class Ungkapkasus extends BaseController
{
    public function index()
    {
        $this->tampil(); // Memanggil method tampil
    }

    public function tampil()
    {
        $ungkap_kasus = new UngkapKasusModel();

        // Mengambil semua data di tabel `ungkapkasus`
        $data['query'] = $ungkap_kasus->join('kelurahan','ungkap_kasus.id_kelurahan = kelurahan.id_kelurahan','left')
                                      ->join('kecamatan','kelurahan.id_kecamatan = kecamatan.id_kecamatan','left')
                                      ->select('ungkap_kasus.*')
                                      ->select('kelurahan.nama_kelurahan')
                                      ->select(select: 'kecamatan.nama_kecamatan')
                                      ->findAll();

        // Mengambil nilai variabel msg pada session flashdata
        $data['msg'] = session()->getFlashdata('msg');

        // Memanggil file view tampil
        echo view('ungkapkasus/tampil', $data);
    }

    public function tambah()
    {
        $kelurahan = new KelurahanModel();

        // Mengambil semua data di tabel `ungkapkasus`
        $data['kelurahan'] = $kelurahan->join('kecamatan','kelurahan.id_kecamatan = kecamatan.id_kecamatan','left')
                                      ->select('kelurahan.*')
                                      ->select('kecamatan.nama_kecamatan')
                                      ->findAll();

        // Mengambil nilai variabel msg pada session flashdata
        $data['msg'] = session()->getFlashdata('msg');
        // Memanggil view form tambah
        return view('ungkapkasus/tambah', $data);
    }

    public function simpan()
    {
        $ungkap_kasus = new UngkapKasusModel();

        // Menyimpan data ke dalam array untuk dimasukkan ke tabel
        $data_ungkap_kasus = [
            'id_kasus'      => $this ->request->getVar('id_kasus'),
            'Nama'          => $this->request->getVar('Nama'),
            'JK'            => $this->request->getVar('JK'),
            'Umur'          => $this->request->getVar('Umur'),
            'golonganumur' => $this->request->getVar('golonganumur'),
            'Pekerjaan'     => $this->request->getVar('Pekerjaan'),
            'BB'            => $this->request->getVar('BB'),
            'JmlBB'         => $this->request->getVar('JmlBB'),
            'Satuan'        => $this->request->getVar('Satuan'),
            'MO'            => $this->request->getVar('MO'),
            'Tahun'         => $this->request->getVar('Tahun'),
            'id_kelurahan'  => $this->request->getVar('id_kelurahan'),
            'Jam'           => $this->request->getVar('Jam'),
            'TKP'           => $this->request->getVar('TKP'),
        ];

        // Menggunakan query builder untuk insert data
        $ungkap_kasus->insert($data_ungkap_kasus);
        $id_kelurahan = $data_ungkap_kasus['id_kelurahan'];
        $tahun = $data_ungkap_kasus['Tahun'];
        updateRekapKerawanan($id_kelurahan, $tahun);

       
        // Mengatur pesan flashdata berdasarkan hasil operasi
        if ($ungkap_kasus->affectedRows() > 0) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil disimpan!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>';
        }

        session()->setFlashdata('msg', $msg);
        return redirect()->to('ungkapkasus');
        
    }

    public function edit($id)
    {
        $ungkap_kasus = new UngkapKasusModel();

        $kelurahan = new KelurahanModel();

        // Mengambil semua data di tabel `ungkapkasus`
        $data['kelurahan'] = $kelurahan->join('kecamatan','kelurahan.id_kecamatan = kecamatan.id_kecamatan','left')
                                      ->select('kelurahan.*')
                                      ->select('kecamatan.nama_kecamatan')
                                      ->findAll();

        // Mengambil data berdasarkan id
        $data['query'] = $ungkap_kasus->find($id);
        $data['id'] = $id; // Untuk keperluan update
        // Memanggil view form edit
        return view('ungkapkasus/edit', $data);
    }

    public function update($id)
    {
        $ungkap_kasus = new UngkapKasusModel();

        // Menyimpan data yang diupdate
        $data_ungkap_kasus = [
            'id_kasus'      => $this ->request->getVar('id_kasus'),
            'Nama'          => $this->request->getVar('Nama'),
            'JK'            => $this->request->getVar('JK'),
            'Umur'          => $this->request->getVar('Umur'),
            'golonganumur' => $this->request->getVar('golonganumur'),
            'Pekerjaan'     => $this->request->getVar('Pekerjaan'),
            'BB'            => $this->request->getVar('BB'),
            'JmlBB'         => $this->request->getVar('JmlBB'),
            'Satuan'        => $this->request->getVar('Satuan'),
            'MO'            => $this->request->getVar('MO'),
            'Tahun'         => $this->request->getVar('Tahun'),
            'id_kelurahan'        => $this->request->getVar('id_kelurahan'),
            'Jam'           => $this->request->getVar('Jam'),
            'TKP'           => $this->request->getVar('TKP'),
        ];

        // Menggunakan query builder untuk update data
        $ungkap_kasus->update($id, $data_ungkap_kasus);
        $id_kelurahan = $data_ungkap_kasus['id_kelurahan'];
        $tahun = $data_ungkap_kasus['Tahun'];
        updateRekapKerawanan($id_kelurahan, $tahun);


        if ($ungkap_kasus->affectedRows() > 0) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil diupdate!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal diupdate!</div>';
        }

        session()->setFlashdata('msg', $msg);
        return redirect()->to('ungkapkasus');
    }

    public function hapus($id)
    {
        $ungkap_kasus = new UngkapKasusModel();

        // Menghapus data berdasarkan id
        $kasus = $ungkap_kasus->find($id);
        if ($kasus) {
            $ungkap_kasus->delete($id);
            updateRekapKerawanan($kasus['id_kelurahan'], $kasus['Tahun']);
        }
        // $ungkap_kasus->delete($id);
        // updateRekapKerawanan($kasus['id_kelurahan'], $kasus['Tahun']);

        if ($ungkap_kasus->affectedRows() > 0) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil dihapus!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal dihapus!</div>';
        }

        session()->setFlashdata('msg', $msg);
        return redirect()->to('ungkapkasus');
    }
    public function detail($id_kasus)
    {
        $model = new UngkapKasusModel();
        $kasus = $model->where('id_kasus', $id_kasus)->first();

        if (!$kasus) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }

        return view('ungkap_kasus/detail', ['kasus' => $kasus]);
    }
 
}
