<!DOCTYPE html>
<html>
<head>
    <title>Cek Nilai Huruf</title>
</head>
<body>

<h2>Cek Nilai Huruf</h2>

<form method="post" action="">
    <label>Masukkan Nilai (0 - 100):</label>
    <input type="number" name="nilai" min="0" max="100" required>
    <br><br>
    <input type="submit" name="cek" value="Cek">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nilai = $_POST['nilai'];

    if ($nilai >= 85) {
        $grade = "A";
    } elseif ($nilai >= 70) {
        $grade = "B";
    } elseif ($nilai >= 55) {
        $grade = "C";
    } elseif ($nilai >= 40) {
        $grade = "D";
    } else {
        $grade = "E";
    }

    echo "<h3>Nilai: $nilai → Grade: $grade</h3>";
}
?>

</body>
</html>