<?php
echo view('header');
echo view('sidebar');
?>
<main id="main" class="main">
    <div class="pagetitle">
    <h1>Tambah Kabupaten</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url();?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('kabupaten');?>">Master Kabupaten</a></li>
        <li class="breadcrumb-item active">Tambah Data Kabupaten</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
    <form action="<?php echo site_url('kabupaten/simpan'); ?>" method="post">
    <div class="mb-3">
    <label for="nama_kabupaten" class="form-label">Nama Kabupaten</label>
    <select class="form-select" id="nama_kabupaten" name="nama_kabupaten" required>
        <option value="">Pilih Nama Kabupaten</option>
        <option value="Kabupaten Cilacap" 
            <?php echo (!empty($kabupaten['nama_kabupaten']) && $kabupaten['nama_kabupaten'] === 'Kabupaten Cilacap') ? 'selected' : ''; ?>>
            Kabupaten Cilacap
        </option>
        <option value="Kabupaten Kebumen" 
            <?php echo (!empty($kabupaten['nama_kabupaten']) && $kabupaten['nama_kabupaten'] === 'Kabupaten Kebumen') ? 'selected' : ''; ?>>
            Kabupaten Kebumen
        </option>
    </select>
</div>

        <!-- Latitude -->
        <div class="mb-3">
            <label for="latitude" class="form-label">Latitude</label>
            <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Masukkan latitude" required>
        </div>
        <!-- Longitude -->
        <div class="mb-3">
            <label for="longitude" class="form-label">Longitude</label>
            <input type="text" class="form-control" id="longitude" name="longitude" placeholder="Masukkan longitude" required>
        </div>
        <!-- Tombol Simpan -->
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Simpan</button>
        <a href="<?php echo site_url('kabupaten'); ?>" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    </form>
</section>
</main>
<?php echo view('footer'); ?>
