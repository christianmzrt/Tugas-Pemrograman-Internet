<!DOCTYPE html>
<html>
<head>
    <title>Cek Nilai Huruf</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 40px;
        }
        form {
            background: #f9f9f9;
            display: inline-block;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0,0,0,0.1);
        }
        input, select {
            padding: 8px;
            margin: 5px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background: #4CAF50;
            color: white;
            cursor: pointer;
            font-weight: bold;
        }
        input[type="submit"]:hover {
            background: #45a049;
        }
        h3 {
            color: #333;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<h2>Cek Nilai Huruf</h2>

<form method="post" action="">
    <label>Masukkan Nilai (0 - 100):</label><br>
    <input type="number" name="nilai" min="0" max="100" required>
    <br><br>
    <input type="submit" name="cek" value="Cek">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nilai = $_POST['nilai'];

    if ($nilai >= 85) {
        $grade = "A";
        $keterangan = "Sangat Baik";
    } elseif ($nilai >= 70) {
        $grade = "B";
        $keterangan = "Baik";
    } elseif ($nilai >= 55) {
        $grade = "C";
        $keterangan = "Cukup";
    } elseif ($nilai >= 40) {
        $grade = "D";
        $keterangan = "Kurang";
    } else {
        $grade = "E";
        $keterangan = "Sangat Kurang";
    }

    echo "<h3>Nilai: <b>$nilai</b> → Grade: <b>$grade</b><br>Keterangan: $keterangan</h3>";
}
?>

</body>
</html>
