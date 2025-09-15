<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Ucapan</title>
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
            max-width: 400px;
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
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            margin-bottom: 15px;
            border: 1px solid #bdc3c7;
            border-radius: 8px;
            outline: none;
            transition: border 0.3s;
        }
        input[type="text"]:focus {
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
            background: #ecf0f1;
            border-radius: 8px;
            font-size: 14px;
            color: #2c3e50;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Form Ucapan</h2>

    <form method="post" action="">
        <label>Masukkan Nama:</label>
        <input type="text" name="nama" required>
        <input type="submit" value="Kirim Ucapan">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = htmlspecialchars($_POST['nama']); // biar aman dari script injection
        echo "<div class='result'>";
        echo "<h3>Halo, $nama 👋</h3>";
        echo "Selamat belajar PHP! Semoga sukses 🚀";
        echo "</div>";
    }
    ?>
</div>

</body>
</html>
