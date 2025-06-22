<?php
echo view('header');
echo view('sidebar');
?>
<main id="main" class="main">
    <div class="pagetitle">
    <h1>Master Kabupaten</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
        <li class="breadcrumb-item active">Master Kabupaten</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
    <?php
    // Menampilkan pesan setelah proses simpan, update, atau hapus.
    if (!empty($msg)) {
        echo '<div class="alert alert-info">' . $msg . '</div>';
    }
    ?>
    <div class="mb-3 mt-3">
        <?php echo anchor(
            '/kabupaten/tambah',
            '<i class="fa-solid fa-plus"></i> Tambah Kabupaten',
            ['class' => 'btn btn-primary']
        ); ?>
    </div>
    <div style="overflow-x: auto;">
    <table class="table datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Kabupaten</th>
                <th>Nama Kabupaten</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Dibuat Pada</th>
                <th>Diperbarui Pada</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($kabupaten) && is_array($kabupaten)): ?>
            <?php $no = 1; foreach ($kabupaten as $row): ?>
            <tr>
                <td><?= $no++; ?></td> <!-- Nomor urut -->
                <td><?= $row['id_kabupaten']; ?></td>
                <td><?= esc($row['nama_kabupaten']); ?></td>
                <td><?= esc($row['latitude']); ?></td>
                <td><?= esc($row['longitude']); ?></td>
                <td><?= esc($row['created_at']); ?></td>
                <td><?= esc($row['updated_at']); ?></td>
                <td>
                    <!-- Tombol Edit -->
                    <a href="<?= site_url('kabupaten/edit/' . $row['id_kabupaten']); ?>" 
                       class="btn btn-success btn-sm">
                        <i class="fa-solid fa-edit"></i> Edit
                    </a>

                    <!-- Tombol Hapus -->
                    <a href="<?= site_url('kabupaten/delete/' . $row['id_kabupaten']); ?>" 
                       class="btn btn-danger btn-sm" 
                       onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                       <i class="fa-solid fa-trash"></i> Hapus
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="8" class="text-center">Tidak ada data ditemukan.</td>
            </tr>
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
