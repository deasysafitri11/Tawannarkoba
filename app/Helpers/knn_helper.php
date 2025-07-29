<?php

function hitungEuclideanDistance($data1, $data2)
{
    $sum = 0;
    foreach ($data1 as $key => $value) {
        $sum += pow($value - $data2[$key], 2);
    }
    return sqrt($sum);
}

function knnKlasifikasi($dataUji, $dataLatih, $k = 3)
{
    $jarak = [];

    foreach ($dataLatih as $latih) {
        $fiturLatih = [
            'jml_kasus' => $latih['jml_kasus'],
            'jml_bandar' => $latih['jml_bandar'],
            'jml_pengguna' => $latih['jml_pengguna'],
            'jml_hiburan' => $latih['jml_hiburan'],
            'jml_kos' => $latih['jml_kos']
        ];

        $fiturUji = [
            'jml_kasus' => $dataUji['jml_kasus'],
            'jml_bandar' => $dataUji['jml_bandar'],
            'jml_pengguna' => $dataUji['jml_pengguna'],
            'jml_hiburan' => $dataUji['jml_hiburan'],
            'jml_kos' => $dataUji['jml_kos']
        ];

        $jarak[] = [
            'jarak' => hitungEuclideanDistance($fiturUji, $fiturLatih),
            'kelas' => $latih['tingkat_kerawanan']
        ];
    }

    // Urutkan berdasarkan jarak
    usort($jarak, fn($a, $b) => $a['jarak'] <=> $b['jarak']);

    // Ambil K terdekat
    $kNearest = array_slice($jarak, 0, $k);

    // Hitung voting
    $votes = array_count_values(array_column($kNearest, 'kelas'));

    // Kelas dengan jumlah terbanyak
    arsort($votes);
    return array_key_first($votes);
}
