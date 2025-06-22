<?php

namespace App\Controllers;

use App\Models\KabupatenModel;
use App\Models\KecamatanModel;

use App\Models\KelurahanModel;
use App\Models\UngkapKasusModel;

class Dashboard extends BaseController
{
    public function index() //method index otomatis dipanggil oleh controller
    {
        $kabupaten = new KabupatenModel();
     

        // Ambil data kabupaten untuk ditampilkan
        $data['kabupaten'] = $kabupaten->find(1);
        

        // Jika data lokasi sekolah tidak relevan, hapus variabel terkait
        $lokasi = '';
        $label_lokasi = '';

        // Data marker dihilangkan karena SekolahModel tidak digunakan
        $data['marker'] = $lokasi;
        
        // Menampilkan view dashboard dengan data kabupaten
        echo view('dashboard', $data);
    }

    public function aoc()
    {
        $kabupaten = new KabupatenModel();
     

        // Ambil data kabupaten untuk ditampilkan
        $data['kabupaten'] = $kabupaten->find(1);
        

        // Jika data lokasi sekolah tidak relevan, hapus variabel terkait
        $lokasi = '';
        $label_lokasi = '';

        // Data marker dihilangkan karena SekolahModel tidak digunakan
        $data['marker'] = $lokasi;
        
        // Menampilkan view dashboard dengan data kabupaten
        echo view('dashboard_aoc', $data);
    }

    public function getData()
    {
        $kelurahan = new KelurahanModel();
        $nama_kecamatan = $this->request->getGet('nama_kecamatan');
        $nama_kelurahan = $this->request->getGet('nama_kelurahan');
        $data = $kelurahan->join('kecamatan','kelurahan.id_kecamatan = kecamatan.id_kecamatan','left')
                        ->select('kelurahan.*')
                        ->select('kecamatan.nama_kecamatan')
                        ->select("(SELECT COUNT(b.id_kasus) FROM ungkap_kasus b WHERE b.id_kelurahan = kelurahan.id_kelurahan) as jml_kasus")
                        ->select("(SELECT COUNT(b.id_klien) FROM clientrehabilitasi b WHERE b.id_kelurahan = kelurahan.id_kelurahan) as jml_klien")
                        ->orderBy('jml_kasus','desc')
                        ->where('kelurahan.nama_kelurahan',$nama_kelurahan)
                        ->where('kecamatan.nama_kecamatan',$nama_kecamatan)
                        ->findAll();
       
        return $this->response->setJSON($data);
    }

    public function getDataKerawanan()
    {
        $kelurahan = new KelurahanModel();
        $nama_kecamatan = $this->request->getGet('nama_kecamatan');
        $nama_kelurahan = $this->request->getGet('nama_kelurahan');
        $data = $kelurahan->join('kecamatan','kelurahan.id_kecamatan = kecamatan.id_kecamatan','left')
                          ->select('kelurahan.*')
                          ->select('kecamatan.nama_kecamatan')
                          ->select("(SELECT COUNT(b.id_kasus) FROM ungkap_kasus b WHERE b.id_kelurahan = kelurahan.id_kelurahan) as jml_kasus")
                          ->orderBy('jml_kasus','desc')
                          ->findAll();

        if (!empty($data)) {
            foreach ($data as $key => $item ) {
                $hasil = '<tr><td width="45%">id Kecamatan</td><td>:</td><td>' . $item->id_kelurahan . '</td></tr>' .
                '<tr><td>Nama Desa/Kel.</td><td>:</td><td>' . $item->nama_kelurahan . '</td></tr>' .
                '<tr><td>Nama Kecamatan</td><td>:</td><td>' . $item->nama_kecamatan. '</td></tr>' .
                '<tr><td>Status Kerawanan</td><td>:</td><td></td></tr>' .
                '<tr><td>Jumlah Ungkap Kasus</td><td>:</td><td>' . '0' . '</td></tr>'.
                '<tr><td>Jumlah Sosialiasi Kasus</td><td>:</td><td>' . '0' . '</td></tr>'.
                '<tr><td>Jumlah Penggiat P4GN Kasus</td><td>:</td><td>' . '0' . '</td></tr>'. 
                '<tr><td>Jumlah Agen Pemulihan</td><td>:</td><td>' . '0' . '</td></tr>';
              }
            
        } else {
            $hasil = '<tr><td class="text-center" colspan="3">DATA TIDAK ADA !</td></tr>';
        }

        //$respon = ['hasil' => $hasil];
        $respon = $data;

        return $this->response->setJSON($respon);
        
    }

    public function getDataKecamatan()
    {
        $kecamatan = new KecamatanModel();
        $data = $kecamatan->join('kerawanan','kerawanan.id_kecamatan = kecamatan.id_kecamatan')
                ->where('id_kabupaten',1)->findAll();
        return $this->response->setJSON($data);
    }
}
