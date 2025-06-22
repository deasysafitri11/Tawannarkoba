<?php
echo view('header');
echo view('sidebar');
?>
<main id="main" class="main">
    <div class="pagetitle">
    <h1>Data Agen Pemulihan</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url();?>">Home</a></li>
        <li class="breadcrumb-item active">Data Agen Pemulihan</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
    <?php
    // Menampilkan pesan setelah proses simpan, update, atau hapus.
    if (!empty($msg)) {
        echo $msg;
    } ?>
    <div class="mb-3">
        <?php echo anchor(
            'agenpemulihan/tambah',
            '<i class="fa-solid fa-plus"></i> Tambah Data Agen',
            ['class' => 'btn btn-primary']
        ); ?>
    </div>
    <div style="overflow-x: auto;">
    <table class="table datatable">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>ID Agen</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Umur</th>
                <th>Golongan Umur</th>
                <th>Pekerjaan</th>
                <th>Tahun</th>
                <th>Kelurahan</th>
                <th>No HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            if (!empty($query)) { // $query adalah array hasil query dari database
                foreach ($query as $baris) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $baris['id_agen']; ?></td>
                        <td><?php echo $baris['Nama']; ?></td>
                        <td><?php echo $baris['JK']; ?></td>
                        <td><?php echo $baris['Umur']; ?></td>
                        <td><?php echo $baris['golonganumur']; ?></td>
                        <td><?php echo $baris['Pekerjaan']; ?></td>
                        <td><?php echo $baris['Tahun']; ?></td>
                        <td><?php echo $baris['nama_kelurahan']; ?></td>
                        <td><?php echo $baris['NoHp']; ?></td>
                        <td>
                        <?php echo anchor(
                                'agenpemulihan/edit/' . $baris['id_agen'],
                                '<i class="fa-solid fa-pencil"></i> Edit',
                                ['class' => 'btn btn-success']
                            ) . ' ' . anchor(
                                'agenpemulihan/hapus/' . $baris['id_agen'],
                                '<i class="fa-solid fa-trash-can"></i> Hapus',
                                [
                                    'class' => 'btn btn-danger',
                                    'onclick' => 'return confirm("Yakin ingin menghapus data ini?");'
                                ]
                            ); ?>
                        </td>
                    </tr>
                <?php
                }
            } else { ?>
                <tr>
                    <td class="text-center text-danger" colspan="14">
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
