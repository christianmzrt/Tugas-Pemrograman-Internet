<?php
include "koneksi.php";

// Ambil ID mahasiswa dari URL
$mahasiswa_id = $_GET['mahasiswa_id'];

// Ambil data mahasiswa
$mhs = $conn->query("SELECT * FROM mahasiswa WHERE id = $mahasiswa_id")->fetch_assoc();
?>

<h3>Tambah Nilai untuk <?= $mhs['nama']; ?> (<?= $mhs['nim']; ?>)</h3>
<a href="nilai-index.php?mahasiswa_id=<?= $mahasiswa_id; ?>">← Kembali ke Daftar Nilai</a>
<br><br>

<form method="post" onsubmit="return validasi()">
  Mata Kuliah: <input type="text" id="mata_kuliah" name="mata_kuliah"><br><br>
  SKS: <input type="number" id="sks" name="sks" min="1" max="6"><br><br>
  Nilai Huruf:
  <select id="nilai_huruf" name="nilai_huruf" onchange="setNilaiAngka()">
    <option value="">--Pilih--</option>
    <option value="A">A</option>
    <option value="B">B</option>
    <option value="C">C</option>
    <option value="D">D</option>
    <option value="E">E</option>
  </select><br><br>
  Nilai Angka: <input type="text" id="nilai_angka" name="nilai_angka" readonly><br><br>

  <input type="submit" name="simpan" value="Simpan Nilai">
</form>

<p id="pesan" style="color:red;"></p>

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
    document.querySelector("#pesan").innerHTML = "Semua field harus diisi!";
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

  // Gunakan prepared statement agar aman
  $stmt = $conn->prepare("INSERT INTO nilai (mahasiswa_id, mata_kuliah, sks, nilai_huruf, nilai_angka) 
                          VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("isdsd", $mahasiswa_id, $mata_kuliah, $sks, $huruf, $angka);

  if ($stmt->execute()) {
    echo "<p style='color:green;'>Nilai berhasil disimpan! <a href='nilai-index.php?mahasiswa_id=$mahasiswa_id'>Kembali</a></p>";
  } else {
    echo "<p style='color:red;'>Terjadi kesalahan: " . $conn->error . "</p>";
  }
}
?>
