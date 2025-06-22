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
        <li class="breadcrumb-item active">Edit Kecamatan</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <?php echo form_open('updatekecamatan') ?>
    <div class="row">
        <div class="col-4">
            <!-- Hidden Input untuk ID Kecamatan -->
            <?php echo form_hidden('id_kecamatan', $query->id_kecamatan); ?>

            <!-- Dropdown Kabupaten -->
            <div class="mb-3">
                <label class="form-label">Kabupaten</label>
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
                    $query->id_kabupaten,
                    'id="id_kabupaten" class="form-control" required'
                );
                ?>
                
            </div>

            <!-- Input Nama Kecamatan -->
            <div class="mb-3">
                <label class="form-label">Nama Kecamatan</label>
                <?php
                $nama_kecamatan = [
                    'name' => 'nama_kecamatan',
                    'class' => 'form-control',
                    'autocomplete' => 'off',
                    'placeholder' => 'Masukkan Nama Kecamatan',
                    'required' => 'required',
                    'value' => $query->nama_kecamatan
                ];
                echo form_input($nama_kecamatan); ?>
            </div>

            <!-- Input Latitude -->
            <div class="mb-3">
                <label class="form-label">Latitude</label>
                <?php
                $latitude = [
                    'name' => 'latitude',
                    'type' => 'text',
                    'class' => 'form-control',
                    'autocomplete' => 'off',
                    'placeholder' => 'Masukkan Latitude',
                    'required' => 'required',
                    'value' => $query->latitude
                ];
                echo form_input($latitude); ?>
            </div>

            <!-- Input Longitude -->
            <div class="mb-3">
                <label class="form-label">Longitude</label>
                <?php
                $longitude = [
                    'name' => 'longitude',
                    'type' => 'text',
                    'class' => 'form-control',
                    'autocomplete' => 'off',
                    'placeholder' => 'Masukkan Longitude',
                    'required' => 'required',
                    'value' => $query->longitude
                ];
                echo form_input($longitude); ?>
            </div>

            <!-- Tombol Simpan dan Batal -->
            <div>
                <?php
                $simpan = [
                    'type' => 'submit',
                    'content' => 'Simpan',
                    'class' => 'btn btn-primary'
                ];
                echo form_button($simpan);
                echo anchor('kecamatan', 'Batal', ['class' => 'btn btn-danger']);
                ?>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
    </section>
</main>
<?php echo view('footer'); ?>
