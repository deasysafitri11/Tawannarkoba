<?php

namespace App\Controllers;

use App\Models\KabupatenModel;
use App\Models\KecamatanModel;
use App\Models\KelurahanModel;
use App\Models\RekapKerawananModel;

class PetaController extends BaseController
{
    private function hitungJarak($data1, $data2)
    {
        $jumlah = 0;
        foreach ($data1 as $key => $value) {
            $jumlah += pow($value - $data2[$key], 2);
        }
        return sqrt($jumlah);
    }

   
    public function publik()
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
       echo view('peta/publik', $data);
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

    // public function getData()
    // {
    //     $kelurahan = new KelurahanModel();
    //     $nama_kecamatan = $this->request->getGet('nama_kecamatan');
    //     $nama_kelurahan = $this->request->getGet('nama_kelurahan');
    //     $tahun = $this->request->getGet('tahun');

    //     $data = $kelurahan->join('kecamatan','kelurahan.id_kecamatan = kecamatan.id_kecamatan','left')
    //         ->select('kelurahan.*')
    //         ->select('kecamatan.nama_kecamatan')
    //         ->select("
    //             (SELECT COUNT(b.id_kasus) FROM ungkap_kasus b
    //             WHERE b.id_kelurahan = kelurahan.id_kelurahan
    //             AND b.Tahun = $tahun) as jml_kasus
    //         ")
    //         ->select("
    //             (SELECT COUNT(b.id_klien) FROM clientrehabilitasi b
    //             WHERE b.id_kelurahan = kelurahan.id_kelurahan) as jml_klien
    //         ")
    //         ->orderBy('jml_kasus','desc')
    //         ->where('kelurahan.nama_kelurahan', $nama_kelurahan)
    //         ->where('kecamatan.nama_kecamatan', $nama_kecamatan)
    //         ->findAll();

    //     return $this->response->setJSON($data);
    // }
    public function getData()
    {
        $nama_kecamatan = $this->request->getGet('nama_kecamatan');
        $nama_kelurahan = $this->request->getGet('nama_kelurahan');
        $tahun = (int) $this->request->getGet('tahun');

        $rekapModel = new RekapKerawananModel();

        $data = $rekapModel
            ->join('kelurahan', 'rekap_kerawanan_kelurahan.id_kelurahan = kelurahan.id_kelurahan')
            ->join('kecamatan', 'kelurahan.id_kecamatan = kecamatan.id_kecamatan')
            ->select('rekap_kerawanan_kelurahan.*')
            ->select('kelurahan.nama_kelurahan')
            ->select('kecamatan.nama_kecamatan')
            ->where('rekap_kerawanan_kelurahan.tahun', $tahun)
            ->where('kelurahan.nama_kelurahan', $nama_kelurahan)
            ->where('kecamatan.nama_kecamatan', $nama_kecamatan)
            ->get()
            ->getResultArray();

        return $this->response->setJSON($data);
    }
    

    // public function getDataKerawanan()
    // {
    //     $tahun = (int) $this->request->getGet('tahun');
    //     if (!$tahun) {
    //         return $this->response->setJSON(['error' => 'Tahun tidak valid']);
    //     }

    //     $kelurahan = new KelurahanModel();

    //     $data = $kelurahan->join('kecamatan','kelurahan.id_kecamatan = kecamatan.id_kecamatan','left')
    //         ->select('kelurahan.*')
    //         ->select('kecamatan.nama_kecamatan')
    //         ->select("(
    //             SELECT COUNT(b.id_kasus)
    //             FROM ungkap_kasus b
    //             WHERE b.id_kelurahan = kelurahan.id_kelurahan
    //             AND b.Tahun = $tahun
    //         ) AS jml_kasus")
    //         ->orderBy('jml_kasus', 'desc')
    //         ->get()
    //         ->getResultArray();

    //     return $this->response->setJSON(array_values($data));
    // }
    public function getDataKerawanan()
    {
        $tahun = (int) $this->request->getGet('tahun');
        if (!$tahun) {
            return $this->response->setJSON(['error' => 'Tahun tidak valid']);
        }

        $rekapModel = new RekapKerawananModel();

        $data = $rekapModel
            ->join('kelurahan', 'rekap_kerawanan_kelurahan.id_kelurahan = kelurahan.id_kelurahan')
            ->join('kecamatan', 'kelurahan.id_kecamatan = kecamatan.id_kecamatan')
            ->select('rekap_kerawanan_kelurahan.*')
            ->select('kelurahan.nama_kelurahan')
            ->select('kecamatan.nama_kecamatan')
            ->where('rekap_kerawanan_kelurahan.tahun', $tahun)
            ->orderBy('jml_kasus', 'desc')
            ->get()
            ->getResultArray();

        return $this->response->setJSON($data);
    }
    
    public function getDataKecamatan()
    {
        $kecamatan = new KecamatanModel();
        $data = $kecamatan->join('kerawanan','kerawanan.id_kecamatan = kecamatan.id_kecamatan')
                ->where('id_kabupaten',1)->findAll();
        return $this->response->setJSON($data);
    }
}
