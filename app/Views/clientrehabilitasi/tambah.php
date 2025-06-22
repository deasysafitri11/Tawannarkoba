<?php
echo view('header');
echo view('sidebar');
?>
<main id="main" class="main">
    <div class="pagetitle">
    <h1>Tambah Klien Rehabilitasi</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url();?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('clientrehabilitasi');?>">Data Klien Rehabilitasi</a></li>
        <li class="breadcrumb-item active">Tambah Data Klien Rehabilitasi</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
    <form action="<?= base_url('clientrehabilitasi/simpan') ?>" method="post">
        <?= csrf_field() ?> <!-- Tambahkan CSRF protection untuk keamanan -->
        <!-- Input untuk ID Klien -->
        <div class="mb-3">
            <label for="id_klien" class="form-label">ID Klien</label>
            <input type="text" class="form-control" id="id_klien" name="id_klien" placeholder="Masukkan ID klien" required>
        </div>
        <!-- Input untuk Nama -->
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="Nama" placeholder="Masukkan nama klien" required>
        </div>
        <!-- Input untuk Jenis Kelamin -->
        <div class="mb-3">
            <label for="jk" class="form-label">Jenis Kelamin</label>
            <select class="form-select" id="jk" name="JK" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <!-- Input untuk Umur -->
        <div class="mb-3">
            <label for="umur" class="form-label">Umur</label>
            <input type="number" class="form-control" id="umur" name="Umur" placeholder="Masukkan umur" required>
        </div>
        
         <!-- Input untuk Golongan Umur -->
        <div class="mb-3">
            <label for="golonganumur" class="form-label">Golongan Umur</label>
            <select class="form-select" id="golonganumur" name="golonganumur" required>
                <option value="">Pilih Golongan Umur</option>
                <option value="Anak-anak">Anak-anak</option>
                <option value="Dewasa">Dewasa</option>
                <option value="Lansia">Lansia</option>
            </select>
        </div>
        <!-- Input untuk Pekerjaan -->
        <div class="mb-3">
            <label for="pekerjaan" class="form-label">Pekerjaan</label>
            <input type="text" class="form-control" id="pekerjaan" name="Pekerjaan" placeholder="Masukkan pekerjaan" required>
        </div>
        <!-- Input untuk Jenis Zat -->
        <div class="mb-3">
            <label for="jenis_zat" class="form-label">Jenis Zat</label>
            <input type="text" class="form-control" id="jenis_zat" name="JenisZat" placeholder="Masukkan jenis zat" required>
        </div>
        <!-- Input untuk Kategori -->
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select" id="Kategori" name="Kategori" required>
                <option value="">Pilih Kategori</option>
                <option value="Ringan">Ringan</option>
                <option value="Sedang">Sedang</option>
                <option value="Berat">Berat</option>
            </select>
        </div>
        <!-- Input untuk Tahun -->
        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="number" class="form-control" id="tahun" name="Tahun" placeholder="Masukkan tahun" required>
        </div>
        <!-- Input untuk ID Kelurahan -->
        <div class="mb-3">
        <label for="id_kel" class="form-label">ID Kelurahan</label>
        <select type="combo" class="form-control" id="id_kelurahan" name="id_kelurahan" placeholder="Masukkan  kelurahan" required>
            <option value=""> -- Pilih Kelurahan -- </option>
            <?php foreach($kelurahan as $kel => $key) {?>
                <option value="<?php echo $key->id_kelurahan; ?>">
                    <?php echo $key->nama_kelurahan.', Kec. '.$key->nama_kecamatan; ?>
                </option>
            <?php } ?>
        </select>
        <!-- Input untuk Tipe -->
        <div class="mb-3">
            <label for="tipe" class="form-label">Tipe</label>
            <select class="form-select" id="Tipe" name="Tipe" required>
                <option value="">Pilih Tipe</option>
                <option value="Voluntary">Voluntary</option>
                <option value="Compulsary">Compulsary</option>
            </select>
        </div>
        <!-- Tombol Simpan dan Kembali -->
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Simpan</button>
        <a href="<?= base_url('clientrehabilitasi') ?>" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    </form>
</section>
</main>
<?php echo view('footer'); ?>
