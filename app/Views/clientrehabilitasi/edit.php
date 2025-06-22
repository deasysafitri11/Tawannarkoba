<?php
echo view('header');
echo view('sidebar');
?>
<main id="main" class="main">
    <div class="pagetitle">
    <h1>Edit Klien Rehabilitasi</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url();?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('clientrehabilitasi');?>">Data Klien Rehabilitasi</a></li>
        <li class="breadcrumb-item active">Edit Data Klien Rehabilitasi</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
    <form action="<?= site_url('clientrehabilitasi/update/'.$id) ?>" method="post">
        <?= csrf_field() ?> <!-- Tambahkan CSRF protection untuk keamanan -->
        <!-- Input untuk ID Klien -->
        <div class="mb-3">
            <label for="id_klien" class="form-label">ID Klien</label>
            <input type="text" class="form-control" id="id_klien" name="id_klien" value="<?php echo $query['id_klien'];?>" placeholder="Masukkan ID klien" required>
        </div>
        <!-- Input untuk Nama -->
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="Nama" value="<?php echo $query['Nama'];?>" placeholder="Masukkan nama klien" required>
        </div>
        <!-- Input untuk Jenis Kelamin -->
        <div class="mb-3">
            <label for="jk" class="form-label">Jenis Kelamin</label>
            <select class="form-select" id="jk" name="JK" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki" <?php  echo "Laki-laki" === $query['JK'] ?  'selected' : '' ; ?> >Laki-laki</option>
                <option value="Perempuan" <?php echo "Perempuan" === $query['JK'] ?  'selected' : '' ;?> >Perempuan</option>
            </select>
        </div>
        <!-- Input untuk Umur -->
        <div class="mb-3">
            <label for="umur" class="form-label">Umur</label>
            <input type="number" class="form-control" id="umur" name="Umur" value="<?php echo $query['Umur'];?>" placeholder="Masukkan umur" required>
        </div>
        
         <!-- Input untuk Golongan Umur -->
        <div class="mb-3">
            <label for="golonganumur" class="form-label">Golongan Umur</label>
            <select class="form-select" id="golonganumur" name="golonganumur" required>
                <option value="">Pilih Golongan Umur</option>
                <option value="Anak-anak" <?php  echo "Anak-anak" === $query['golonganumur'] ?  'selected' : '' ; ?>>Anak-anak</option>
                <option value="Dewasa" <?php  echo "Dewasa" === $query['golonganumur'] ?  'selected' : '' ; ?>>Dewasa</option>
                <option value="Lansia" <?php  echo "Lansia" === $query['golonganumur'] ?  'selected' : '' ; ?>>Lansia</option>
            </select>
        </div>
        <!-- Input untuk Pekerjaan -->
        <div class="mb-3">
            <label for="pekerjaan" class="form-label">Pekerjaan</label>
            <input type="text" class="form-control" id="pekerjaan" name="Pekerjaan" value="<?php echo $query['Pekerjaan'];?>" placeholder="Masukkan pekerjaan" required>
        </div>
        <!-- Input untuk Jenis Zat -->
        <div class="mb-3">
            <label for="jenis_zat" class="form-label">Jenis Zat</label>
            <input type="text" class="form-control" id="jenis_zat" name="JenisZat" value="<?php echo $query['JenisZat'];?>" placeholder="Masukkan jenis zat" required>
        </div>
        <!-- Input untuk Kategori -->
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select" id="Kategori" name="Kategori" required>
                <option value="">Pilih Kategori</option>
                <option value="Ringan" <?php  echo "Ringan" === $query['Kategori'] ?  'selected' : '' ; ?> >Ringan</option>
                <option value="Sedang" <?php echo "Sedang" === $query['Kategori'] ?  'selected' : '' ;?> >Sedang</option>
                <option value="Berat" <?php echo "Berat" === $query['Kategori'] ?  'selected' : '' ;?> >Berat</option>
            </select>
        </div>
        <!-- Input untuk Tahun -->
        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="number" class="form-control" id="tahun" name="Tahun" value="<?php echo $query['Tahun'];?>"placeholder="Masukkan tahun" required>
        </div>
        <!-- Input untuk ID Kelurahan -->
        <div class="mb-3">
        <label for="id_kel" class="form-label">ID Kelurahan</label>
        <select type="combo" class="form-control" id="id_kelurahan" name="id_kelurahan" placeholder="Masukkan  kelurahan" required>
            <option value=""> -- Pilih Kelurahan -- </option>   
                    <?php foreach($kelurahan as $kel => $key) {?>
                    <option value="<?php echo $key->id_kelurahan; ?>"  <?php  echo $key->id_kelurahan === $query['id_kelurahan'] ?  'selected' : '' ; ?>>
                        <?php echo $key->nama_kelurahan.', Kec. '.$key->nama_kecamatan; ?>
                    </option>
            <?php } ?>
        </select>
        <!-- Input untuk Tipe -->
        <div class="mb-3">
            <label for="tipe" class="form-label">Tipe</label>
            <select class="form-select" id="Tipe" name="Tipe" required>
                <option value="">Pilih Tipe</option>
                <option value="Voluntary" <?php  echo "Voluntary" === $query['Tipe'] ?  'selected' : '' ; ?> >Voluntary</option>
                <option value="Compulsary" <?php echo "Compulsary" === $query['Tipe'] ?  'selected' : '' ;?> >Compulsary</option>
            </select>
        </div>
        <!-- Tombol Simpan dan Kembali -->
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Simpan</button>
        <a href="<?= base_url('clientrehabilitasi') ?>" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    </form>
</section>
</main>
<?php echo view('footer'); ?>
