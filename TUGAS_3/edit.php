<?php include "koneksi.php"; ?>

<?php
// Ambil ID dari URL
$id = $_GET['id'];

// Ambil data mahasiswa berdasarkan ID
$result = $conn->query("SELECT * FROM mahasiswa WHERE id=$id");
$data = $result->fetch_assoc();
?>

<h3>Edit Data Mahasiswa</h3>
<a href="index.php">Kembali ke Daftar</a>
<br><br>

<form method="post" onsubmit="return validasi()">
  NIM: <input type="text" id="nim" name="nim" value="<?= $data['nim'] ?>"><br><br>
  Nama: <input type="text" id="nama" name="nama" value="<?= $data['nama'] ?>"><br><br>
  Prodi: <input type="text" id="prodi" name="prodi" value="<?= $data['prodi'] ?>"><br><br>
  <input type="submit" name="update" value="Update">
</form>

<p id="pesan" style="color:red;"></p>

<script>
function validasi() {
  let nim = document.querySelector("#nim").value;
  let nama = document.querySelector("#nama").value;
  let prodi = document.querySelector("#prodi").value;

  if (nim.length < 5) {
    document.querySelector("#pesan").innerHTML = "NIM minimal 5 karakter!";
    return false;
  }
  if (nama === "" || prodi === "") {
    document.querySelector("#pesan").innerHTML = "Nama dan Prodi tidak boleh kosong!";
    return false;
  }
  return true;
}
</script>

<?php
// Jika tombol Update diklik
if (isset($_POST['update'])) {
  $nim   = $_POST['nim'];
  $nama  = $_POST['nama'];
  $prodi = $_POST['prodi'];

  // Query UPDATE
  $sql = "UPDATE mahasiswa SET nim='$nim', nama='$nama', prodi='$prodi' WHERE id=$id";

  if ($conn->query($sql) === TRUE) {
    echo "<p style='color:green;'>Data berhasil diperbarui! <a href='index.php'>Kembali</a></p>";
  } else {
    echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
  }
}
?>
