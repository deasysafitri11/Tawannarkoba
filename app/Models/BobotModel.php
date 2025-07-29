<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\BobotLogModel;

class BobotModel extends Model
{
    protected $table = 'bobot';
    protected $primaryKey = 'id';
    protected $allowedFields = ['jenis', 'nilai'];

    /**
     * Ambil satu data bobot berdasarkan jenis.
     */
    public function getByJenis($jenis)
    {
        return $this->where('jenis', $jenis)->first();
    }

    /**
     * Update bobot berdasarkan jenis, simpan log perubahan.
     */
    public function updateBobot($jenis, $nilai_baru)
    {
        $bobot = $this->getByJenis($jenis);
        if (!$bobot) {
            return false;
        }

        $nilai_lama = $bobot['nilai'];

        // Update nilai bobot
        $this->where('jenis', $jenis)->set(['nilai' => $nilai_baru])->update();

        // Simpan ke log
        $logModel = new \App\Models\BobotLogModel();
        $logModel->insert([
            'jenis' => $jenis,
            'nilai_lama' => $nilai_lama,
            'nilai_baru' => $nilai_baru,
            'user' => 'admin'
        ]);

        return true;
    }
    /**
     * Update nilai bobot tanpa log (untuk mass update dari controller).
     */
    public function updateByJenis($jenis, $nilai)
    {
        return $this->where('jenis', $jenis)->set(['nilai' => $nilai])->update();
    }
}