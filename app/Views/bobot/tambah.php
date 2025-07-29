<?php
echo view('header');
echo view('sidebar');
?>
<main id="main" class="main">
    <div class="pagetitle">
    <h1>Tambah Bobot</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url();?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('bobot');?>">Data Bobot</a></li>
        <li class="breadcrumb-item active">Tambah Data Bobot</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">

    <?php echo form_open('bobot/simpan'); ?>

        <!-- Input untuk Jenis -->
        <div class="mb-3">
            <label for="jenis" class="form-label">Jenis</label>
            <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Masukkan Jenis" required>
        </div>
        <div class="mb-3">
            <label for="nilai" class="form-label">Nilai</label>
            <input type="number" class="form-control" id="nilai" name="nilai" placeholder="Masukkan Nilai" required>
        </div>
         <!-- Tombol Simpan dan Batal -->
         <div class="d-flex gap-2">
                <?php
                echo form_button([
                    'type' => 'submit',
                    'content' => 'Simpan',
                    'class' => 'btn btn-primary',
                ]);
                echo anchor('bobot', 'Batal', ['class' => 'btn btn-danger']);
                ?>
            </div>
        </div>
    </div>
    </form>
    <?php echo form_close(); ?>
            </section>
</main>
<?php echo view('footer'); ?>