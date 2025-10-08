<?php
include "koneksi.php";

// ambil ID mahasiswa dari URL
$mahasiswa_id = $_GET['mahasiswa_id'];

// ambil data mahasiswa
$mhs = $conn->query("SELECT * FROM mahasiswa WHERE id = $mahasiswa_id")->fetch_assoc();
?>

<h3>Daftar Nilai - <?= $mhs['nama']; ?> (<?= $mhs['nim']; ?>)</h3>
<a href="index.php">← Kembali ke Daftar Mahasiswa</a> |
<a href="nilai-tambah.php?mahasiswa_id=<?= $mahasiswa_id; ?>">Tambah Nilai</a>
<br><br>

<table border="1" cellpadding="5" cellspacing="0">
  <thead>
    <tr>
      <th>No</th>
      <th>Mata Kuliah</th>
      <th>SKS</th>
      <th>Nilai Huruf</th>
      <th>Nilai Angka</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    $sql = "SELECT * FROM nilai WHERE mahasiswa_id = $mahasiswa_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "
        <tr>
          <td>{$no}</td>
          <td>{$row['mata_kuliah']}</td>
          <td>{$row['sks']}</td>
          <td>{$row['nilai_huruf']}</td>
          <td>{$row['nilai_angka']}</td>
          <td>
            <a href='nilai-edit.php?id={$row['id']}&mahasiswa_id={$mahasiswa_id}'>Edit</a> |
            <a href='nilai-hapus.php?id={$row['id']}&mahasiswa_id={$mahasiswa_id}' onclick='return confirm(\"Yakin mau hapus nilai ini?\")'>Hapus</a>
          </td>
        </tr>";
        $no++;
      }
    } else {
      echo "<tr><td colspan='6' align='center'>Belum ada data nilai.</td></tr>";
    }
    ?>
  </tbody>
</table>
