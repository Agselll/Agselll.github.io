<?php
if(isset($_POST["submit"])){
    $nama = $_POST["nama"];
    $transfer = $_POST["transfer"];
    $email = $_POST["email"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INPUT PHP</title>
    <link rel="stylesheet" href="input.css">
</head>
<body>
    <?php include"navbar.php" ?>
    <form action="" method="post">
        <div class="container">
            <h1>Form Inputan</h1>
            <div class="row">
                <label for="nama">Masukkan Nama</label>
                <input type="text" name="nama" id="nama">
            </div>
            <div class="row">
                <label for="transfer">Masukkan Bukti Transfer</label>
                <input type="file" name="transfer" id="transfer" accept="image/*">
            </div>
            <div class="row">
                <label for="email">Masukkan Email</label>
                <input type="email" name="email" id="email">
            </div>
            <div class="row">
                <button type="submit" name="submit">Submit</button>
            </div>
        </div>
    </form>

    <?php if(isset($_POST["submit"])) :?>
        <h1>Hasil Inputan</h1>
        <div class="container">
            <table>
                <tr>
                    <td>Nama Donatur</td>
                    <td>:</td>
                    <td><?php echo $nama ?></td>
                </tr>
                <tr>
                    <td>Nama Gambar Bukti Transfer</td>
                    <td>:</td>
                    <td><?php echo $transfer ?></td>
                </tr>
                <tr>
                    <td>Email Donatur</td>
                    <td>:</td>
                    <td><?php echo $email ?></td>
                </tr>
            </table>
        </div>
    <?php endif ?>
</body>
</html>