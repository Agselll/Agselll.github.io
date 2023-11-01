<?php
    require "koneksi.php";
    $id = $_GET['id'];
    $result = mysqli_query($conn, "DELETE FROM kritik WHERE id = $id");
    $kritik = [];

    if ($result) {
        echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = 'RDS.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = 'RDS.php';
        </script>";
    }
?>