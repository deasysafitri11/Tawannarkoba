<?php

namespace App\Controllers;

use App\Models\KabupatenModel;
use App\Models\KecamatanModel;

use App\Models\KelurahanModel;
use App\Models\UngkapKasusModel;
use App\Models\RekapKerawananModel;


class Dashboard extends BaseController
{
    public function index() 
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
         $kerawananModel = new \App\Models\KerawananModel();

        // Ambil semua tahun unik untuk dropdown filter
        $tahunList = $kerawananModel->select('tahun')->distinct()->orderBy('tahun', 'DESC')->findAll();

        // Ambil tahun yang dipilih (jika ada)
        $tahunDipilih = $this->request->getGet('tahun');

        // Filter data jika tahun dipilih
        if ($tahunDipilih) {
            $dataKerawanan = $kerawananModel->where('tahun', $tahunDipilih)->findAll();
        } else {
            $dataKerawanan = $kerawananModel->findAll(); // atau bisa dikosongkan []
        }

        return view('dashboard_aoc', [
            'kerawanan' => $dataKerawanan,
            'tahunList' => $tahunList,
            'tahunDipilih' => $tahunDipilih
        ]);
    }

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

    public function ujiKNN($tahun = null)
{
    helper('knn');

    $tahun = $tahun ?? date('Y');

    $model = new RekapKerawananModel();

    // Ambil data training (yang sudah punya kelas)
    $dataLatih = $model->where('tingkat_kerawanan !=', null)->findAll();

    // Ambil data uji (yang tahun-nya sesuai & belum punya klasifikasi)
    $dataUji = $model->where('tahun', $tahun)->findAll();

    foreach ($dataUji as $item) {
        $prediksi = knnKlasifikasi($item, $dataLatih, 3); // k = 3

        // Update hasil klasifikasi ke database
        $model->update($item['id'], ['tingkat_kerawanan' => $prediksi]);
    }

    return redirect()->back()->with('success', 'Klasifikasi KNN berhasil diterapkan dan disimpan!');
}

}
