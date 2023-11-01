<?php
    require "koneksi.php";
    $id = $_GET['id'];
    $get = mysqli_query($conn, "SELECT * FROM kritik WHERE id = $id");
    $kritik = [];

    while ($row = mysqli_fetch_assoc($get)) {
        $kritik[] = $row;
    }
    $kritik = $kritik[0];

    if (isset($_POST['ubah'])) {
        $nama = $_POST['nama'];
        $rating = $_POST['rating'];
        $deskripsi = $_POST['deskripsi'];

        if($_FILES["gambar"]["name"] != "") {
            $gambar = $_FILES["gambar"]["name"];
            $tmp_name = $_FILES["gambar"]["tmp_name"];
            
            $ekstensigmbr = explode(".", $gambar);
            $ekstensigmbr = strtolower(end($ekstensigmbr));
            $nm_gambar = date('Y-m-d');
            $nm_gambar .= ".";
            $nm_gambar .= strtolower($nama) . "-file";
            $nm_gambar .= ".";
            $nm_gambar .= $ekstensigmbr;

            move_uploaded_file($tmp_name,'img/profil/'.$nm_gambar);

            $result = mysqli_query($conn, "UPDATE kritik SET nama='$nama', rating='$rating', deskripsi='$deskripsi', foto = '$nm_gambar' WHERE id = $id");
    
            if ($result) {
                echo "
                <script>
                    alert('Data berhasil diubah!');
                    document.location.href = 'RDS.php';
                </script>";
            } else {
                echo "
                <script>
                    alert('Data gagal diubah!');
                    document.location.href = 'RDS.php';
                </script>";
            }
        } else {
            $result = mysqli_query($conn, "UPDATE kritik SET nama='$nama', rating='$rating', deskripsi='$deskripsi' WHERE id = $id");
    
            if ($result) {
                echo "
                <script>
                    alert('Data berhasil diubah!');
                    document.location.href = 'RDS.php';
                </script>";
            } else {
                echo "
                <script>
                    alert('Data gagal diubah!');
                    document.location.href = 'RDS.php';
                </script>";
            }
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
            <form action="" method="post" enctype="multipart/form-data">
                <label for="nama">Nama</label>
                <input type="text" name="nama" value="<?php echo $kritik['nama']?>" class="textfield"><br>

                <label for="rating">Rating</label>
                <input type="number" name="rating" min="1" max="5" value="<?php echo $kritik['rating']?>" class="textfield"><br>

                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" rows="10" class="textfield" ><?php echo $kritik['deskripsi']?></textarea><br>

                <label for="gambar">Foto Profil</label>
                <input type="file" name="gambar" id="gambar"><br>

                <input type="submit" name="ubah" value="Kirim" class="submit-btn">
            </form>
        </div>
    </div>
</body>
</html>