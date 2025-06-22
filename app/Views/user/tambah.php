<?php
echo view('header');
echo view('sidebar');
?>
<main id="main" class="main">
    <div class="pagetitle">
    <h1>Tambah User</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url();?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('user');?>">master User</a></li>
        <li class="breadcrumb-item active">Tambah User</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
    <form action="<?php echo site_url('user/simpan'); ?>" method="post">
        <!-- Input untuk ID Agen -->
        <div class="mb-3">
            <label for="idagen" class="form-label">ID User</label>
            <input type="text" class="form-control" id="id_user" name="id_user" placeholder="Masukkan ID User" required>
        </div>
        <!-- Input untuk Nama -->
        <div class="mb-3">
            <label for="nama" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required>
        </div>
        <!-- Input untuk Nama -->
        <div class="mb-3">
            <label for="nama" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
        </div>
        <!-- Input untuk Nama -->
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
        </div>
        <!-- Input untuk Jenis Kelamin -->
        <div class="mb-3">
            <label for="jk" class="form-label">Hak Akses</label>
            <select class="form-select" id="hak_akses" name="hak_akses" required>
                <option value="">Hak Akses</option>
                <option value="all">All</option>
                <option value="pemberantasan">Pemberantasan</option>
                <option value="dayamas">Dayamas</option>
                <option value="rehabilitasi">Rehabilitasi</option>
                <option value="pencegahan">pencegahan</option>
            </select>
        </div>
        
        <!-- Input untuk Golongan Umur -->
        <div class="mb-3">
            <label for="golonganumur" class="form-label">Aktif</label>
            <select class="form-select" id="is_active" name="is_active" required>
                <option value="">Pilih Aktif</option>
                <option value="1">Ya</option>
                <option value="0">Tidak</option>
            </select>
        </div>
              
        <!-- Input untuk No HP -->
        <div class="mb-3">
            <label for="nohp" class="form-label">No HP</label>
            <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan nomor HP" required>
        </div>
        
        <!-- Tombol Simpan dan Kembali -->
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Simpan</button>
        <a href="<?php echo site_url('user'); ?>" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    </form>
</section>
</main>
<?php echo view('footer'); ?>
