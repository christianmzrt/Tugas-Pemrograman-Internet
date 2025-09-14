<!DOCTYPE html>
<html>
<head>
    <title>Cek Bilangan Ganjil atau Genap</title>
</head>
<body>

<h2>Cek Bilangan Ganjil atau Genap</h2>

<form method="post" action="">
    <label>Masukkan Angka:</label>
    <input type="number" name="angka" required>
    <br><br>
    <input type="submit" name="cek" value="Cek">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $angka = $_POST['angka'];

    if ($angka % 2 == 0) {
        echo "<h3>Bilangan $angka adalah GENAP</h3>";
    } else {
        echo "<h3>Bilangan $angka adalah GANJIL</h3>";
    }
}
?>

</body>
</html>
