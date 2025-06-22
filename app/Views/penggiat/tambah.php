<?php
echo view('header');
echo view('sidebar');
?>
<main id="main" class="main">
    <div class="pagetitle">
    <h1>Tambah Penggiat</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url();?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('penggiat');?>">Data Penggiat</a></li>
        <li class="breadcrumb-item active">Tambah Data Penggiat</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
    <form action="<?php echo site_url('penggiat/simpan'); ?>" method="post">
       <!-- Input untuk ID -->
       <div class="mb-3">
            <label for="nama" class="form-label">ID Penggiat</label>
            <input type="text" class="form-control" id="id_penggiat" name="id_penggiat" placeholder="Masukkan ID Penggiat" required>
        </div>

        <!-- Input untuk Nama -->
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
        </div>

        <!-- Input untuk Jenis Kelamin -->
        <div class="mb-3">
            <label for="jk" class="form-label">Jenis Kelamin</label>
            <select class="form-select" id="jk" name="jk" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <!-- Input untuk Umur -->
        <div class="mb-3">
            <label for="umur" class="form-label">Umur</label>
            <input type="number" class="form-control" id="umur" name="umur" placeholder="Masukkan Umur" required>
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
            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Masukkan Pekerjaan" required>
        </div>

        <!-- Input untuk Tahun -->
        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="number" class="form-control" id="tahun" name="tahun" placeholder="Masukkan Tahun" required>
        </div>

        <!-- Input untuk Lembaga -->
        <div class="mb-3">
            <label for="lembaga" class="form-label">Lembaga</label>
            <input type="text" class="form-control" id="lembaga" name="lembaga" placeholder="Masukkan Nama Lembaga" required>
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

        <!-- Input untuk No HP -->
        <div class="mb-3">
            <label for="nohp" class="form-label">No HP</label>
            <input type="text" class="form-control" id="nohp" name="nohp" placeholder="Masukkan No HP" required>
        </div>

        
        <!-- Tombol Simpan dan Kembali -->
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Simpan</button>
        <a href="<?php echo site_url('/penggiat'); ?>" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    </form>
</section>
</main>
<?php echo view('footer'); ?>
