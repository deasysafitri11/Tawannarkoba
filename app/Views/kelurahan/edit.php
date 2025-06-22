<?php
echo view('header');
echo view('sidebar');
?>
<main id="main" class="main">
    <div class="pagetitle">
    <h1>Edit Kelurahan</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url();?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('kelurahan');?>">Master Kelurahan</a></li>
        <li class="breadcrumb-item active">Edit  Kelurahan</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">

    <!-- Menampilkan pesan error jika ada -->
    <?php if (session()->getFlashdata('msg')): ?>
        <div class="alert alert-danger">
            <?php echo session()->getFlashdata('msg'); ?>
        </div>
    <?php endif; ?>

    <!-- Form Edit -->
    <form action="<?php echo site_url('kelurahan/update/'.$id); ?>" method="post">
        <!-- Input untuk ID Kelurahan (sembunyikan) -->
        <input type="hidden" name="id_kelurahan" value="<?php echo $query->id_kelurahan; ?>">

        <!-- Input untuk Kecamatan -->
        <div class="mb-3">
            <label for="id_kecamatan" class="form-label">Kecamatan</label>
            <select class="form-select" id="id_kecamatan" name="id_kecamatan" required>
                <option value="">Pilih Kecamatan</option>
                <?php foreach ($kecamatan as $row): ?>
                    <option value="<?php echo $row->id_kecamatan; ?>" 
                        <?php echo $row->id_kecamatan == $query->id_kecamatan ? 'selected' : ''; ?>>
                        <?php echo $row->nama_kecamatan; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Input untuk Nama Kelurahan -->
        <div class="mb-3">
            <label for="nama_kelurahan" class="form-label">Nama Kelurahan</label>
            <input type="text" 
                   class="form-control" 
                   id="nama_kelurahan" 
                   name="nama_kelurahan" 
                   value="<?php echo $query->nama_kelurahan; ?>" 
                   placeholder="Masukkan Nama Kelurahan" 
                   required>
        </div>

        <!-- Input untuk PIC (Penanggung Jawab) -->
        <div class="mb-3">
            <label for="pic" class="form-label">Penanggung Jawab (PIC)</label>
            <input type="text" 
                   class="form-control" 
                   id="pic" 
                   name="pic" 
                   value="<?php echo $query->pic; ?>" 
                   placeholder="Masukkan nama penanggung jawab" 
                   required>
        </div>

        <!-- Tombol Simpan dan Batal -->
        <div>
                <?php
                $simpan = [
                    'type' => 'submit',
                    'content' => 'Simpan',
                    'class' => 'btn btn-primary'
                ];
                echo form_button($simpan);
                echo anchor('kelurahan', 'Batal', ['class' => 'btn btn-danger']);
                ?>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
            </section>
</main>
<?php echo view('footer'); ?>