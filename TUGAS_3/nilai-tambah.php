<?php include "koneksi.php"; ?>

<?php
// Ambil ID mahasiswa dari URL
$mahasiswa_id = $_GET['mahasiswa_id'];

// Ambil data mahasiswa
$mhs = $conn->query("SELECT * FROM mahasiswa WHERE id = $mahasiswa_id")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Nilai Mahasiswa</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

  <div class="header">
    <h1>➕ Tambah Nilai Mahasiswa</h1>
    <p class="subtitle">Untuk: <strong><?= $mhs['nama']; ?></strong> (<?= $mhs['nim']; ?>)</p>
  </div>

  <div class="top-bar">
    <div class="left">
      <a href="nilai-index.php?mahasiswa_id=<?= $mahasiswa_id; ?>">
        <button class="btn-primary" style="background: #9a9a9a;">← Kembali ke Daftar Nilai</button>
      </a>
    </div>
  </div>

  <div class="form-container">
    <form method="post" onsubmit="return validasi()">
      <label>Mata Kuliah</label>
      <input type="text" id="mata_kuliah" name="mata_kuliah" placeholder="Masukkan nama mata kuliah...">

      <label>SKS</label>
      <input type="number" id="sks" name="sks" min="1" max="6" placeholder="1 - 6">

      <label>Nilai Huruf</label>
      <select id="nilai_huruf" name="nilai_huruf" onchange="setNilaiAngka()">
        <option value="">-- Pilih --</option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
        <option value="E">E</option>
      </select>

      <label>Nilai Angka</label>
      <input type="text" id="nilai_angka" name="nilai_angka" readonly>

      <p id="pesan" class="text-error"></p>

      <button type="submit" name="simpan" class="btn-primary" style="margin-top:10px;">💾 Simpan Nilai</button>
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

    if (mk === "" || sks === "" || huruf === "") {
      document.querySelector("#pesan").innerHTML = "⚠️ Semua field harus diisi!";
      return false;
    }
    return true;
  }
  </script>

  <?php
  if (isset($_POST['simpan'])) {
    $mata_kuliah = $_POST['mata_kuliah'];
    $sks = $_POST['sks'];
    $huruf = $_POST['nilai_huruf'];
    $angka = $_POST['nilai_angka'];

    $stmt = $conn->prepare("INSERT INTO nilai (mahasiswa_id, mata_kuliah, sks, nilai_huruf, nilai_angka) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("isdsd", $mahasiswa_id, $mata_kuliah, $sks, $huruf, $angka);

    if ($stmt->execute()) {
      echo "
      <script>
      Swal.fire({
        icon: 'success',
        title: 'Nilai Berhasil Disimpan!',
        showConfirmButton: false,
        timer: 1800
      }).then(() => {
        window.location.href = 'nilai-index.php?mahasiswa_id=$mahasiswa_id';
      });
      </script>
      ";
    } else {
      echo "
      <script>
      Swal.fire({
        icon: 'error',
        title: 'Terjadi Kesalahan!',
        text: '" . addslashes($conn->error) . "',
        confirmButtonColor: '#e74c3c'
      });
      </script>
      ";
    }
  }
  ?>

</body>
</html>

