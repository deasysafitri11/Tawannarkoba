<?php
use App\Models\RekapKerawananModel;
use App\Models\UngkapKasusModel;

function updateRekapKerawanan($id_kelurahan, $tahun)
{
    $ungkapKasus = new UngkapKasusModel();
    $rekap = new RekapKerawananModel();

    $kasus = $ungkapKasus->where('id_kelurahan', $id_kelurahan)
                         ->where('Tahun', $tahun)
                         ->findAll();

    $jml_kasus = count($kasus);
    $barang_bukti = [];

    $jml_bandar = 0;
    $jml_pengedar = 0;
    $jml_pengguna = 0;

    foreach ($kasus as $row) {
        // Barang Bukti
        if ($row['BB']) {
            $barang_bukti[] = $row['BB'] . ' ' . $row['JmlBB'] . ' ' . $row['Satuan'];
        }

        // MO = Modus Operandi
        $mo = strtolower(trim($row['MO']));
        if ($mo === 'penjual') {
            $jml_bandar++;
        } elseif ($mo === 'pengedar') {
            $jml_pengedar++;
        } elseif ($mo === 'menggunakan' || $mo === 'menguasai') {
            $jml_pengguna++;
        }
    }

    $bukti_str = implode(', ', $barang_bukti);

     // 🔎 Klasifikasi tingkat kerawanan
    // Hitung skor kerawanan
    // $skor = ($jml_kasus * 1) + ($jml_bandar * 2) + ($jml_pengedar * 2) + ($jml_pengguna * 1);

    // // Tentukan tingkat kerawanan berdasarkan skor
    // if ($skor > 25) {
    //     $status = 'RAWAN';
    // } elseif ($skor > 12) {
    //     $status = 'SIAGA';
    // } else {
    //     $status = 'WASPADA';
    // }

    $dataRekap = [
        'id_kelurahan' => $id_kelurahan,
        'tahun' => $tahun,
        'jml_kasus' => $jml_kasus,
        'barang_bukti' => $bukti_str,
        'jml_bandar' => $jml_bandar,
        'jml_pengedar' => $jml_pengedar,
        'jml_pengguna' => $jml_pengguna,
        'tingkat_kerawanan' => $status,
        // tambahkan jml_hiburan dan jml_kos jika sudah ada modelnya
    ];

    // Cek apakah sudah ada data sebelumnya
    $existing = $rekap->where('id_kelurahan', $id_kelurahan)->where('tahun', $tahun)->first();
    if ($existing) {
        $rekap->update($existing['id'], $dataRekap);
    } else {
        $rekap->insert($dataRekap);
    }
}
