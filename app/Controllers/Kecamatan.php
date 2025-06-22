<?php

namespace App\Controllers;

use App\Models\KabupatenModel;
use App\Models\KecamatanModel;

class Kecamatan extends BaseController
{
    public function index()
    {
        $this->tampil();
    }

    public function tampil()
    {
        $kecamatan = new KecamatanModel();
        $data['query'] = $kecamatan->join('kabupaten', 'kecamatan.id_kabupaten=kabupaten.id_kabupaten','LEFT')
        ->select('kecamatan.*')->select('kabupaten.nama_kabupaten')->findAll();
        $data['msg'] = session()->getFlashdata('msg');
        echo view('kecamatan/tampil', $data);
    }

    public function tambah()
    {
        $kabupaten = new KabupatenModel();
        $kabupaten = $kabupaten->findAll();
        $kabupatenOptions = [];
        $kabupatenOptions[''] = 'Belum dipilih';
        foreach ($kabupaten as $row) {
            $kabupatenOptions[$row['id_kabupaten']] = strtoupper($row['nama_kabupaten']);
        }
        $data['kabupatenOptions'] = $kabupatenOptions;
        return view('kecamatan/tambah', $data);
    }

    public function edit($id_kecamatan)
    {
        $kabupaten = new KabupatenModel();
        $kabupaten = $kabupaten->findAll();
        $kabupatenOptions = [];
        $kabupatenOptions[''] = 'Belum dipilih';
        foreach ($kabupaten as $row) {
            $kabupatenOptions[$row['id_kabupaten']] = strtoupper($row['nama_kabupaten']);
        }
        $data['kabupatenOptions'] = $kabupatenOptions;
        $kecamatan = new KecamatanModel();
        $data['query'] = $kecamatan->find($id_kecamatan);
        $data['id'] = $id_kecamatan;
        return view('kecamatan/edit', $data);
    }

    public function simpan()
    {
        $kecamatan = new KecamatanModel();
        $data_kecamatan = [
            'id_kecamatan' => $this->request->getVar('id_kecamatan'),
            'id_kabupaten' => $this->request->getVar('id_kabupaten'),
            'nama_kecamatan' => $this->request->getVar('nama_kecamatan'),
            'latitude' => $this->request->getVar('latitude'),
            'longitude' => $this->request->getVar('longitude'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        
        $kecamatan->insert($data_kecamatan);
        if ($kecamatan->affectedRows() > 0) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil disimpan!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>';
        }
        session()->setFlashdata('msg', $msg);
        return redirect()->to('kecamatan');
        
    }

    public function update()
    {
        $kecamatan = new KecamatanModel();
        $id = $this->request->getVar('id_kecamatan');
        $data_kecamatan = [
            'id_kecamatan' => $this->request->getVar('id_kecamatan'),
            'id_kabupaten' => $this->request->getVar('id_kabupaten'),
            'nama_kecamatan' => $this->request->getVar('nama_kecamatan'),
            'latitude' => $this->request->getVar('latitude'),
            'longitude' => $this->request->getVar('longitude'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $kecamatan->update($id, $data_kecamatan);
        if ($kecamatan->affectedRows() > 0) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil diperbarui!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal diperbarui!</div>';
        }
        session()->setFlashdata('msg', $msg);
        return redirect()->to('kecamatan');
    }

    public function hapus($id_kecamatan)
    {
        $kecamatan = new KecamatanModel();
        $kecamatan->delete(['id_kecamatan' => $id_kecamatan]);
        if ($kecamatan->affectedRows() > 0) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil dihapus!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal dihapus!</div>';
        }
        session()->setFlashdata('msg', $msg);
        return redirect()->to('kecamatan');
    }
}
