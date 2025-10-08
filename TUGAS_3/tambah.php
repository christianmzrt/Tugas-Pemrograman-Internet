<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Mahasiswa</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

  <div class="header">
    <h1>🧾 Tambah Data Mahasiswa</h1>
    <p class="subtitle">Isi data mahasiswa baru dengan lengkap dan benar</p>
  </div>

  <div class="top-bar">
    <div class="left">
      <a href="index.php"><button class="btn-secondary">← Kembali ke Daftar</button></a>
    </div>
  </div>

  <div class="form-container">
    <form method="post" onsubmit="return validasi()" class="form-card">
      <div class="form-group">
        <label for="nim">NIM</label>
        <input type="text" id="nim" name="nim" placeholder="Masukkan NIM Mahasiswa">
      </div>

      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" placeholder="Masukkan Nama Mahasiswa">
      </div>

      <div class="form-group">
        <label for="prodi">Program Studi</label>
        <input type="text" id="prodi" name="prodi" placeholder="Masukkan Program Studi">
      </div>

      <p id="pesan" class="error-text"></p>

      <div class="form-actions">
        <button type="submit" name="simpan" class="btn-primary">💾 Simpan Data</button>
      </div>
    </form>
  </div>

  <script>
    // 🧩 Validasi Form Tambah Mahasiswa
    function validasi() {
      let nim = document.querySelector("#nim").value.trim();
      let nama = document.querySelector("#nama").value.trim();
      let prodi = document.querySelector("#prodi").value.trim();

      if (nim.length < 5) {
        document.querySelector("#pesan").innerHTML = "⚠️ NIM minimal 5 karakter!";
        return false;
      }
      if (nama === "" || prodi === "") {
        document.querySelector("#pesan").innerHTML = "⚠️ Nama dan Prodi tidak boleh kosong!";
        return false;
      }
      return true;
    }
  </script>

  <?php
  if (isset($_POST['simpan'])) {
    $nim   = trim($_POST['nim']);
    $nama  = trim($_POST['nama']);
    $prodi = trim($_POST['prodi']);

    // 🧠 Validasi NIM unik
    $cekNIM = $conn->query("SELECT * FROM mahasiswa WHERE nim='$nim'");
    if ($cekNIM->num_rows > 0) {
      // Jika NIM sudah ada
      echo "
      <script>
      Swal.fire({
        icon: 'warning',
        title: 'Duplikasi NIM!',
        text: 'NIM tersebut sudah terdaftar. Silakan gunakan NIM lain.',
        confirmButtonColor: '#f1c40f'
      });
      </script>
      ";
    } else {
      // Jika NIM belum ada, simpan data baru
      $sql = "INSERT INTO mahasiswa (nim, nama, prodi) VALUES ('$nim','$nama','$prodi')";
      if ($conn->query($sql) === TRUE) {
        echo "
        <script>
        Swal.fire({
          icon: 'success',
          title: 'Berhasil!',
          text: 'Data mahasiswa berhasil disimpan.',
          confirmButtonColor: '#3085d6'
        }).then(() => {
          window.location.href = 'index.php';
        });
        </script>
        ";
      } else {
        echo "
        <script>
        Swal.fire({
          icon: 'error',
          title: 'Gagal!',
          text: 'Terjadi kesalahan: " . $conn->error . "',
          confirmButtonColor: '#e74c3c'
        });
        </script>
        ";
      }
    }
  }
  ?>

</body>
</html>
