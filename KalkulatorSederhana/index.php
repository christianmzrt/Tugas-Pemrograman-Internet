<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator Sederhana</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function validateForm() {
            var angka1 = document.forms["kalkulatorForm"]["angka1"].value.trim();
            var angka2 = document.forms["kalkulatorForm"]["angka2"].value.trim();
            var operator = document.forms["kalkulatorForm"]["operator"].value;
            var errorDiv = document.getElementById("error");

            errorDiv.innerHTML = "";

            if (angka1 === "" || isNaN(angka1)) {
                errorDiv.innerHTML = "Angka 1 wajib diisi dengan angka!";
                return false;
            }

            if (angka2 === "" || isNaN(angka2)) {
                errorDiv.innerHTML = "Angka 2 wajib diisi dengan angka!";
                return false;
            }

            if (operator === "") {
                errorDiv.innerHTML = "Operator wajib dipilih!";
                return false;
            }

            if (operator === "bagi" && parseFloat(angka2) === 0) {
                errorDiv.innerHTML = "Tidak bisa membagi dengan 0!";
                return false;
            }

            return true; // valid
        }
    </script>
</head>
<body>

<div class="container">
    <h2>Kalkulator Sederhana</h2>

    <form name="kalkulatorForm" method="post" action="" onsubmit="return validateForm()">
        <div id="error"></div>

        <label>Angka 1:</label>
        <input type="number" step="any" name="angka1">

        <label>Angka 2:</label>
        <input type="number" step="any" name="angka2">

        <label>Operator:</label>
        <select name="operator">
            <option value="">--Pilih--</option>
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
