<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Menu Makanan</title>
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
            margin-bottom: 8px;
        }
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #bdc3c7;
            border-radius: 8px;
            outline: none;
            transition: border 0.3s;
            margin-bottom: 15px;
        }
        select:focus {
            border: 1px solid #3498db;
        }
        input[type="submit"] {
            width: 100%;
            padding: 12px;
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
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            color: #2c3e50;
            background: #ecf0f1;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Pilih Menu Makanan</h2>

    <form method="post" action="">
        <label>Pilih Menu:</label>
        <select name="menu" required>
            <option value="nasigoreng">Nasi Goreng</option>
            <option value="soto">Soto</option>
            <option value="mieayam">Mie Ayam</option>
        </select>
        <input type="submit" name="pilih" value="Lihat Harga">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $menu = $_POST['menu'];
        $harga = 0;
        $hasil = "";

        switch ($menu) {
            case "nasigoreng":
                $harga = 20000;
                $hasil = "Anda memilih <b>Nasi Goreng</b> → Harga Rp " . number_format($harga, 0, ',', '.');
                break;

            case "soto":
                $harga = 15000;
                $hasil = "Anda memilih <b>Soto</b> → Harga Rp " . number_format($harga, 0, ',', '.');
                break;

            case "mieayam":
                $harga = 12000;
                $hasil = "Anda memilih <b>Mie Ayam</b> → Harga Rp " . number_format($harga, 0, ',', '.');
                break;

            default:
                $hasil = "Menu tidak tersedia.";
        }

        echo "<div class='result'>$hasil</div>";
    }
    ?>
</div>

</body>
</html>
