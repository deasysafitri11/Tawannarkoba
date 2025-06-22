<?php
echo view('header');
echo view('sidebar');
?>
<main id="main" class="main">
    <div class="pagetitle">
    <h1>Data Klien Rehabilitasi</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url();?>">Home</a></li>
        <li class="breadcrumb-item active">Data Klien Rehabilitasi</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
    <?php
    // Menampilkan pesan setelah proses simpan, update, atau hapus.
    if (!empty($msg)) {
        echo '<div class="alert alert-info">' . $msg . '</div>';
    }
    ?>
    <div class="mb-3">
        <?php echo anchor(
            'tambahclientrehabilitasi/',
            '<i class="fa-solid fa-plus"></i> Tambah Klien',
            ['class' => 'btn btn-primary']
        ); ?>
    </div>
    <div style="overflow-x: auto;">
    <table class="table datatable">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>ID Klien</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Umur</th>
                <th>Golongan Umur</th>
                <th>Pekerjaan</th>
                <th>Jenis Zat</th>
                <th>Kategori</th>
                <th>Kelurahan</th>
                <th>Tahun</th>
                <th>Tipe</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            // Memastikan variabel $query tersedia dan berisi data
            if (!empty($query) && is_array($query)) { 
                foreach ($query as $baris) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo esc($baris['id_klien']); ?></td>
                        <td><?php echo esc($baris['Nama']); ?></td>
                        <td><?php echo esc($baris['JK']); ?></td>
                        <td><?php echo esc($baris['Umur']); ?></td>
                        <td><?php echo esc($baris['golonganumur']); ?></td>
                        <td><?php echo esc($baris['Pekerjaan']); ?></td>
                        <td><?php echo esc($baris['JenisZat']); ?></td>
                        <td><?php echo esc($baris['Kategori']); ?></td>
                        <td><?php echo esc($baris['nama_kelurahan']); ?></td>
                        <td><?php echo esc($baris['Tahun']); ?></td>
                        <td><?php echo esc($baris['Tipe']); ?></td>
                        <td>
                            <?php echo anchor(
                                'clientrehabilitasi/edit/' . $baris['id_klien'],
                                '<i class="fa-solid fa-pencil"></i> Edit',
                                ['class' => 'btn btn-success']
                            ) . ' ' . anchor(
                                'clientrehabilitasi/hapus/' . $baris['id_klien'],
                                '<i class="fa-solid fa-trash-can"></i> Hapus',
                                [
                                    'class' => 'btn btn-danger',
                                    'onclick' => 'return confirm("Yakin ingin menghapus data ini?");'
                                ]
                            ); ?>
                        </td>
                    </tr>
                <?php }
            } else { ?>
                <tr>
                    <td class="text-center text-danger" colspan="11">
                        DATA BELUM ADA
                    </td>
                </tr>
            <?php } ?>
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
