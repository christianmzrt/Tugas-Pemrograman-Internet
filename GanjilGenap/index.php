<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cek Bilangan Ganjil atau Genap</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function validateForm() {
            var angka = document.forms["cekForm"]["angka"].value.trim();
            var errorDiv = document.getElementById("error");

            errorDiv.innerHTML = ""; // reset pesan error

            if (angka === "") {
                errorDiv.innerHTML = "Angka wajib diisi!";
                return false;
            }

            if (isNaN(angka)) {
                errorDiv.innerHTML = "Input harus berupa angka!";
                return false;
            }

            return true; // valid
        }
    </script>
</head>
<body>

<div class="container">
    <h2>Cek Bilangan Ganjil atau Genap</h2>

    <form name="cekForm" method="post" action="" onsubmit="return validateForm()">
        <div id="error" class="error"></div>
        <label>Masukkan Angka:</label>
        <input type="number" name="angka">
        <input type="submit" name="cek" value="Cek">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $angka = $_POST['angka'];

        if ($angka % 2 == 0) {
            echo "<div class='result even'>Bilangan <b>$angka</b> adalah <b>GENAP</b></div>";
        } else {
            echo "<div class='result odd'>Bilangan <b>$angka</b> adalah <b>GANJIL</b></div>";
        }
    }
    ?>
</div>

</body>
</html>
