<?php include "koneksi.php"; ?>

<h3>Daftar Mahasiswa</h3>
<a href="tambah.php">Tambah Mahasiswa</a>
<br><br>

<input type="text" id="keyword" placeholder="Cari mahasiswa..." style="width:200px; padding:5px;">
<br><br>

<table border="1" cellpadding="5" cellspacing="0">
  <thead>
    <tr>
      <th>ID</th>
      <th>NIM</th>
      <th>Nama</th>
      <th>Prodi</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody id="hasil">
    <?php
    // tampilkan semua data mahasiswa (awal saat halaman dibuka)
    $result = $conn->query("SELECT * FROM mahasiswa");
    while ($row = $result->fetch_assoc()) {
      echo "
      <tr>
        <td>{$row['id']}</td>
        <td>{$row['nim']}</td>
        <td>{$row['nama']}</td>
        <td>{$row['prodi']}</td>
        <td>
          <a href='edit.php?id={$row['id']}'>Edit</a> |
          <a href='hapus.php?id={$row['id']}' onclick='return confirm(\"Yakin mau hapus data ini?\")'>Hapus</a> |
          <a href='nilai-index.php?mahasiswa_id={$row['id']}'>Lihat Nilai</a>
        </td>
      </tr>";
    }
    ?>
  </tbody>
</table>

<script>
// Fungsi dijalankan setiap kali user mengetik di input
document.querySelector("#keyword").oninput = function() {
  let key = this.value;

  // Kirim keyword ke cari.php lewat AJAX (fetch)
  fetch("cari.php?keyword=" + key)
    .then(res => res.json())
    .then(data => {
      let isi = "";
      data.forEach(m => {
        isi += `<tr>
                  <td>${m.id}</td>
                  <td>${m.nim}</td>
                  <td>${m.nama}</td>
                  <td>${m.prodi}</td>
                  <td>
                    <a href='edit.php?id=${m.id}'>Edit</a> |
                    <a href='hapus.php?id=${m.id}' onclick='return confirm("Yakin mau hapus data ini?")'>Hapus</a> |
                    <a href='nilai-index.php?mahasiswa_id=${m.id}'>Lihat Nilai</a>
                  </td>
                </tr>`;
      });

      document.querySelector("#hasil").innerHTML = isi;
    });
};
</script>
