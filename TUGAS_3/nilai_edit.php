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

<h3>Edit Nilai untuk <?= $mhs['nama']; ?> (<?= $mhs['nim']; ?>)</h3>
<a href="nilai-index.php?mahasiswa_id=<?= $mahasiswa_id; ?>">← Kembali ke Daftar Nilai</a>
<br><br>

<form method="post" onsubmit="return validasi()">
  Mata Kuliah: <input type="text" id="mata_kuliah" name="mata_kuliah" value="<?= $nilai['mata_kuliah']; ?>"><br><br>
  SKS: <input type="number" id="sks" name="sks" min="1" max="6" value="<?= $nilai['sks']; ?>"><br><br>
  Nilai Huruf:
  <select id="nilai_huruf" name="nilai_huruf" onchange="setNilaiAngka()">
    <option value="">--Pilih--</option>
    <option value="A" <?= $nilai['nilai_huruf'] == 'A' ? 'selected' : ''; ?>>A</option>
    <option value="B" <?= $nilai['nilai_huruf'] == 'B' ? 'selected' : ''; ?>>B</option>
    <option value="C" <?= $nilai['nilai_huruf'] == 'C' ? 'selected' : ''; ?>>C</option>
    <option value="D" <?= $nilai['nilai_huruf'] == 'D' ? 'selected' : ''; ?>>D</option>
    <option value="E" <?= $nilai['nilai_huruf'] == 'E' ? 'selected' : ''; ?>>E</option>
  </select><br><br>
  Nilai Angka: <input type="text" id="nilai_angka" name="nilai_angka" value="<?= $nilai['nilai_angka']; ?>" readonly><br><br>

  <input type="submit" name="update" value="Update Nilai">
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
if (isset($_POST['update'])) {
  $mata_kuliah = $_POST['mata_kuliah'];
  $sks = $_POST['sks'];
  $huruf = $_POST['nilai_huruf'];
  $angka = $_POST['nilai_angka'];

  // Gunakan prepared statement agar aman
  $stmt = $conn->prepare("UPDATE nilai 
                          SET mata_kuliah = ?, sks = ?, nilai_huruf = ?, nilai_angka = ? 
                          WHERE id = ?");
  $stmt->bind_param("sdsdi", $mata_kuliah, $sks, $huruf, $angka, $id);

  if ($stmt->execute()) {
    echo "<p style='color:green;'>Data nilai berhasil diperbarui! <a href='nilai-index.php?mahasiswa_id=$mahasiswa_id'>Kembali</a></p>";
  } else {
    echo "<p style='color:red;'>Terjadi kesalahan: " . $conn->error . "</p>";
  }
}
?>
