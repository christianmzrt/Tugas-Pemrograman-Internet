<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Ucapan</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function validateForm() {
            var nama = document.forms["ucapanForm"]["nama"].value.trim();
            var errorDiv = document.getElementById("error");

            // Reset pesan error
            errorDiv.innerHTML = "";

            if (nama === "") {
                errorDiv.innerHTML = "Nama wajib diisi!";
                return false;
            }

            if (!/^[a-zA-Z\s]+$/.test(nama)) {
                errorDiv.innerHTML = "Nama hanya boleh huruf dan spasi!";
                return false;
            }

            return true; // valid, boleh submit
        }
    </script>
</head>
<body>

<div class="container">
    <h2>Form Ucapan</h2>

    <form name="ucapanForm" method="post" action="" onsubmit="return validateForm()">
        <div id="error" class="error"></div>
        <label>Masukkan Nama:</label>
        <input type="text" name="nama">
        <input type="submit" value="Kirim Ucapan">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = htmlspecialchars($_POST['nama']); // sanitasi
        echo "<div class='result'>";
        echo "<h3>Halo, $nama 👋</h3>";
        echo "Selamat belajar PHP! Semoga sukses 🚀";
        echo "</div>";
    }
    ?>
</div>

</body>
</html>
