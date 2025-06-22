<?php
echo view('header');
echo view('sidebar');
?>
<main id="main" class="main">
    <div class="pagetitle">
    <h1>Edit Kabupaten</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url();?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('kabupaten');?>">Master Kabupaten</a></li>
        <li class="breadcrumb-item active">Edit Data Kabupaten</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
    <form action="<?php echo site_url('kabupaten/update/' . $kabupaten['id_kabupaten']); ?>" method="post">
        <!-- Nama Kabupaten -->
        <div class="mb-3">
            <label for="nama_kabupaten" class="form-label">Nama Kabupaten</label>
            <input type="text" class="form-control" id="nama_kabupaten" name="nama_kabupaten" value="<?php echo esc($kabupaten['nama_kabupaten']); ?>" placeholder="Masukkan nama kabupaten" required>
        </div>
        <!-- Latitude -->
        <div class="mb-3">
            <label for="latitude" class="form-label">Latitude</label>
            <input type="text" class="form-control" id="latitude" name="latitude" value="<?php echo esc($kabupaten['latitude']); ?>" placeholder="Masukkan latitude" required>
        </div>
        <!-- Longitude -->
        <div class="mb-3">
            <label for="longitude" class="form-label">Longitude</label>
            <input type="text" class="form-control" id="longitude" name="longitude" value="<?php echo esc($kabupaten['longitude']); ?>" placeholder="Masukkan longitude" required>
        </div>
        <!-- Tombol Update -->
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Update</button>
        <a href="<?php echo site_url('kabupaten'); ?>" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    </form>
</section>
</main>
<?php echo view('footer'); ?>
