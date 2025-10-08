<?php
include "koneksi.php";

// Ambil ID nilai dan ID mahasiswa dari URL
$id = $_GET['id'];
$mahasiswa_id = $_GET['mahasiswa_id'];

// Ambil data nilai berdasarkan ID
$nilai = $conn->query("SELECT * FROM nilai WHERE id = $id")->fetch_assoc();

// Ambil data mahasiswa untuk judul
$mhs = $conn->query("SELECT * FROM mahasiswa WHERE id = $mahasiswa_id")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Nilai - <?= $mhs['nama']; ?></title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

  <div class="header">
    <h1>✏️ Edit Nilai</h1>
    <p class="subtitle">Perbarui data nilai untuk <?= $mhs['nama']; ?> (<?= $mhs['nim']; ?>)</p>
  </div>

  <div class="top-bar">
    <a href="nilai-index.php?mahasiswa_id=<?= $mahasiswa_id; ?>">
      <button class="btn-secondary">← Kembali ke Daftar Nilai</button>
    </a>
  </div>

  <div class="form-container">
    <form method="post" onsubmit="return validasi()">
      <div class="form-group">
        <label for="mata_kuliah">Mata Kuliah</label>
        <input type="text" id="mata_kuliah" name="mata_kuliah" value="<?= $nilai['mata_kuliah']; ?>">
      </div>

      <div class="form-group">
        <label for="sks">SKS</label>
        <input type="number" id="sks" name="sks" min="1" max="6" value="<?= $nilai['sks']; ?>">
      </div>

      <div class="form-group">
        <label for="nilai_huruf">Nilai Huruf</label>
        <select id="nilai_huruf" name="nilai_huruf" onchange="setNilaiAngka()">
          <option value="">--Pilih--</option>
          <option value="A" <?= $nilai['nilai_huruf'] == 'A' ? 'selected' : ''; ?>>A</option>
          <option value="B" <?= $nilai['nilai_huruf'] == 'B' ? 'selected' : ''; ?>>B</option>
          <option value="C" <?= $nilai['nilai_huruf'] == 'C' ? 'selected' : ''; ?>>C</option>
          <option value="D" <?= $nilai['nilai_huruf'] == 'D' ? 'selected' : ''; ?>>D</option>
          <option value="E" <?= $nilai['nilai_huruf'] == 'E' ? 'selected' : ''; ?>>E</option>
        </select>
      </div>

      <div class="form-group">
        <label for="nilai_angka">Nilai Angka</label>
        <input type="text" id="nilai_angka" name="nilai_angka" value="<?= $nilai['nilai_angka']; ?>" readonly>
      </div>

      <div class="form-actions">
        <input type="submit" name="update" value="Update Nilai" class="btn-primary">
      </div>

      <p id="pesan" class="error-msg"></p>
    </form>
  </div>

  <script>
  function setNilaiAngka() {
    const huruf = document.querySelector("#nilai_huruf").value;
    const angkaInput = document.querySelector("#nilai_angka");
    switch (huruf) {
      case "A": angkaInput.value = 4.00; break;
      case "B": angkaInput.value = 3.00; break;
      case "C": angkaInput.value = 2.00; break;
      case "D": angkaInput.value = 1.00; break;
      case "E": angkaInput.value = 0.00; break;
      default: angkaInput.value = "";
    }
  }

  function validasi() {
    let mk = document.querySelector("#mata_kuliah").value;
    let sks = document.querySelector("#sks").value;
    let huruf = document.querySelector("#nilai_huruf").value;
    let pesan = document.querySelector("#pesan");

    if (mk === "" || sks === "" || huruf === "") {
      pesan.innerHTML = "❗ Semua field harus diisi!";
      return false;
    }
    return true;
  }
  </script>

<?php
if (isset($_POST['update'])) {
  $mata_kuliah = $_POST['mata_kuliah'];
  $sks = $_POST['sks'];
  $huruf = $_POST['nilai_huruf'];
  $angka = $_POST['nilai_angka'];

  $stmt = $conn->prepare("UPDATE nilai 
                          SET mata_kuliah = ?, sks = ?, nilai_huruf = ?, nilai_angka = ? 
                          WHERE id = ?");
  $stmt->bind_param("sdsdi", $mata_kuliah, $sks, $huruf, $angka, $id);

  if ($stmt->execute()) {
    echo "<script>
      Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: 'Data nilai berhasil diperbarui.',
        confirmButtonColor: '#6c63ff'
      }).then(() => {
        window.location.href = 'nilai-index.php?mahasiswa_id=$mahasiswa_id';
      });
    </script>";
  } else {
    echo "<script>
      Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: 'Terjadi kesalahan saat memperbarui data.',
        confirmButtonColor: '#e74c3c'
      });
    </script>";
  }
}
?>
</body>
</html>
