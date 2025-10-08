<?php include "koneksi.php"; ?>

<?php
// Ambil ID dari URL
$id = $_GET['id'];

// Query untuk hapus data berdasarkan ID
$sql = "DELETE FROM mahasiswa WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo "<p style='color:green;'>Data berhasil dihapus! <a href='index.php'>Kembali</a></p>";
} else {
  echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
}
?>
