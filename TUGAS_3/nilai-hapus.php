<?php
include "koneksi.php";

// Ambil ID nilai dan ID mahasiswa dari URL
$id = $_GET['id'];
$mahasiswa_id = $_GET['mahasiswa_id'];

// Gunakan prepared statement agar lebih aman
$stmt = $conn->prepare("DELETE FROM nilai WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
  echo "<p style='color:green;'>Data nilai berhasil dihapus! <a href='nilai-index.php?mahasiswa_id=$mahasiswa_id'>Kembali</a></p>";
} else {
  echo "<p style='color:red;'>Terjadi kesalahan: " . $conn->error . "</p>";
}
?>
