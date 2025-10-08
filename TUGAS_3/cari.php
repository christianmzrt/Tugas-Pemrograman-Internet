<?php
include "koneksi.php";

$keyword = $_GET['keyword']; // ambil keyword dari URL

// Query cari mahasiswa berdasarkan nama atau NIM
$result = $conn->query("SELECT * FROM mahasiswa 
                        WHERE nama LIKE '%$keyword%' 
                        OR nim LIKE '%$keyword%'");

// Simpan hasilnya ke array
$data = [];
while ($row = $result->fetch_assoc()) {
  $data[] = $row;
}

// Kirim hasil dalam format JSON
echo json_encode($data);
?>
