<?php include "koneksi.php"; ?>
<?php
// Ambil ID dari URL
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM mahasiswa WHERE id=$id");
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Data Mahasiswa</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

  <div class="header">
    <h1>✏️ Edit Data Mahasiswa</h1>
    <p class="subtitle">Perbarui informasi mahasiswa dengan mudah</p>
  </div>

  <div class="top-bar">
    <a href="index.php"><button class="btn-secondary">← Kembali ke Daftar</button></a>
  </div>

  <div class="form-container">
    <form method="post" onsubmit="return validasi()">
      <div class="form-group">
        <label for="nim">NIM</label>
        <input type="text" id="nim" name="nim" value="<?= $data['nim'] ?>" required>
      </div>

      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" value="<?= $data['nama'] ?>" required>
      </div>

      <div class="form-group">
        <label for="prodi">Program Studi</label>
        <input type="text" id="prodi" name="prodi" value="<?= $data['prodi'] ?>" required>
      </div>

      <div class="form-actions">
        <input type="submit" name="update" value="Update Data" class="btn-primary">
      </div>

      <p id="pesan" class="error-msg"></p>
    </form>
  </div>

  <script>
  function validasi() {
    let nim = document.querySelector("#nim").value;
    let nama = document.querySelector("#nama").value;
    let prodi = document.querySelector("#prodi").value;
    let pesan = document.querySelector("#pesan");

    if (nim.length < 5) {
      pesan.innerHTML = "❗ NIM minimal 5 karakter!";
      return false;
    }
    if (nama === "" || prodi === "") {
      pesan.innerHTML = "❗ Nama dan Prodi tidak boleh kosong!";
      return false;
    }
    return true;
  }
  </script>

  <?php
  if (isset($_POST['update'])) {
    $nim   = $_POST['nim'];
    $nama  = $_POST['nama'];
    $prodi = $_POST['prodi'];

    $sql = "UPDATE mahasiswa SET nim='$nim', nama='$nama', prodi='$prodi' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
      echo "<script>
      Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: 'Data mahasiswa berhasil diperbarui.',
        confirmButtonColor: '#6c63ff'
      }).then(() => {
        window.location.href = 'index.php';
      });
      </script>";
    } else {
      echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
    }
  }
  ?>

</body>
</html>
