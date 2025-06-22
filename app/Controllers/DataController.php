<?php

namespace App\Controllers;

use App\Models\UngkapKasusModel;

class DataController extends BaseController
{
    public function index()
    {
        return $this->tampil();
    }

    public function tampil()
    {
        $ungkapKasus = new UngkapKasusModel();
        $data['query'] = $ungkapKasus->findAll();
        $data['msg'] = session()->getFlashdata('msg');
        echo view('data/tampil', $data);
    }

    public function tambah()
    {
        return view('data/tambah');
    }

    public function simpan()
    {
        $ungkapKasus = new UngkapKasusModel();

        $data = [
            'nama' => $this->request->getVar('nama'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'usia' => $this->request->getVar('usia'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'jenis_barang_bukti' => $this->request->getVar('jenis_barang_bukti'),
            'satuan_jumlah_barang_bukti' => $this->request->getVar('satuan_jumlah_barang_bukti'),
            'modus' => $this->request->getVar('modus'),
            'tkp' => $this->request->getVar('tkp')
        ];

        $ungkapKasus->insert($data);

        $msg = $ungkapKasus->affectedRows() > 0 
            ? '<div class="alert alert-primary">Data berhasil disimpan!</div>'
            : '<div class="alert alert-danger">Data gagal disimpan!</div>';

        session()->setFlashdata('msg', $msg);
        return redirect()->to('data');
    }

    public function edit($id)
    {
        $ungkapKasus = new UngkapKasusModel();
        $data['query'] = $ungkapKasus->find($id);
        $data['id'] = $id;
        return view('data/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getVar('id');
        $ungkapKasus = new UngkapKasusModel();

        $data = [
            'nama' => $this->request->getVar('nama'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'usia' => $this->request->getVar('usia'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'jenis_barang_bukti' => $this->request->getVar('jenis_barang_bukti'),
            'satuan_jumlah_barang_bukti' => $this->request->getVar('satuan_jumlah_barang_bukti'),
            'modus' => $this->request->getVar('modus'),
            'tkp' => $this->request->getVar('tkp')
        ];

        $ungkapKasus->update($id, $data);

        $msg = $ungkapKasus->affectedRows() > 0 
            ? '<div class="alert alert-primary">Data berhasil diperbarui!</div>'
            : '<div class="alert alert-danger">Data gagal diperbarui!</div>';

        session()->setFlashdata('msg', $msg);
        return redirect()->to('data');
    }

    public function hapus($id)
    {
        $ungkapKasus = new UngkapKasusModel();
        $ungkapKasus->delete($id);

        $msg = $ungkapKasus->affectedRows() > 0 
            ? '<div class="alert alert-primary">Data berhasil dihapus!</div>'
            : '<div class="alert alert-danger">Data gagal dihapus!</div>';

        session()->setFlashdata('msg', $msg);
        return redirect()->to('data');
    }
}
