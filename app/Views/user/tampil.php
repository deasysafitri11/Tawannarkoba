<?php
echo view('header');
echo view('sidebar');
?>
<main id="main" class="main">
    <div class="pagetitle">
    <h1>Master User</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url();?>">Home</a></li>
        <li class="breadcrumb-item active">Master User</li>
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
            'user/tambah',
            '<i class="fa-solid fa-plus"></i> Tambah User',
            ['class' => 'btn btn-primary']
        ); ?>
    </div>
    <div style="overflow-x: auto;">
    <table class="table datatable">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>ID User</th>
                <th>Username</th>
                <th>Password</th>
                <th>Nama</th>
                <th>Hak Akses</th>
                <th>No HP</th>
                <th>Aktiv</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            if (!empty($query)) { // $query adalah array hasil query dari database
                foreach ($query as $i => $baris) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $baris->id_user; ?></td>
                        <td><?php echo $baris->username; ?></td>
                        <td><?php echo $baris->password_hash; ?></td>
                        <td><?php echo $baris->nama; ?></td>
                        <td><?php echo $baris->hak_akses; ?></td>
                        <td><?php echo $baris->no_hp; ?></td>
                        <td><?php echo $baris->is_active; ?></td>
                        <td>
                        <?php echo anchor(
                                'user/edit/' . $baris->id_user,
                                '<i class="fa-solid fa-pencil"></i> Edit',
                                ['class' => 'btn btn-success']
                            ) . ' ' . anchor(
                                'user/hapus/' . $baris->id_user,
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
