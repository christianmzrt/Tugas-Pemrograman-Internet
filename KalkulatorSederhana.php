<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator Sederhana</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f6fa;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            margin: 0;
            padding: 40px;
        }
        .container {
            background: #fff;
            padding: 25px 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 420px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #2c3e50;
        }
        label {
            font-size: 14px;
            font-weight: bold;
            color: #34495e;
            display: block;
            margin-top: 10px;
        }
        input[type="number"], select {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #bdc3c7;
            border-radius: 8px;
            outline: none;
            transition: border 0.3s;
        }
        input[type="number"]:focus, select:focus {
            border: 1px solid #3498db;
        }
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            border: none;
            border-radius: 8px;
            background: #3498db;
            color: #fff;
            font-size: 15px;
            cursor: pointer;
            transition: background 0.3s;
        }
        input[type="submit"]:hover {
            background: #2980b9;
        }
        .result {
            margin-top: 25px;
            padding: 15px;
            background: #ecf0f1;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            color: #2c3e50;
        }
        .error {
            background: #ffcccc;
            color: #c0392b;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Kalkulator Sederhana</h2>

    <form method="post" action="">
        <label>Angka 1:</label>
        <input type="number" step="any" name="angka1" required>

        <label>Angka 2:</label>
        <input type="number" step="any" name="angka2" required>

        <label>Operator:</label>
        <select name="operator" required>
            <option value="tambah">+</option>
            <option value="kurang">-</option>
            <option value="kali">*</option>
            <option value="bagi">/</option>
        </select>

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

        if (is_numeric($hasil)) {
            echo "<div class='result'>Hasil: <b>$hasil</b></div>";
        } else {
            echo "<div class='result error'>$hasil</div>";
        }
    }
    ?>
</div>

</body>
</html>
