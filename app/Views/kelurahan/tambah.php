<?php
echo view('header');
echo view('sidebar');
?>
<main id="main" class="main">
    <div class="pagetitle">
    <h1>Tambah Kelurahan</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url();?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('kelurahan');?>">Master Kelurahan</a></li>
        <li class="breadcrumb-item active">Tambah Data Kelurahan</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">

    <?php echo form_open('kelurahan/simpan'); ?>

        <!-- Input untuk ID Kelurahan -->
        <div class="mb-3">
            <label for="id_kelurahan" class="form-label">ID Kelurahan</label>
            <input type="text" 
                   class="form-control" 
                   id="id_kelurahan" 
                   name="id_kelurahan" 
                   placeholder="Masukkan ID kelurahan" 
                   value="<?php echo old('id_kelurahan'); ?>" 
                   required>
        </div>

        <!-- Input untuk ID Kecamatan -->
        <div class="mb-3">
    <label for="id_kecamatan" class="form-label">Kecamatan</label>
    <select class="form-select" id="id_kecamatan" name="id_kecamatan" required>
        <option value="">Pilih Kecamatan</option>
        <?php foreach ($kecamatan as $row): ?>
            <option value="<?php echo $row->id_kecamatan; ?>" 
                    <?php echo old('id_kecamatan') == $row->id_kecamatan ? 'selected' : ''; ?>>
                <?php echo $row->nama_kecamatan; ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>


       <!-- Input Nama Kelurahan-->
       <div class="mb-3">
                <label for="nama_kelurahan" class="form-label">Nama Kelurahan</label>
                <?php
                echo form_input([
                    'name' => 'nama_kelurahan',
                    'id' => 'nama_kelurahan',
                    'class' => 'form-control',
                    'autocomplete' => 'off',
                    'placeholder' => 'Masukkan Nama Kelurahan',
                    'required' => 'required',
                ]);
                ?>
            </div>

        <!-- Input untuk PIC (Penanggung Jawab) -->
       <div class="mb-3">
                <label for="pic" class="form-label">PIC</label>
                <?php
                echo form_input([
                    'name' => 'pic',
                    'id' => 'pic',
                    'class' => 'form-control',
                    'autocomplete' => 'off',
                    'placeholder' => 'Masukkan Penanggung Jawab',
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
                echo anchor('kelurahan', 'Batal', ['class' => 'btn btn-danger']);
                ?>
            </div>
        </div>
    </div>
    </form>
    <?php echo form_close(); ?>
            </section>
</main>
<?php echo view('footer'); ?>
