<?php
include "koneksi.php";

// Ambil ID nilai dan ID mahasiswa dari URL
$id = $_GET['id'];
$mahasiswa_id = $_GET['mahasiswa_id'];

// Gunakan prepared statement agar lebih aman
$stmt = $conn->prepare("DELETE FROM nilai WHERE id = ?");
$stmt->bind_param("i", $id);

$success = $stmt->execute();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Hapus Nilai</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>

  <div class="header">
    <h1>🗑️ Hapus Nilai</h1>
    <p class="subtitle">Status penghapusan data nilai mahasiswa</p>
  </div>

  <div class="form-container">
    <?php if ($success): ?>
      <div class="alert success">
        ✅ Data nilai berhasil dihapus!
      </div>
      <a href="nilai-index.php?mahasiswa_id=<?= $mahasiswa_id; ?>" class="btn-primary">← Kembali</a>
    <?php else: ?>
      <div class="alert error">
        ❌ Terjadi kesalahan: <?= htmlspecialchars($conn->error); ?>
      </div>
      <a href="nilai-index.php?mahasiswa_id=<?= $mahasiswa_id; ?>" class="btn-secondary">← Kembali</a>
    <?php endif; ?>
  </div>

</body>
</html>
