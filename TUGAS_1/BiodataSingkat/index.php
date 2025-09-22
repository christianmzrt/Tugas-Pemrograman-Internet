<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Biodata Singkat</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function validateForm() {
            // Ambil value dari form
            var nama = document.forms["biodata"]["nama"].value.trim();
            var umur = document.forms["biodata"]["umur"].value.trim();
            var jk = document.forms["biodata"]["jk"].value;
            var alamat = document.forms["biodata"]["alamat"].value.trim();

            // Validasi nama
            if (nama === "") {
                alert("Nama wajib diisi!");
                return false;
            }
            if (!/^[a-zA-Z\s]+$/.test(nama)) {
                alert("Nama hanya boleh huruf dan spasi!");
                return false;
            }

            // Validasi umur
            if (umur === "") {
                alert("Umur wajib diisi!");
                return false;
            }
            if (isNaN(umur) || umur < 1) {
                alert("Umur harus angka dan lebih besar dari 0!");
                return false;
            }

            // Validasi jenis kelamin
            if (jk === "") {
                alert("Pilih jenis kelamin!");
                return false;
            }

            // Validasi alamat
            if (alamat === "") {
                alert("Alamat wajib diisi!");
                return false;
            }

            // Kalau semua valid, form bisa dikirim
            return true;
        }
    </script>
</head>
<body>

<div class="container">
    <h2>Form Biodata Singkat</h2>

    <form name="biodata" method="post" action="" onsubmit="return validateForm()">
        <label>Nama:</label>
        <input type="text" name="nama">

        <label>Umur:</label>
        <input type="number" name="umur" min="1">

        <label>Jenis Kelamin:</label>
        <div class="radio-group">
            <label><input type="radio" name="jk" value="Laki-laki"> Laki-laki</label>
            <label><input type="radio" name="jk" value="Perempuan"> Perempuan</label>
        </div>

        <label>Alamat:</label>
        <textarea name="alamat" rows="3"></textarea>

        <input type="submit" name="submit" value="Kirim">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitasi server-side tetap disarankan
        $nama = htmlspecialchars($_POST['nama']);
        $umur = $_POST['umur'];
        $jk = $_POST['jk'];
        $alamat = htmlspecialchars($_POST['alamat']);

        echo "<div class='result'>";
        echo "<h3>Hasil Biodata:</h3>";
        echo "Perkenalkan, nama saya <b>$nama</b>.<br>";
        echo "Saat ini saya berusia <b>$umur tahun</b>.<br>";
        echo "Saya adalah seorang <b>$jk</b>, dan sekarang saya tinggal di <b>$alamat</b>.<br>";
        echo "Senang bisa berbagi sedikit tentang diri saya!";
        echo "</div>";
    }
    ?>
</div>

</body>
</html>
