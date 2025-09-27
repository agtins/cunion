<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

include __DIR__ . '/config.php';

/* ====== Ambil data statistik ====== */
$result_stats = $conn->query("SELECT * FROM stats ORDER BY id DESC LIMIT 1");
$stats = $result_stats->fetch_assoc();

/* ====== Update Statistik ====== */
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_stats'])) {
    $anggota  = intval($_POST['anggota']);
    $asset    = intval($_POST['asset']);
    $simpanan = intval($_POST['simpanan']);
    $pinjaman = intval($_POST['pinjaman']);
    $tabungan = intval($_POST['tabungan']);

    $sql = "INSERT INTO stats (anggota, asset, simpanan, pinjaman, tabungan)
            VALUES ('$anggota', '$asset', '$simpanan', '$pinjaman', '$tabungan')";
    $conn->query($sql);
    $stats_message = "Data statistik berhasil diperbarui!";
}

/* ====== Update Features ====== */
$feature_message = null;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_feature'])) {
    $id    = intval($_POST['id']);
    $title = $conn->real_escape_string($_POST['title']);
    $desc  = $conn->real_escape_string($_POST['description']);
    $image = $_POST['old_image'];

    // Upload baru
    if (!empty($_FILES['image']['name'])) {
        $targetDir  = __DIR__ . "/assets/img/features/";
        $fileName   = time() . "_" . basename($_FILES["image"]["name"]);
        $targetFile = $targetDir . $fileName;
        $fileType   = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $allowTypes = ["jpg","jpeg","png","gif","webp"];
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                if (!empty($_POST['old_image']) && file_exists(__DIR__ . "/" . $_POST['old_image'])) {
                    unlink(__DIR__ . "/" . $_POST['old_image']);
                }
                $image = "assets/img/features/" . $fileName;
            }
        }
    }

    $sql = "UPDATE features SET title='$title', description='$desc', image='$image' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        $feature_message = "Data Feature $id berhasil diperbarui!";
        $active_tab = "feature$id"; // set tab aktif sesuai fitur yg disave
    }
}

/* ====== Ambil semua data features ====== */
$features = [];
$result_features = $conn->query("SELECT * FROM features ORDER BY id ASC");
while ($row = $result_features->fetch_assoc()) {
    $features[$row['id']] = $row;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link href="./assets/img/cu1.png" rel="icon">
  <link href="./assets/img/cu1.png" rel="apple-touch-icon">
</head>
<body class="bg-light">
<div class="container mt-5">

  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Admin Panel</h2>
    <a href="logout.php" class="btn btn-outline-danger"><i class="bi bi-box-arrow-right"></i> Logout</a>
  </div>

  <!-- Tab Navigation -->
  <ul class="nav nav-tabs" id="adminTab" role="tablist">
  <li class="nav-item"><button class="nav-link <?= $active_tab=='stats'?'active':'' ?>" data-bs-toggle="tab" data-bs-target="#stats">Statistik</button></li>
  <?php for ($i=1; $i<=10; $i++): ?>
    <li class="nav-item"><button class="nav-link <?= $active_tab=="feature$i"?'active':'' ?>" data-bs-toggle="tab" data-bs-target="#feature<?= $i ?>">Feature <?= $i ?></button></li>
  <?php endfor; ?>
</ul>

  <!-- Tab Content -->
  <div class="tab-content p-4 bg-white shadow rounded-bottom">
    <!-- Statistik -->
    <div class="tab-pane fade <?= $active_tab=='stats'?'show active':'' ?>" id="stats">
      <?php if (!empty($stats_message)): ?>
  <div class="alert alert-success fade show auto-dismiss" role="alert">
    <?= $stats_message ?>
  </div>
<?php endif; ?>

      <form method="POST">
        <input type="hidden" name="update_stats" value="1">
        <div class="mb-2"><label>Jumlah Anggota</label><input type="number" name="anggota" class="form-control" value="<?= $stats['anggota'] ?>"></div>
        <div class="mb-2"><label>Jumlah Asset</label><input type="number" name="asset" class="form-control" value="<?= $stats['asset'] ?>"></div>
        <div class="mb-2"><label>Jumlah Simpanan</label><input type="number" name="simpanan" class="form-control" value="<?= $stats['simpanan'] ?>"></div>
        <div class="mb-2"><label>Jumlah Pinjaman</label><input type="number" name="pinjaman" class="form-control" value="<?= $stats['pinjaman'] ?>"></div>
        <div class="mb-2"><label>Jumlah Tabungan</label><input type="number" name="tabungan" class="form-control" value="<?= $stats['tabungan'] ?>"></div>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
    </div>

    <!-- Features 1–10 -->
  <?php for ($i=1; $i<=10; $i++): $f = $features[$i]; ?>
  <div class="tab-pane fade <?= $active_tab=="feature$i"?'show active':'' ?>" id="feature<?= $i ?>">
    <?php if (!empty($feature_message) && $active_tab=="feature$i"): ?>
  <div class="alert alert-success fade show auto-dismiss" role="alert">
    <?= $feature_message ?>
  </div>
<?php endif; ?>

    <form method="POST" enctype="multipart/form-data" class="card p-3">
      <input type="hidden" name="update_feature" value="1">
      <input type="hidden" name="id" value="<?= $f['id'] ?>">
      <input type="hidden" name="old_image" value="<?= htmlspecialchars($f['image']) ?>">

      <div class="mb-2">
        <label class="form-label">Judul Feature <?= $i ?></label>
        <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($f['title']) ?>">
      </div>
      <div class="mb-2">
        <label class="form-label">Deskripsi</label>
        <textarea name="description" class="form-control" rows="3"><?= htmlspecialchars($f['description']) ?></textarea>
      </div>
      <div class="mb-2">
        <label class="form-label">Gambar</label><br>
        <?php if (!empty($f['image'])): ?>
          <img src="<?= $f['image'] ?>" class="img-thumbnail mb-2" style="max-width:150px;">
        <?php endif; ?>
        <input type="file" name="image" class="form-control">
      </div>
      <button type="submit" class="btn btn-success">Update Feature <?= $i ?></button>
    </form>
  </div>
  <?php endfor; ?>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
  const alerts = document.querySelectorAll('.auto-dismiss');
  alerts.forEach(function(alert) {
    setTimeout(() => {
      alert.classList.remove('show'); // hilangkan 'show' → Bootstrap otomatis fade out
      setTimeout(() => alert.remove(), 500); // hapus elemen setelah animasi 0.5s
    }, 4000); // mulai fade out setelah 4 detik
  });
});
</script>

</body>
</html>
