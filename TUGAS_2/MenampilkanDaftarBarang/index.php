<?php
// Array Indexed berisi daftar barang
$barang = ["Buku Tulis", "Pulpen", "Penggaris", "Penghapus", "Spidol"];

// Menampilkan daftar barang dalam bentuk list HTML
echo "<h3>Daftar Barang:</h3>";
echo "<ul>";
foreach ($barang as $b) {
    echo "<li>$b</li>";
}
echo "</ul>";
?>