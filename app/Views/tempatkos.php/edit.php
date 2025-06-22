<?php
echo view('header');
echo view('sidebar');
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Tempat Kos</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo site_url('tempatkos'); ?>">Data Tempat Kos</a></li>
                <li class="breadcrumb-item active">Edit Data Tempat Kos</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <form action="<?php echo site_url('tempatkos/update/'.$query['id']); ?>" method="post">
            <!-- Input untuk Alamat -->
            <div class="mb-3">
                <label for="alamat" class="form-label">Nama Kos</label>
                <input type="text" class="form-control" id="namakos" name="namakos" value="<?php echo $query['namakos']; ?>" placeholder="Masukkan Nama Kos" required>
            </div>

            <!-- Input untuk Alamat -->
            <div class="mb-3">
                <label for="peserta" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $query['alamat']; ?>" placeholder="Masukkan Alamat" required>
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

             <!-- Input untuk Tempat -->
             <div class="mb-3">
                <label for="jumlahkamar" class="form-label">Jumlah Kamar</label>
                <input type="text" class="form-control" id="jumlahkamar" name="jumlahkamar" value="<?php echo $query['jumlahkamar']; ?>" placeholder="Masukkan Jumlah Kamar" required>
            </div>
             <!-- Input untuk Tempat -->
             <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $query['keterangan']; ?>" placeholder="Masukkan Keterangan" required>
            </div>

            <!-- Tombol Simpan dan Kembali -->
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Simpan</button>
            <a href="<?php echo site_url('tempatkos'); ?>" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
        </form>
    </section>
</main>

<?php echo view('footer'); ?>