<?php
echo view('header');
echo view('sidebar');
?>
<main id="main" class="main">
    <div class="pagetitle">
    <h1>Data Sosialisasi</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Data Sosialisasi</li>
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
            'sosialisasi/tambah',
            '<i class="fa-solid fa-plus"></i> Tambah Sosialisasi',
            ['class' => 'btn btn-primary']
        ); ?>
    </div>

    <div style="overflow-x: auto;">
    <table class="table datatable">
        <thead class="">
            <tr>
                <th>Alamat</th>
                <th>Peserta</th>
                <th>Tempat Sosialisasi</th>
                <th>Id Kelurahan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody >
            <?php
            $no = 1;
            if (!empty($query)) {
                foreach ($query as $baris) { ?>
                    <tr>
                    <td><?php echo $baris['alamat']; ?></td>
                        <td><?php echo $baris['peserta']; ?></td>
                        <td><?php echo $baris['tempat_sosialisasi']; ?></td>
                        <td><?php echo $baris['id_kelurahan']; ?></td>
                    <td>
                       <!-- Tombol Edit -->
                       <a href="<?= site_url('sosialisasi/edit/' . $baris['alamat']); ?>" 
                          class="btn btn-success btn-sm">
                          <i class="fa-solid fa-edit"></i> Edit
                         </a>
                          <!-- Tombol Hapus -->
                          <a href="<?= site_url('sosialisasi/hapus/' . $baris['alamat']); ?>" 
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

