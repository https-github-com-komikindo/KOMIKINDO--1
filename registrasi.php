<?php
require 'koneksi.php';

if (isset($_POST['register'])) {
    $username = strtolower(stripslashes($_POST['username']));
    $email = mysqli_real_escape_string($conn, $_POST['$email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    if ($password == $cpassword) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $cek_username = "SELECT username FROM users WHERE username = '$username'";
        $temp = mysqli_query($conn, $cek_username);
        $row = mysqli_fetch_assoc($temp);

        if ($row) {
            echo "<script>
                alert('Username ini telah digunakan!');
                document.location.href = 'registras.php';
            </script>";
        } else {
            $insert_sql = "INSERT INTO users VALUES ('','$username','$email','$password')";
            mysqli_query($conn, $insert_sql);

            if (mysqli_affected_rows($conn) > 0) {
                echo "<script>
                        alert('Data berhasil diregistrasi!');
                        document.location.href = 'registrasi.php';
                    </script>";
            } else {
                echo "<script>
                        alert('Data gagal diregistrasi!');
                        document.location.href = 'registrasi.php';
                    </script>";
            }
        }
    } else {
        echo "<script>
                    alert('Konfirmasi Password tidak sesuai!');
                    document.location.href = 'registrasi.php';
            </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Registrasi</title>
</head>

<body>
    <div class="bg_lgn">
        <div class="back"><a href="index.php"><i class="fa-solid fa-house"></i></a></div>
        <div class="kotak_login">
            <p class="tulisan_login">Sign Up</p><br>

            <form action="" method="post">
                <label>Username</label>
                <input type="text" id="username" name="username" placeholder="said" class="form_login" required />

                <label>Email</label>
                <input type="email" id="email" name="email" placeholder="said@gmail.com" class="form_login" required />

                <label>Password</label>
                <input type="password" id="password" name="password" placeholder="123" class="form_login" required />

                <label>Confirm Password</label>
                <input type="password" id="cpassword" name="cpassword" placeholder="123" class="form_login" required />

                <input type="submit" class="tombol_login" name="register" placeholder="Registrasi" /><br><br>
                <center>
                    Sudah memiliki akun?<a class="link" href="login.php"> Login disini</a>
                </center>
            </form>
        </div>
    </div>
</body>

</html>