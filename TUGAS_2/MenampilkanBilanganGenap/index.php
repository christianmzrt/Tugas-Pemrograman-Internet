<!DOCTYPE html>
<html>
<head>
    <title>Bilangan Genap</title>
</head>
<body>
    <h3>Cari Bilangan Genap</h3>
    <form method="post" action="">
        Masukkan n1: <input type="number" name="n1" required> <br><br>
        Masukkan n2: <input type="number" name="n2" required> <br><br>
        <input type="submit" value="Tampilkan">
    </form>

    <?php
    if (isset($_POST['n1']) && isset($_POST['n2'])) {
        $n1 = $_POST['n1'];
        $n2 = $_POST['n2'];

        if ($n1 < $n2) {
            echo "<h4>Bilangan genap dari $n1 sampai $n2 :</h4>";
            for ($i = $n1; $i <= $n2; $i++) {
                if ($i % 2 == 0) {
                    echo $i . " ";
                }
            }
        } else {
            echo "<p style='color:red;'>Syarat: n1 harus lebih kecil dari n2!</p>";
        }
    }
    ?>
</body>
</html>