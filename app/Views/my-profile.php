<?php
echo view('header');
echo view('sidebar');
?>

<div class="container py-4">
    <h2 class="mb-4">My Profile</h2>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="row">
        <!-- Foto Profil -->
        <div class="col-md-4 text-center">
            <img src="<?= base_url('public/uploads/profil/' . ($user['foto'] ?? 'default.png')) ?>" alt="Foto Profil" class="img-thumbnail mb-3" style="max-width: 200px;" id="previewFoto">

            <div class="mb-3">
                <label for="foto" class="form-label">Ganti Foto</label>
                <input class="form-control" type="file" name="foto" id="foto" onchange="previewGambar(event)">
            </div>
        </div>

        <!-- Form Profil -->
        <div class="col-md-8">
            <form action="<?= base_url('my-profile/update') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" value="<?= $user['username'] ?>" required>
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" value="<?= $user['nama'] ?>" required>
                </div>

                <div class="mb-3">
                    <label for="no_hp" class="form-label">No HP</label>
                    <input type="text" name="no_hp" class="form-control" value="<?= $user['no_hp'] ?>" pattern="[0-9]{10,13}" required>
                    <div class="form-text">Masukkan nomor tanpa spasi (10-13 digit)</div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password Baru (opsional)</label>
                    <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak diganti">
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>

<script>
function previewGambar(event) {
    const input = event.target;
    const reader = new FileReader();

    reader.onload = function() {
        const preview = document.getElementById('previewFoto');
        preview.src = reader.result;
    };

    if (input.files && input.files[0]) {
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

<?php echo view('footer'); ?>
