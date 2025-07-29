<?php
echo view('header');
echo view('sidebar');
?>
<main id="main" class="main">
     <div class="pagetitle">
        <h1>Data Rekap Kerawanan per Kelurahan</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Data Rekap Kerawanan per Kelurahan</li>
            </ol>
        </nav>
    </div>
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div style="overflow-x: auto;">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Kelurahan</th>
                                    <th>Tahun</th>
                                    <th>Jumlah Kasus</th>
                                    <th>Jumlah Pengedar</th>
                                    <th>Barang Bukti</th>
                                    <th>Jumlah Bandar</th>
                                    <th>Jumlah Pengguna</th>
                                    <th>Jumlah Hiburan</th>
                                    <th>Jumlah Kos-kosan</th>
                                    <th>Diupdate</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($rekap)) : ?>
                                    <?php $no = 1; foreach ($rekap as $row): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= esc($row['nama_kelurahan']) ?></td>
                                            <td><?= esc($row['tahun']) ?></td>
                                            <td><?= esc($row['jml_kasus']) ?></td>
                                            <td><?= esc($row['jml_pengedar']) ?></td>
                                            <td><?= esc($row['barang_bukti']) ?></td>
                                            <td><?= esc($row['jml_bandar']) ?></td>
                                            <td><?= esc($row['jml_pengguna']) ?></td>
                                            <td><?= esc($row['jml_hiburan']) ?></td>
                                            <td><?= esc($row['jml_kos']) ?></td>
                                            <td><?= esc($row['updated_at']) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr><td colspan="12" class="text-center">Tidak ada data</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</main>
<?php echo view('footer'); ?>
