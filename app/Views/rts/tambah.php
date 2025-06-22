<?php
echo view('header');
echo view('sidebar');
?>
<main id="main" class="main">
    <div class="pagetitle">
    <h1>Tambah RTS</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url();?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('rts');?>">Data RTS</a></li>
        <li class="breadcrumb-item active">Tambah Data RTS</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
    <form action="<?php echo site_url('rts/simpan'); ?>" method="post">
       <!-- Input untuk ID -->
       <div class="mb-3">
            <label for="nama" class="form-label">ID Penggiat</label>
            <input type="text" class="form-control" id="id_penggiat" name="id_rts" placeholder="Masukkan ID RTS" required>
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

        <!-- Input untuk Tahun -->
        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="number" class="form-control" id="tahun" name="tahun" placeholder="Masukkan Tahun" required>
        </div>

        <!-- Input untuk Asal Sekolah -->
        <div class="mb-3">
            <label for="lembaga" class="form-label">Sekolah</label>
            <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" placeholder="Masukkan Nama Sekolah" required>
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
        <a href="<?php echo site_url('/rts'); ?>" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    </form>
</section>
</main>
<?php echo view('footer'); ?>
