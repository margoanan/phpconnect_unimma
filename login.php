<?php
include('connect.php');
session_start();
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = mysqli_query($connection, "SELECT * from user where email = '$email' and password = '$password'") or die(mysqli_error($connection));
    $berhasil = mysqli_num_rows($sql);
    $data = mysqli_fetch_assoc($sql);
    if ($berhasil > 0) {
        $_SESSION['auth'] = [
            'name' => $data['nama'],
            'email' => $data['email'],
            'loggedIn' => TRUE,
        ];

        header('location:index.php');
    } else {
        print_r('Email dan Password Salah...!');
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div align="center" class="login-area">
        <div class="form-area">
            <div class="form-child-area">
                <div class="image-area">
                    <img src="./assets/unimma.png" alt="">
                </div>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    <table>
                        <tr>
                            <td>
                                <p>Email</p>
                                <input type="email" name="email" placeholder="example:viandrizqi15@gmail.com" required="required">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Password</p>
                                <input type="password" name="password" placeholder="password" required="required">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <center>
                                    <button name="login" type="submit">Login</button>
                                    <div>
                                        <br>
                                        Belum punya akun? <a href="register.php">Regritrasi</a>
                                    </div>
                                </center>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>

</html>