<?php
// Array Associative: Key = NIM, Value = Nama Mahasiswa
$mahasiswa = [
    "190001" => "Andi Pratama",
    "190002" => "Budi Santoso",
    "190003" => "Citra Dewi",
    "190004" => "Dewi Lestari",
    "190005" => "Eko Saputra"
];

// Menampilkan data mahasiswa
echo "<h3>Daftar Mahasiswa:</h3>";
echo "<ul>";
foreach ($mahasiswa as $nim => $nama) {
    echo "<li>NIM: $nim - Nama: $nama</li>";
}
echo "</ul>";
?>
