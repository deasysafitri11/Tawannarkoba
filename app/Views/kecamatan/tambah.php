<?php
echo view('header');
echo view('sidebar');
?>
<main id="main" class="main">
    <div class="pagetitle">
    <h1>Master Kecamatan</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<? echo site_url();?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<? echo site_url('kecamatan');?>">Master Kecamatan</a></li>
        <li class="breadcrumb-item active">Tambah Kecamatan</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

    <?php echo form_open('simpankecamatan'); ?>

    <div class="row">
        <div class="col-md-6">
            <!-- Dropdown Kabupaten -->
            <div class="mb-3">
                <label for="id_kabupaten" class="form-label">Kabupaten</label>
                <?php
                $kabupatenOptions = [
                    '' => '-- Pilih Kabupaten --', // Pilihan default
                    '1' => 'Kabupaten Cilacap',
                    '2' => 'Kabupaten Kebumen',
                ];
                echo form_dropdown(
                    'id_kabupaten',
                    $kabupatenOptions,
                    '',
                    'id="id_kabupaten" class="form-control" required'
                );
                ?>
            </div>
            <!-- Input ID Kecamatan -->
            <div class="mb-3">
                <label for="id_kecamatan" class="form-label">ID Kecamatan</label>
                <?php
                echo form_input([
                    'name' => 'id_kecamatan',
                    'id' => 'id_kecamatan',
                    'class' => 'form-control',
                    'autocomplete' => 'off',
                    'placeholder' => 'Masukkan id_kecamatan',
                    'required' => 'required',
                ]);
                ?>
            </div>

            <!-- Input Nama Kecamatan -->
            <div class="mb-3">
                <label for="nama_kecamatan" class="form-label">Nama Kecamatan</label>
                <?php
                echo form_input([
                    'name' => 'nama_kecamatan',
                    'id' => 'nama_kecamatan',
                    'class' => 'form-control',
                    'autocomplete' => 'off',
                    'placeholder' => 'Masukkan Nama Kecamatan',
                    'required' => 'required',
                ]);
                ?>
            </div>

            <!-- Input Latitude -->
            <div class="mb-3">
                <label for="latitude" class="form-label">Latitude</label>
                <?php
                echo form_input([
                    'name' => 'latitude',
                    'id' => 'latitude',
                    'type' => 'text',
                    'class' => 'form-control',
                    'autocomplete' => 'off',
                    'placeholder' => 'Masukkan Latitude',
                    'required' => 'required',
                ]);
                ?>
            </div>

            <!-- Input Longitude -->
            <div class="mb-3">
                <label for="longitude" class="form-label">Longitude</label>
                <?php
                echo form_input([
                    'name' => 'longitude',
                    'id' => 'longitude',
                    'type' => 'text',
                    'class' => 'form-control',
                    'autocomplete' => 'off',
                    'placeholder' => 'Masukkan Longitude',
                    'required' => 'required',
                ]);
                ?>
            </div>

            <!-- Tombol Simpan dan Batal -->
            <div class="d-flex gap-2">
                <?php
                echo form_button([
                    'type' => 'submit',
                    'content' => 'Simpan',
                    'class' => 'btn btn-primary',
                ]);
                echo anchor('kecamatan', 'Batal', ['class' => 'btn btn-danger']);
                ?>
            </div>
        </div>
    </div>

    <?php echo form_close(); ?>
    </section>
</main>
<?php echo view('footer'); ?>
