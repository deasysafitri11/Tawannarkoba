<?php
echo view('header');
echo view('sidebar');
?>
<main id="main" class="main">
    <div class="pagetitle">
    <h1>Tambah Desa Bersinar</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url();?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo site_url('desa-bersinar');?>">Data Desa Bersinar</a></li>
        <li class="breadcrumb-item active">Tambah Data Desa Bersinar</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">

    <?php echo form_open('desa-bersinar/simpan'); ?>

        <!-- Input untuk ID Kelurahan -->
        <div class="mb-3">
            <label for="id_kelurahan" class="form-label">ID Desa Bersinar</label>
            <input type="text" 
                   class="form-control" 
                   id="id_desa_bersinar" 
                   name="id_desa_bersinar" 
                   placeholder="Masukkan ID Desa Bersinar" 
                   value="<?php echo old('id_kelurahan'); ?>" 
                   required>
        </div>

         <!-- Input untuk ID Kelurahan -->
         <div class="mb-3">
        <label for="id_kel" class="form-label">ID Kelurahan</label>
        <select type="combo" class="form-control" id="id_kelurahan" name="id_kelurahan" placeholder="Masukkan  kelurahan" required>
            <option value=""> -- Pilih Kelurahan -- </option>
            <?php foreach($kelurahan as $kel => $key) {?>
                <option value="<?php echo $key->id_kelurahan; ?>">
                    <?php echo $key->nama_kelurahan.', Kec. '.$key->nama_kecamatan; ?>
                </option>
            <?php } ?>
        </select>

        <!-- Input untuk Tahun -->
        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="number" class="form-control" id="tahun" name="tahun" placeholder="Masukkan Tahun" required>
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
                echo anchor('desa-bersinar', 'Batal', ['class' => 'btn btn-danger']);
                ?>
            </div>
        </div>
    </div>
    </form>
    <?php echo form_close(); ?>
            </section>
</main>
<?php echo view('footer'); ?>
