<?php
// Array Associative: Key = Nama Barang, Value = Harga
$hargaBarang = [
    "Buku Tulis" => 5000,
    "Pulpen" => 3000,
    "Penggaris" => 4000,
    "Penghapus" => 2000,
    "Spidol" => 8000
];

// Menampilkan tabel harga barang
echo "<h3>Daftar Harga Barang:</h3>";
echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr>
        <th>Nama Barang</th>
        <th>Harga (Rp)</th>
      </tr>";

foreach ($hargaBarang as $barang => $harga) {
    echo "<tr>
            <td align='left'>$barang</td>
            <td align='right'>" . number_format($harga, 0, ',', '.') . "</td>
          </tr>";
}

echo "</table>";
?>