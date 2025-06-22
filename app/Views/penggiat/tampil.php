<?php
echo view('header');
echo view('sidebar');
?>
<main id="main" class="main">
    <div class="pagetitle">
    <h1>Data Penggiat</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url();?>">Home</a></li>
        <li class="breadcrumb-item active">Data Penggiat</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">

    <!-- Menampilkan pesan flash -->
    <?php if (session()->getFlashdata('msg')): ?>
        <div class="alert alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('msg'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Tombol tambah data -->
    <div class="mb-3">
        <?= anchor(
            'penggiat/tambah', // Route untuk tambah data
            '<i class="fa-solid fa-plus"></i> Tambah Penggiat',
            ['class' => 'btn btn-primary']
        ); ?>
    </div>
    <div style="overflow-x: auto;">
    <table class="table datatable">
        <thead class="table-primary">
            <tr>
                <th>ID Penggiat</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Umur</th>
                <th>Golongan Umur</th>
                <th>Pekerjaan</th>
                <th>Tahun</th>
                <th>Kelurahan</th>               
                <th>No HP</th>
                <th>Lembaga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($query)): ?>
                <?php foreach ($query as $baris): ?>
                    <tr>
                        <td><?= esc($baris['id_penggiat']); ?></td>
                        <td><?= esc($baris['nama']); ?></td>
                        <td><?= esc($baris['jk']); ?></td>
                        <td><?= esc($baris['umur']); ?></td>
                        <td><?= esc($baris['golonganumur']); ?></td>
                        <td><?= esc($baris['pekerjaan']); ?></td>
                        <td><?= esc($baris['tahun']); ?></td>
                        <td><?= esc($baris['nama_kelurahan']); ?></td>
                        <td><?= esc($baris['nohp']); ?></td>
                        <td><?= esc($baris['lembaga']); ?></td>
                        <td>
                            <?php echo anchor(
                                'penggiat/edit/' . $baris['id_penggiat'],
                                '<i class="fa-solid fa-pencil"></i> Edit',
                                ['class' => 'btn btn-success']
                            ) . ' ' . anchor(
                                'penggiat/hapus/' . $baris['id_penggiat'],
                                '<i class="fa-solid fa-trash-can"></i> Hapus',
                                [
                                    'class' => 'btn btn-danger',
                                    'onclick' => 'return confirm("Yakin ingin menghapus data ini?");'
                                ]
                            ); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td class="text-center text-danger" colspan="15">DATA TIDAK ADA</td>
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
