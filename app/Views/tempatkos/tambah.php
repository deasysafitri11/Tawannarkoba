<?php
echo view('header');
echo view('sidebar');
?>
<main id="main" class="main">
    <div class="pagetitle">
    <h1>Tambah Tempat Kos</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url();?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('tempatkos');?>">Data Tempat Kos</a></li>
        <li class="breadcrumb-item active">Tambah Data Tempat Kos</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <form action="<?php echo site_url('tempatkos/simpan'); ?>" method="post">
        <!-- Input untuk Nama Kos -->
        <div class="mb-3">
            <label for="Nama" class="form-label">Nama Kos</label>
            <input type="text" class="form-control" id="namakos" name="namakos" placeholder="Masukkan Nama Kos" required>
        </div>

        <!-- Input untuk Alamat -->
        <div class="mb-3">
            <label for="Nama" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" required>
        </div>

        <!-- Input untuk ID Kelurahan -->
        <div class="mb-3">
            <label for="id_kel" class="form-label">ID Kelurahan</label>
            <select type="combo" class="form-control" id="id_kelurahan" name="id_kelurahan" placeholder="Masukkan  kelurahan" required>
                    <option value=""> -- Pilih Kelurahan -- </option>    
                    <?php foreach($kelurahan as $kel => $key) {?>
                    <option value="<?php echo $key->id_kelurahan; ?>">
                        
                    </option>
                     <!-- Input untuk Peserta -->
        <div class="mb-3">
            <label for="Nama" class="form-label">Jumlah Kamar</label>
            <input type="text" class="form-control" id="jumlahkamar" name="jumlahkamar" placeholder="Masukkan Jumlah Kamar" required>
        </div>
        <div class="mb-3">
            <label for="Nama" class="form-label">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan" required>
        </div>

                <?php } ?>
            </select>

            </div>
        </div>
  <!-- Tombol Simpan dan Kembali -->
  <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Simpan</button>
        <a href="<?php echo site_url('tempatkos'); ?>" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    </form>
</section>
</main>
<?php echo view('footer'); ?>
