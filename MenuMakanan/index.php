<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Menu Makanan</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function lihatHarga(event) {
            event.preventDefault(); // mencegah reload halaman
            var menu = document.getElementById("menu").value;
            var errorDiv = document.getElementById("error");
            var resultDiv = document.getElementById("result");
            var harga = 0;
            var teks = "";

            errorDiv.innerHTML = "";
            resultDiv.innerHTML = "";

            if (menu === "") {
                errorDiv.innerHTML = "Silakan pilih menu terlebih dahulu!";
                return false;
            }

            switch(menu) {
                case "nasigoreng":
                    harga = 20000;
                    teks = "Anda memilih <b>Nasi Goreng</b> → Harga Rp " + harga.toLocaleString('id-ID');
                    break;
                case "soto":
                    harga = 15000;
                    teks = "Anda memilih <b>Soto</b> → Harga Rp " + harga.toLocaleString('id-ID');
                    break;
                case "mieayam":
                    harga = 12000;
                    teks = "Anda memilih <b>Mie Ayam</b> → Harga Rp " + harga.toLocaleString('id-ID');
                    break;
                default:
                    teks = "Menu tidak tersedia.";
            }

            resultDiv.innerHTML = teks;
        }
    </script>
</head>
<body>

<div class="container">
    <h2>Pilih Menu Makanan</h2>

    <form onsubmit="lihatHarga(event)">
        <div id="error"></div>

        <label>Pilih Menu:</label>
        <select id="menu" name="menu">
            <option value="">--Pilih Menu--</option>
            <option value="nasigoreng">Nasi Goreng</option>
            <option value="soto">Soto</option>
            <option value="mieayam">Mie Ayam</option>
        </select>
        <input type="submit" value="Lihat Harga">
    </form>

    <div id="result" class="result"></div>
</div>

</body>
</html>
