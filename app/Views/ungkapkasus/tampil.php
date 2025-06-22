<?php
echo view('header');
echo view('sidebar');
?>
<main id="main" class="main">
    <div class="pagetitle">
    <h1>Data Ungkap Kasus</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Data Ungkap Kasus</li>
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
            'ungkapkasus/tambah',
            '<i class="fa-solid fa-plus"></i> Tambah Ungkap Kasus',
            ['class' => 'btn btn-primary']
        ); ?>
    </div>
    <div style="overflow-x: auto;">
    <table class="table datatable">
        <thead class="">
            <tr>
                <th>Id Kasus</th>
                <th>Nama</th>
                <th>JK</th>
                <th>Umur</th>
                <th>Golongan Umur</th>
                <th>Pekerjaan</th>
                <th>BB</th>
                <th>JmlBB</th>
                <th>Satuan</th>
                <th>MO</th>
                <th>Tahun</th>
                <th>Kel</th>
                <th>Jam</th>
                <th>TKP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody >
            <?php
            $no = 1;
            if (!empty($query)) {
                foreach ($query as $baris) { ?>
                    <tr>
                        <td><?php echo $baris['id_kasus']; ?></td>
                        <td><?php echo $baris['Nama']; ?></td>
                        <td><?php echo $baris['JK']; ?></td>
                        <td><?php echo $baris['Umur']; ?></td>
                        <td><?php echo $baris['golonganumur']; ?></td>
                        <td><?php echo $baris['Pekerjaan']; ?></td>
                        <td><?php echo $baris['BB']; ?></td>
                        <td><?php echo $baris['JmlBB']; ?></td>
                        <td><?php echo $baris['Satuan']; ?></td>
                        <td><?php echo $baris['MO']; ?></td>
                        <td><?php echo $baris['Tahun']; ?></td>
                        <td><?php echo $baris['nama_kelurahan']; ?></td>
                        <td><?php echo $baris['Jam']; ?></td>
                        <td><?php echo $baris['TKP']; ?></td>
                        
                        <td>
                            <!-- Tombol Edit -->
                            <a href="<?= site_url('ungkapkasus/edit/' . $baris['id_kasus']); ?>" 
                            class="btn btn-success btn-sm">
                                <i class="fa-solid fa-edit"></i> Edit
                            </a>

                            <!-- Tombol Hapus -->
                            <a href="<?= site_url('ungkapkasus/hapus/' . $baris['id_kasus']); ?>" 
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
