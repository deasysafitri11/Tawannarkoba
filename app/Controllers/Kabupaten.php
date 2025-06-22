<?php

namespace App\Controllers;

use App\Models\KabupatenModel;

class Kabupaten extends BaseController
{
    protected $kabupatenModel;

    public function __construct()
    {
        $this->kabupatenModel = new KabupatenModel();
    }

    public function index()
    {
        // Ambil data dari model
        $data['kabupaten'] = $this->kabupatenModel->findAll(); // Pastikan model dikonfigurasi dengan benar
    
        // Tampilkan view dengan data
        return view('kabupaten/tampil', $data);
    }
    

    public function tampil()
    {
        $data = [
            'query' => $this->kabupatenModel->findAll(), // Mengambil semua data di tabel kabupaten
            'msg' => session()->getFlashdata('msg'), // Mengambil nilai msg dari session flashdata
            'title' => 'Daftar Kabupaten' // Menambahkan judul halaman
        ];
        // Memanggil file view tampil
        return view('kabupaten/tampil', $data);
    }

    // Tampilkan form tambah
    public function tambah()
    {
        return view('kabupaten/tambah');
    }

    // Proses simpan data kabupaten
    public function simpan()
    {
        // Validasi input
        if (!$this->validate([
            'nama_kabupaten' => 'required',
            'latitude'       => 'required|decimal',
            'longitude'      => 'required|decimal',
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $this->kabupatenModel->save([
            'nama_kabupaten' => $this->request->getPost('nama_kabupaten'),
            'latitude'       => $this->request->getPost('latitude'),
            'longitude'      => $this->request->getPost('longitude'),
            'created_at'     => date('Y-m-d H:i:s'), // Format waktu saat ini
            'updated_at'     => date('Y-m-d H:i:s')  // Format waktu saat ini
        ]);

        return redirect()->to('/kabupaten')->with('msg', 'Data berhasil ditambahkan!');
    }

    // Tampilkan form edit
    public function edit($id_kabupaten)
    {
        $data = [
            'kabupaten' => $this->kabupatenModel->find($id_kabupaten),
            'title' => 'Edit Kabupaten'
        ];

        if (empty($data['kabupaten'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Kabupaten dengan ID $id_kabupaten tidak ditemukan");
        }

        return view('kabupaten/edit', $data);
    }

    // Proses update data kabupaten
    public function update($id_kabupaten)
    {
        // Validasi input
        if (!$this->validate([
            'nama_kabupaten' => 'required',
            'latitude'       => 'required|decimal',
            'longitude'      => 'required|decimal',
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $this->kabupatenModel->update($id_kabupaten, [
            'nama_kabupaten' => $this->request->getPost('nama_kabupaten'),
            'latitude'       => $this->request->getPost('latitude'),
            'longitude'      => $this->request->getPost('longitude'),
            'updated_at'     => date('Y-m-d H:i:s') // Update waktu saat ini
        ]);

        return redirect()->to('/kabupaten')->with('msg', 'Data berhasil diperbarui!');
    }
    public function delete($id)
    {
        $this->kabupatenModel->delete($id);
        return redirect()->to(site_url('kabupaten'))->with('success', 'Data berhasil dihapus.');
    }
    
}