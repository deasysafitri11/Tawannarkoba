<?php
echo view('header');
echo view('sidebar');
?>
<main id="main" class="main">
    <div class="pagetitle">
    <h1>Data Tempat Kos</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Data Tempat Kos</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body" >
    <?php
    // Menampilkan pesan setelah proses simpan, update, dan hapus.
    if (!empty($msg)) {
        echo $msg;
    } ?>
    <div class="mb-3 mt-3">
        <?php echo anchor(
            'tempatkos/tambah',
            '<i class="fa-solid fa-plus"></i> Tambah Tempat Kos',
            ['class' => 'btn btn-primary']
        ); ?>
    </div>
    <div style="overflow-x: auto;">
    <table class="table datatable">
        <thead class="">
            <tr>
                <th>Nama Kos</th>
                <th>Alamat</th>
                <th>Kelurahan</th>
                <th>Jumlah Kamar</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody >
            <?php
            $no = 1;
            if (!empty($query)) {
                foreach ($query as $baris) { ?>
                    <tr>
                        <td><?= esc($baris['namakos']); ?></td>
                        <td><?= esc($baris['alamat']); ?></td>
                        <td><?= esc($baris['id_kelurahan']); ?></td>
                        <td><?= esc($baris['jumlahkamar']); ?></td>
                        <td><?= esc($baris['keterangan']); ?></td>
                        
                        <td>
                            <!-- Tombol Edit -->
                            <a href="<?= site_url('tempatkos/edit/' . $baris['id_kelurahan']); ?>" 
                            class="btn btn-success btn-sm">
                                <i class="fa-solid fa-edit"></i> Edit
                            </a>

                            <!-- Tombol Hapus -->
                            <a href="<?= site_url('tempatkos/hapus/' . $baris['id_kelurahan']); ?>" 
                            class="btn btn-danger btn-sm" 
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            <i class="fa-solid fa-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                <?php
                }
            } else { ?>
                <tr>
                    <td class="text-center text-danger" colspan="18">
                        DATA TIDAK ADA
                    </td>
                </tr>
            <?php
            } ?>
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
