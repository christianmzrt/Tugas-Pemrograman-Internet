<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Mahasiswa</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

  <div class="header">
    <h1>📘 Daftar Mahasiswa</h1>
    <p class="subtitle">Kelola data mahasiswa dengan mudah dan cepat</p>
  </div>

  <div class="top-bar">
    <div class="left">
      <input type="text" id="keyword" placeholder="Cari mahasiswa..." class="search-input">
    </div>
    <div class="right">
      <a href="tambah.php"><button class="btn-primary">+ Tambah Mahasiswa</button></a>
    </div>
  </div>

  <div class="table-container">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>NIM</th>
          <th>Nama</th>
          <th>Prodi</th>
          <th class="text-right">Aksi</th>
        </tr>
      </thead>
      <tbody id="hasil">
        <?php
        $result = $conn->query("SELECT * FROM mahasiswa");
        while ($row = $result->fetch_assoc()) {
          echo "
          <tr>
            <td>{$row['id']}</td>
            <td><strong>{$row['nim']}</strong></td>
            <td>{$row['nama']}</td>
            <td>{$row['prodi']}</td>
            <td class='aksi text-right'>
              <a href='edit.php?id={$row['id']}' class='aksi-link edit'>Edit</a>
              <a href='nilai-index.php?mahasiswa_id={$row['id']}' class='aksi-link view'>Lihat Nilai</a>
              <a href='javascript:void(0)' onclick='confirmDelete(\"hapus.php?id={$row['id']}\")' class='aksi-link delete'>Hapus</a>
            </td>
          </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <script>
    // 🔍 Pencarian Mahasiswa (AJAX)
    document.querySelector("#keyword").oninput = function() {
      let key = this.value;
      fetch("cari.php?keyword=" + key)
        .then(res => res.json())
        .then(data => {
          let isi = "";
          data.forEach(m => {
            isi += `
            <tr>
              <td>${m.id}</td>
              <td><strong>${m.nim}</strong></td>
              <td>${m.nama}</td>
              <td>${m.prodi}</td>
              <td class='aksi text-right'>
                <a href='edit.php?id=${m.id}' class='aksi-link edit'>Edit</a>
                <a href='nilai-index.php?mahasiswa_id=${m.id}' class='aksi-link view'>Lihat Nilai</a>
                <a href='javascript:void(0)' onclick='confirmDelete("hapus.php?id=${m.id}")' class='aksi-link delete'>Hapus</a>
              </td>
            </tr>`;
          });
          document.querySelector("#hasil").innerHTML = isi;
        });
    };

    // ❌ Popup Konfirmasi Hapus
    function confirmDelete(url) {
      Swal.fire({
        title: "Yakin hapus data ini?",
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
