<?php
include "koneksi.php";

// Ambil ID mahasiswa dari URL
$mahasiswa_id = $_GET['mahasiswa_id'];

// Ambil data mahasiswa
$mhs = $conn->query("SELECT * FROM mahasiswa WHERE id = $mahasiswa_id")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Nilai - <?= $mhs['nama']; ?></title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

  <div class="header">
    <h1>📖 Daftar Nilai</h1>
    <p class="subtitle">Nilai Akademik - <?= $mhs['nama']; ?> (<?= $mhs['nim']; ?>)</p>
  </div>

  <div class="top-bar">
    <div class="left">
      <a href="index.php"><button class="btn-secondary">← Kembali</button></a>
    </div>
    <div class="right">
      <a href="nilai-tambah.php?mahasiswa_id=<?= $mahasiswa_id; ?>"><button class="btn-primary">+ Tambah Nilai</button></a>
    </div>
  </div>

  <div class="table-container">
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Mata Kuliah</th>
          <th>SKS</th>
          <th>Nilai Huruf</th>
          <th>Nilai Angka</th>
          <th class="text-right">Aksi</th>
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
              <td class='aksi text-right'>
                <a href='nilai_edit.php?id={$row['id']}&mahasiswa_id={$mahasiswa_id}' class='aksi-link edit'>Edit</a>
                <a href='javascript:void(0)' onclick='confirmDelete(\"nilai-hapus.php?id={$row['id']}&mahasiswa_id={$mahasiswa_id}\")' class='aksi-link delete'>Hapus</a>
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
  </div>

  <script>
    // Konfirmasi Hapus (SweetAlert)
    function confirmDelete(url) {
      Swal.fire({
        title: "Yakin hapus nilai ini?",
        text: "Data yang dihapus tidak dapat dikembalikan.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#e74c3c",
        cancelButtonColor: "#6c757d",
        confirmButtonText: "Ya, hapus"
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = url;
        }
      });
    }
  </script>

</body>
</html>
