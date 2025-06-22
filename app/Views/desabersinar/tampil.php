<?php
echo view('header');
echo view('sidebar');
?>
<main id="main" class="main">
    <div class="pagetitle">
    <h1>Master Desa Bersinar</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
        <li class="breadcrumb-item active">Data Desa Bersinar</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
    <?php
    // Menampilkan pesan setelah proses simpan, update, dan hapus.
    if (!empty($msg)) {
        echo $msg;
    } ?>
    <div class="mb-3 mt-3">
        <?php echo anchor(
            '/desa-bersinar/tambah',
            '<i class="fa-solid fa-plus"></i> Tambah Desa Bersinar',
            ['class' => 'btn btn-primary']
        ); ?>
    </div>
    <!-- Tabel data kelurahan -->
    <div style="overflow-x: auto;">
    <table class="table datatable">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>ID Desa Bersinar</th>
                <th>Nama Kelurahan</th>
                <th>Kecamatan</th>
                <th>Tahun</th>
                <th>PIC</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $no = 1;
            if (!empty($query)) {
                foreach ($query as $baris) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $baris->id_desa_bersinar; ?></td>
                        <td><?php echo $baris->nama_kelurahan; ?></td>
                        <td><?php echo $baris->nama_kecamatan; ?></td>
                        <td><?php echo $baris->tahun; ?></td>
                        <td><?php echo $baris->pic; ?></td>
                        <td>
                           <!-- Tombol Edit -->
                           <a href="<?= site_url('desa-bersinar/edit/' . $baris->id_desa_bersinar); ?>" 
                            class="btn btn-success btn-sm">
                                <i class="fa-solid fa-edit"></i> Edit
                            </a>

                            <!-- Tombol Hapus -->
                            <a href="<?= site_url('desa-bersinar/hapus/' . $baris->id_desa_bersinar); ?>" 
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
                    <td class="text-center text-danger" colspan="6">
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
