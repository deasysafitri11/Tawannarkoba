<?= view('header') ?>
<?= view('sidebar') ?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Edit Bobot</h1>
  </div>

  <section class="section">
    <?php if (session()->getFlashdata('msg')): ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
    <?php endif; ?>

    <form action="<?= base_url('bobot/update') ?>" method="post" id="bobotForm">
      <div class="row">
        <?php
        $fields = ['bandar', 'pengedar', 'pengguna', 'klien', 'kosthm'];
        foreach ($fields as $field):
        ?>
        <div class="col-md-6 mb-3">
          <label class="form-label"><?= ucfirst($field) ?> (%)</label>
          <input type="number" class="form-control" name="<?= $field ?>" id="<?= $field ?>"
                 value="<?= esc($bobot[$field]) ?>" min="0" max="100" required>
        </div>
        <?php endforeach; ?>
      </div>

      <div class="mb-3">
        <label>Total: <span id="totalDisplay" class="fw-bold text-primary">0%</span></label>
      </div>

      <button type="submit" class="btn btn-success">Simpan</button>
      <a href="<?= base_url('bobot') ?>" class="btn btn-secondary">Kembali</a>
    </form>
  </section>
</main>

<script>
  const inputs = document.querySelectorAll('input[type=number]');
  const totalDisplay = document.getElementById('totalDisplay');

  function updateTotal() {
    let total = 0;
    inputs.forEach(i => total += parseFloat(i.value) || 0);
    totalDisplay.textContent = total + '%';
    totalDisplay.classList.toggle('text-danger', total !== 100);
    totalDisplay.classList.toggle('text-success', total === 100);
  }

  inputs.forEach(i => i.addEventListener('input', updateTotal));
  updateTotal();
</script>

<?= view('footer') ?>