<?php
    session_start();
    require 'koneksi.php';

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        echo $username;
        echo $password;

        $result = mysqli_query($conn, "SELECT * from user WHERE username = '$username'");

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if (password_verify($password, $row["password"])) {
                if ($row['role'] == 'admin') {
                    $_SESSION['login'] = true;  
                    header("Location: RDS.php");
                } else if ($row['role'] == 'user') {
                    $_SESSION['login'] = true;  
                    header("Location: RDS.php");
                }
                exit;
            }
        }
        $error = true;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <div class="form-container">
        <img src="img/rds1.jpeg" alt="">
        <div class="form-box">
            <div class="form-title">
                <h1>login</h1>
                <hr>
            </div><br>
            <?php if(isset($error)){
                echo "<p style='color: red;'>Username atau password salah!</p>";
            } ?>
            <form action="" method="post">
                <label for="username">Username</label>
                <input type="text" name="username" class="textfield" required><br>

                <label for="password">password</label>
                <input type="password" name="password" class="textfield" required><br>

                <a href="register.php">Belum punya akun?</a>
                <input type="submit" name="login" value="login" class="submit-btn">
            </form>
        </div>
    </div>
    
</body>
</html>