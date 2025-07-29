<?= view('header'); ?>
<?= view('sidebar'); ?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>My Profile</h1>
    </div>

    <section class="section">
        <div class="card p-4">
            <?php if (session()->getFlashdata('msg')) : ?>
                <div class="alert alert-success"><?= session()->getFlashdata('msg') ?></div>
            <?php endif; ?>

            <form action="<?= site_url('update-profile') ?>" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" value="<?= $user['username'] ?>" readonly>

                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" value="<?= $user['nama'] ?>">
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label">No HP</label>
                    <input type="text" class="form-control" name="no_hp" value="<?= $user['no_hp'] ?>">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password Baru (opsional)</label>
                    <input type="password" class="form-control" name="password" placeholder="Kosongkan jika tidak ingin ubah">
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </section>
</main>

<?= view('footer'); ?>
