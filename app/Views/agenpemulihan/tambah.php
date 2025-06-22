<?php
echo view('header');
echo view('sidebar');
?>
<main id="main" class="main">
    <div class="pagetitle">
    <h1>Tambah Agen Pemulihan</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url();?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('agenpemulihan');?>">Data Agen Pemulihan</a></li>
        <li class="breadcrumb-item active">Tambah Data Agen Pemulihan</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
    <form action="<?php echo site_url('agenpemulihan/simpan'); ?>" method="post">
        <!-- Input untuk ID Agen -->
        <div class="mb-3">
            <label for="idagen" class="form-label">ID Agen</label>
            <input type="text" class="form-control" id="idagen" name="id_agen" placeholder="Masukkan ID agen" required>
        </div>
        <!-- Input untuk Nama -->
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="Nama" placeholder="Masukkan nama agen" required>
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
        <!-- Input untuk Tahun -->
        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="number" class="form-control" id="tahun" name="Tahun" placeholder="Masukkan tahun" required>
        </div>
        
        <!-- Input untuk Kelurahan -->
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
            <input type="number" class="form-control" id="nohp" name="NoHp" placeholder="Masukkan nomor HP" required>
        </div>
        
        <!-- Tombol Simpan dan Kembali -->
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Simpan</button>
        <a href="<?php echo site_url('agenpemulihan'); ?>" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    </form>
</section>
</main>
<?php echo view('footer'); ?>
