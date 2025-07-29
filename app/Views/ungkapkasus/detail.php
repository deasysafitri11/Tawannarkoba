<h2>Detail Ungkap Kasus</h2>
<table class="table table-bordered">
    <tr><th>Nama</th><td><?= esc($kasus['Nama']) ?></td></tr>
    <tr><th>Jenis Kelamin</th><td><?= esc($kasus['JK']) ?></td></tr>
    <tr><th>Umur</th><td><?= esc($kasus['Umur']) ?></td></tr>
    <tr><th>Barang Bukti</th><td><?= esc($kasus['BB']) ?> - <?= esc($kasus['JmlBB']) ?> <?= esc($kasus['Satuan']) ?></td></tr>
    <tr><th>Modus Operandi</th><td><?= esc($kasus['MO']) ?></td></tr>
    <tr><th>Tahun</th><td><?= esc($kasus['Tahun']) ?></td></tr>
</table>
