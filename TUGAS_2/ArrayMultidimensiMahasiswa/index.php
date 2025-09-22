<?php
// Array Multidimensi Mahasiswa
$mahasiswa = [
    ["nim" => "190001", "nama" => "Andi Pratama", "umur" => 20, "prodi" => "Teknologi Informasi"],
    ["nim" => "190002", "nama" => "Budi Santoso", "umur" => 21, "prodi" => "Teknik Informatika"],
    ["nim" => "190003", "nama" => "Citra Dewi", "umur" => 19, "prodi" => "Sistem Informasi"],
    ["nim" => "190004", "nama" => "Dewi Lestari", "umur" => 22, "prodi" => "Teknologi Informasi"],
    ["nim" => "190005", "nama" => "Eko Saputra", "umur" => 20, "prodi" => "Teknik Informatika"],
    ["nim" => "190006", "nama" => "Fajar Nugraha", "umur" => 23, "prodi" => "Sistem Informasi"],
    ["nim" => "190007", "nama" => "Gita Maharani", "umur" => 21, "prodi" => "Teknologi Informasi"],
    ["nim" => "190008", "nama" => "Hendra Wijaya", "umur" => 20, "prodi" => "Teknik Informatika"],
    ["nim" => "190009", "nama" => "Intan Permata", "umur" => 22, "prodi" => "Sistem Informasi"],
    ["nim" => "190010", "nama" => "Joko Susilo", "umur" => 19, "prodi" => "Teknologi Informasi"]
];

// Menampilkan data dalam tabel HTML
echo "<h3>Data Mahasiswa</h3>";
echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Umur</th>
        <th>Program Studi</th>
      </tr>";

foreach ($mahasiswa as $mhs) {
    echo "<tr>
            <td align='center'>{$mhs['nim']}</td>
            <td>{$mhs['nama']}</td>
            <td align='center'>{$mhs['umur']}</td>
            <td>{$mhs['prodi']}</td>
          </tr>";
}

echo "</table>";
?>
