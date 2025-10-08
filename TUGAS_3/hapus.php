<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Hapus Mahasiswa</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<?php
// Ambil ID dari URL
$id = $_GET['id'];

// Query hapus data
$sql = "DELETE FROM mahasiswa WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo "
  <script>
  Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: 'Data mahasiswa telah dihapus.',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Kembali ke Daftar'
  }).then(() => {
    window.location.href = 'index.php';
  });
  </script>
  ";
} else {
  echo "
  <script>
  Swal.fire({
    icon: 'error',
    title: 'Gagal Menghapus!',
    text: 'Terjadi kesalahan: " . addslashes($conn->error) . "',
    confirmButtonColor: '#e74c3c',
    confirmButtonText: 'Kembali'
  }).then(() => {
    window.location.href = 'index.php';
  });
  </script>
  ";
}
?>

</body>
</html>
