<?php
echo view('header');
echo view('sidebar');
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Sosialisasi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo site_url('sosialisasi'); ?>">Data Sosialisasi</a></li>
                <li class="breadcrumb-item active">Edit Data Sosialisasi</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <form action="<?php echo site_url('sosialisasi/update/'.$query['id']); ?>" method="post">
            <!-- Input untuk Alamat -->
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $query['alamat']; ?>" placeholder="Masukkan Alamat" required>
            </div>

            <!-- Input untuk Peserta -->
            <div class="mb-3">
                <label for="peserta" class="form-label">Peserta</label>
                <input type="text" class="form-control" id="peserta" name="peserta" value="<?php echo $query['peserta']; ?>" placeholder="Masukkan Nama Peserta" required>
            </div>

            <!-- Input untuk Tempat Sosialisasi -->
            <div class="mb-3">
                <label for="tempat_sosialisasi" class="form-label">Tempat Sosialisasi</label>
                <input type="text" class="form-control" id="tempat_sosialisasi" name="tempat_sosialisasi" value="<?php echo $query['tempat_sosialisasi']; ?>" placeholder="Masukkan Tempat Sosialisasi" required>
            </div>

            <!-- Input untuk Kelurahan -->
            <div class="mb-3">
                <label for="kel" class="form-label">Kelurahan</label>
                <select class="form-select" id="id_kelurahan" name="id_kelurahan" required>
                    <option value="">-- Pilih Kelurahan --</option>
                    <?php foreach ($kelurahan as $key) { ?>
                        <option value="<?php echo $key->id_kelurahan; ?>" <?php echo $key->id_kelurahan === $query['id_kelurahan'] ? 'selected' : ''; ?>>
                            <?php echo $key->nama_kelurahan . ', Kec. ' . $key->nama_kecamatan; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <!-- Tombol Simpan dan Kembali -->
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Simpan</button>
            <a href="<?php echo site_url('sosialisasi'); ?>" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
        </form>
    </section>
</main>

<?php echo view('footer'); ?>
