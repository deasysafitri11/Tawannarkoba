<h3>Hasil Pencarian: "<?= esc($keyword) ?>"</h3>

<h5>Data Pengguna:</h5>
<ul>
    <?php foreach ($users as $user): ?>
        <li><?= esc($user['nama']) ?> - <?= esc($user['username']) ?></li>
    <?php endforeach; ?>
</ul>

<h5>Data Kelurahan:</h5>
<ul>
    <?php foreach ($kelurahans as $kel): ?>
        <li><?= esc($kel['nama_kelurahan']) ?></li>
    <?php endforeach; ?>
</ul>

<h5>Data Ungkap Kasus:</h5>
<ul>
    <?php foreach ($kasus as $k): ?>
        <li>
            <a href="<?= site_url('ungkap-kasus/' . $k['id_kasus']) ?>">
                <?= esc($k['BB']) ?> - <?= esc($k['JmlBB']) ?> <?= esc($k['Satuan']) ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
