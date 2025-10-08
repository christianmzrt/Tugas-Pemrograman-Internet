<?php include "koneksi.php"; ?>

<h3>Tambah Data Mahasiswa</h3>
<a href="index.php">Kembali ke Daftar</a>
<br><br>

<form method="post" onsubmit="return validasi()">
  NIM: <input type="text" id="nim" name="nim"><br><br>
  Nama: <input type="text" id="nama" name="nama"><br><br>
  Prodi: <input type="text" id="prodi" name="prodi"><br><br>
  <input type="submit" name="simpan" value="Simpan">
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
if (isset($_POST['simpan'])) {
  $nim   = $_POST['nim'];
  $nama  = $_POST['nama'];
  $prodi = $_POST['prodi'];

  $sql = "INSERT INTO mahasiswa (nim, nama, prodi) VALUES ('$nim','$nama','$prodi')";
  if ($conn->query($sql) === TRUE) {
    echo "<p style='color:green;'>Data berhasil disimpan! <a href='index.php'>Kembali</a></p>";
  } else {
    echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
  }
}
?>
