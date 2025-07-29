<?php
// Ganti ini dengan password yang ingin kamu hash
$password = 'passwordyangbenar';

// Buat hash-nya
$hash = password_hash($password, PASSWORD_DEFAULT);

// Tampilkan hasil hash-nya
echo "Password asli: $password<br>";
echo "Hasil hash: <br><code>$hash</code>";
