<!DOCTYPE html>
<html>
<head>
    <title>Menu Makanan</title>
</head>
<body>

<h2>Pilih Menu Makanan</h2>

<form method="post" action="">
    <label>Pilih Menu:</label>
    <select name="menu" required>
        <option value="nasigoreng">Nasi Goreng</option>
        <option value="soto">Soto</option>
        <option value="mieayam">Mie Ayam</option>
    </select>
    <br><br>
    <input type="submit" name="pilih" value="Lihat Harga">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $menu = $_POST['menu'];
    $harga = 0;

    switch ($menu) {
        case "nasigoreng":
            $harga = 20000;
            echo "<h3>Anda memilih Nasi Goreng → Harga Rp " . number_format($harga, 0, ',', '.') . "</h3>";
            break;

        case "soto":
            $harga = 15000;
            echo "<h3>Anda memilih Soto → Harga Rp " . number_format($harga, 0, ',', '.') . "</h3>";
            break;

        case "mieayam":
            $harga = 12000;
            echo "<h3>Anda memilih Mie Ayam → Harga Rp " . number_format($harga, 0, ',', '.') . "</h3>";
            break;

        default:
            echo "<h3>Menu tidak tersedia.</h3>";
    }
}
?>

</body>
</html>