<?php
session_start();

// Username & password sederhana (bisa disimpan di database juga)
$valid_username = "admin";
$valid_password = "12345"; // ganti dengan password kuat

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['logged_in'] = true;
        header("Location: admin.php");
        exit;
    } else {
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="./assets/img/cu1.png" rel="icon">
  <link href="./assets/img/cu1.png" rel="apple-touch-icon">
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="height:100vh;">
  <div class="card p-4 shadow" style="width: 400px;">
    <h3 class="mb-3 text-center">Login Admin</h3>
    <?php if (!empty($error)): ?>
      <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <form method="POST">
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary w-100 mb-2">Login</button>
      <br>
      <!-- Tombol kembali ke index.php -->
      <a href="index.php" class="btn btn-danger w-100">← Kembali ke Beranda</a>
    </form>
  </div>
</body>
</html>
