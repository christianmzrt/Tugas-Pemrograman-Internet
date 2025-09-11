<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Sederhana</title>
</head>
<body>

<h2>Kalkulator Sederhana</h2>

<form method="post" action="">
    <label>Angka 1:</label>
    <input type="number" step="any" name="angka1" required>
    <br><br>

    <label>Angka 2:</label>
    <input type="number" step="any" name="angka2" required>
    <br><br>

    <label>Operator:</label>
    <select name="operator" required>
        <option value="tambah">+</option>
        <option value="kurang">-</option>
        <option value="kali">*</option>
        <option value="bagi">/</option>
    </select>
    <br><br>

    <input type="submit" name="hitung" value="Hitung">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $angka1 = $_POST['angka1'];
    $angka2 = $_POST['angka2'];
    $operator = $_POST['operator'];
    $hasil = 0;

    switch ($operator) {
        case "tambah":
            $hasil = $angka1 + $angka2;
            break;
        case "kurang":
            $hasil = $angka1 - $angka2;
            break;
        case "kali":
            $hasil = $angka1 * $angka2;
            break;
        case "bagi":
            if ($angka2 != 0) {
                $hasil = $angka1 / $angka2;
            } else {
                $hasil = "Error: Tidak bisa dibagi 0!";
            }
            break;
        default:
            $hasil = "Operator tidak valid.";
    }

    echo "<h3>Hasil: $hasil</h3>";
}
?>

</body>
</html>
