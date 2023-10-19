<?php
require "koneksi.php";
if (isset($_POST['kirim'])) {
    $nama = $_POST['nama'];
    $rating = $_POST['rating'];
    $deskripsi = htmlspecialchars($_POST['deskripsi']);

    $result = mysqli_query($conn, "INSERT INTO kritik VALUES ('', '$nama', '$rating', '$deskripsi')");

    if ($result) {
        echo "<script>
            alert('Terima kasih telah memberikan kritik & saran!');
            document.location.href = 'RDS.php';
        </script>";
    } else {
        echo "<script>
            alert('Kritik & saran tidak terkirim, silahkan coba lagi!');
            document.location.href = 'RDS.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kritik & Saran</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <div class="form-container">
        <img src="img/rds1.jpeg" alt="">
        <div class="form-box">
            <div class="form-title">
                <h1>Kritik & Saran</h1>
                <hr>
            </div><br>
            <form action="" method="post">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="textfield" required><br>

                <label for="rating">Rating</label>
                <input type="number" name="rating" min="1" max="5" value="1" class="textfield" required><br>

                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" rows="10" class="textfield" required></textarea><br>

                <input type="submit" name="kirim" value="Kirim" class="submit-btn">
            </form>
        </div>
    </div>
    
</body>
</html>