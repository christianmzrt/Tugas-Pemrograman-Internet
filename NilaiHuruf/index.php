<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cek Nilai Huruf</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function cekNilai(event) {
            event.preventDefault(); // cegah reload halaman

            var nilaiInput = document.getElementById("nilai").value.trim();
            var errorDiv = document.getElementById("error");
            var resultDiv = document.getElementById("result");

            // reset pesan
            errorDiv.innerHTML = "";
            resultDiv.innerHTML = "";

            // validasi kosong
            if (nilaiInput === "") {
                errorDiv.innerHTML = "Nilai wajib diisi!";
                return false;
            }

            var nilai = parseFloat(nilaiInput);

            // validasi bukan angka atau di luar range
            if (isNaN(nilai) || nilai < 0 || nilai > 100) {
                errorDiv.innerHTML = "Masukkan angka antara 0 sampai 100!";
                return false;
            }

            // tentukan grade
            var grade, keterangan;
            if (nilai >= 85) {
                grade = "A"; keterangan = "Sangat Baik";
            } else if (nilai >= 70) {
                grade = "B"; keterangan = "Baik";
            } else if (nilai >= 55) {
                grade = "C"; keterangan = "Cukup";
            } else if (nilai >= 40) {
                grade = "D"; keterangan = "Kurang";
            } else {
                grade = "E"; keterangan = "Sangat Kurang";
            }

            resultDiv.innerHTML = "Nilai: <b>" + nilai + "</b> → Grade: <b>" + grade + "</b><br>Keterangan: " + keterangan;
            return true;
        }
    </script>
</head>
<body>

<h2>Cek Nilai Huruf</h2>

<form onsubmit="cekNilai(event)">
    <div id="error" class="error" style="color:red;margin-bottom:10px;"></div>
    <label>Masukkan Nilai (0 - 100):</label><br>
    <!-- Hapus min dan max -->
    <input type="number" id="nilai">
    <br><br>
    <input type="submit" value="Cek">
</form>

<div id="result" style="margin-top:20px;font-weight:bold;"></div>

</body>
</html>
