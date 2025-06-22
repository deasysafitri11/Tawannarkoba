<?php
echo view('header');
echo view('sidebar');
?>

<main id="main" class="main">
    <div class="pagetitle">
    <h1>Edit Ungkap Kasus</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url();?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('ungkapkasus');?>">Data Ungkap Kasus</a></li>
        <li class="breadcrumb-item active">Edit Data Ungkap Kasus</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
    <form action="<?php echo site_url('ungkapkasus/update/'.$query['id_kasus']); ?>" method="post">
        <!-- Input untuk Id Kasus -->
        <div class="mb-3">
            <label for="Nama" class="form-label">Id Kasus</label>
            <input type="text" class="form-control" id="id_kasus" value="<?php echo $query['id_kasus'];?>" name="id_kasus" placeholder="Masukkan Id Kasus" required>
        </div>

        <!-- Input untuk Nama -->
        <div class="mb-3">
            <label for="Nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="Nama" name="Nama" value="<?php echo $query['Nama'];?>" placeholder="Masukkan Nama" required>
        </div>
        
        <!-- Input untuk Jenis Kelamin -->
        <div class="mb-3">
            <label for="JK" class="form-label">Jenis Kelamin</label>
            <select class="form-select" id="JK" name="JK" value="<?php echo $query['JK'];?>" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki" <?php  echo "Laki-laki" === $query['JK'] ?  'selected' : '' ; ?> >Laki-laki</option>
                <option value="Perempuan" <?php echo "Perempuan" === $query['JK'] ?  'selected' : '' ;?> >Perempuan</option>
            </select>
        </div>
        
        <!-- Input untuk Umur -->
        <div class="mb-3">
            <label for="Umur" class="form-label">Umur</label>
            <input type="number" class="form-control" id="Umur" name="Umur" value="<?php echo $query['Umur'];?>" placeholder="Masukkan Umur" required>
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
            <label for="Pekerjaan" class="form-label">Pekerjaan</label>
            <input type="text" class="form-control" id="Pekerjaan" name="Pekerjaan" value="<?php echo $query['Pekerjaan'];?>" placeholder="Masukkan Pekerjaan" required>
        </div>
        
        <!-- Input untuk Berat Barang Bukti (BB) -->
        <div class="mb-3">
            <label for="BB" class="form-label">Barang Bukti</label>
            <input type="text" class="form-control" id="BB" name="BB" value="<?php echo $query['BB'];?>" placeholder="Masukkan  Barang Bukti" required>
        </div>

        <div class="mb-3">
            <label for="BB" class="form-label">Jumlah / Berat Barang Bukti</label>
            <input type="text" class="form-control" id="JmlBB" name="JmlBB" value="<?php echo $query['JmlBB'];?>" placeholder="Masukkan Jumlah/ Berat Barang Bukti" required>
        </div>
        
        <!-- Input untuk Satuan -->
        <div class="mb-3">
            <label for="Satuan" class="form-label">Satuan</label>
            <select class="form-select" id="Satuan" name="Satuan" required>
                <option value="">Pilih Satuan</option>
                <option value="Gram" <?php  echo "Gram" === $query['Satuan'] ?  'selected' : '' ; ?>>Gram</option>
                <option value="Kilogram" <?php  echo "Kilogram" === $query['Satuan'] ?  'selected' : '' ; ?>>Kilogram</option>
            </select>
        </div>
        
        <!-- Input untuk Modus Operandi (MO) -->
        <div class="mb-3">
            <label for="MO" class="form-label">Modus Operandi</label>
            <input type="text" class="form-control" id="MO" name="MO" value="<?php echo $query['MO'];?>" placeholder="Masukkan Modus Operandi" required>
        </div>
        
        <!-- Input untuk Tahun -->
        <div class="mb-3">
            <label for="Tahun" class="form-label">Tahun</label>
            <input type="number" class="form-control" id="Tahun" name="Tahun" value="<?php echo $query['Tahun'];?>" placeholder="Masukkan Tahun" required>
        </div>
        
        <!-- Input untuk Jam -->
        <div class="mb-3">
            <label for="Jam" class="form-label">Jam</label>
            <input type="time" class="form-control" id="Jam" name="Jam" value="<?php echo $query['Jam'];?>" required>
        </div>
        
        <!-- Input untuk TKP -->
        <div class="mb-3">
            <label for="TKP" class="form-label">Tempat Kejadian Perkara (TKP)</label>
            <input type="text" class="form-control" id="TKP" name="TKP" value="<?php echo $query['TKP'];?>" placeholder="Masukkan Lokasi TKP" required>
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

        </div>
        </div>

        <!-- <div class="mb-3">
            <label for="id_kel" class="form-label">ID Kelurahan</label>
            <input type="text" class="form-control" id="id_kel" name="IdKel" placeholder="Masukkan ID kelurahan" required>
        </div> -->

        <!-- Tombol Simpan dan Kembali -->
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Simpan</button>
        <a href="<?php echo site_url('ungkapkasus'); ?>" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    </form>
</section>
</main>
<?php echo view('footer'); ?>
