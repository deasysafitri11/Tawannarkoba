<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <!-- Bootstrap CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f5f6fa;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .login-card {
      max-width: 400px;
      width: 100%;
      padding: 2rem;
      border-radius: 10px;
      background-color: white;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>

<div class="login-card">
  <h3 class="text-center mb-4">🔐 Login</h3>

  <?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger" role="alert">
      <?= session()->getFlashdata('error') ?>
    </div>
  <?php endif; ?>

  <form action="<?= site_url('login') ?>" method="post">
    <div class="mb-3">
      <label for="username" class="form-label">👤 Username</label>
      <input type="text" name="username" id="username" class="form-control" required placeholder="Masukkan username">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">🔒 Password</label>
      <input type="password" name="password" id="password" class="form-control" required placeholder="Masukkan password">
    </div>
    <button type="submit" class="btn btn-primary w-100">Masuk</button>
  </form>
</div>

<!-- Bootstrap JS (optional for interaksi) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
