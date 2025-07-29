<?php
echo view('header');
echo view('sidebar');
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Presentase Pembobotan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>">Home</a></li>
                <li class="breadcrumb-item active">Presentase Pembobotan</li>
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

        <!-- Tombol edit semua bobot -->
        <div class="mb-3">
            <?= anchor(
                'bobot/edit',
                '<i class="fa-solid fa-pencil"></i> Edit',
                ['class' => 'btn btn-primary']
            ); ?>
        </div>

        <div style="overflow-x: auto;">
            <table class="table mytable"> <!-- Ubah ke class 'mytable' -->
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Indikator</th>
                        <th>Presentase</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($bobot)): ?>
                        <?php $no = 1; foreach ($bobot as $baris): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= esc($baris['jenis']); ?></td>
                                <td><?= esc($baris['nilai']); ?>%</td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td class="text-center text-danger" colspan="3">DATA TIDAK ADA</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
</main>

<?php echo view('footer'); ?>

<!-- Tempatkan script DataTables di bawah sini (setelah view footer) -->
<script>
    $(document).ready(function() {
        $('.mytable').DataTable({
            searching: false,
            lengthChange: false
        });
    });
</script>