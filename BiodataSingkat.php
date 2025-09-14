<!DOCTYPE html>
<html>
<head>
    <title>Form Biodata Singkat</title>
</head>
<body>

<h2>Form Biodata Singkat</h2>

<form method="post" action="">
    <label>Nama:</label><br>
    <input type="text" name="nama" required>
    <br><br>

    <label>Umur:</label><br>
    <input type="number" name="umur" min="1" required>
    <br><br>

    <label>Jenis Kelamin:</label><br>
    <input type="radio" name="jk" value="Laki-laki" required> Laki-laki
    <input type="radio" name="jk" value="Perempuan" required> Perempuan
    <br><br>

    <label>Alamat:</label><br>
    <textarea name="alamat" rows="3" cols="30" required></textarea>
    <br><br>

    <input type="submit" name="submit" value="Kirim">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars($_POST['nama']);
    $umur = $_POST['umur'];
    $jk = $_POST['jk'];
    $alamat = htmlspecialchars($_POST['alamat']);

    echo "<h3>Hasil Biodata:</h3>";
    echo "<p>";
    echo "Perkenalkan, nama saya <b>$nama</b>.<br>";
    echo "Saat ini saya berusia <b>$umur tahun</b>.<br>";
    echo "Saya adalah seorang <b>$jk</b>, dan sekarang saya tinggal di <b>$alamat</b>.<br>";
    echo "Senang bisa berbagi sedikit tentang diri saya!";
    echo "</p>";
}
?>

</body>
</html>