<?php
    require'koneksi.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $role = $_POST['role'];

    if ($password == $cpassword) {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $result = mysqli_query($conn,"SELECT username from user WHERE username = '$username'");

        if (mysqli_fetch_assoc($result)) {
            echo"
            <script>
                alert('Username telah digunakan. Silahkan cari lagi!');
                document.location.href = 'register.php';
            </script>";
        } else {
            $sql = "INSERT INTO user VALUES ('', '$username', '$password', '$role')";
            $result = mysqli_query($conn, $sql);

            if (mysqli_affected_rows($conn) > 0) {
                echo"
                <script>
                    alert('Registrasi Telah Berhasil');
                    document.location.href = 'RDS.php';
                </script>";
            } else {
                echo"
                <script>
                    alert('Registrasi Gagal');
                    document.location.href = 'register.php';
                </script>";
            }
        }
    } else {
        echo"<script>
            alert('konfirmasi password anda tidak sesuai!');
            document.location.href = 'register.php';
        </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <div class="form-container">
        <img src="img/rds1.jpeg" alt="">
        <div class="form-box">
            <div class="form-title">
                <h1>Register</h1>
                <hr>
            </div><br>
            <form action="" method="post">
                <label for="username">Username</label>
                <input type="text" name="username" class="textfield" required><br>

                <label for="password">password</label>
                <input type="password" name="password" class="textfield" required><br>

                <label for="cpassword">Confirm Password</label>
                <input type="password" name="cpassword" class="textfield" required><br>
                <input type="text" name="role" value="user"  hidden>

                <input type="submit" name="register" value="Register" class="submit-btn">
            </form>
        </div>
    </div>
    
</body>
</html>