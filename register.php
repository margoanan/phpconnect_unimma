<?php
    include('connect.php');
    if(isset($_POST['save'])){
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = mysqli_query($connection, "INSERT into user (nama,email,password) VALUES('$nama','$email','$password')") or die(mysqli_error($connection));
        if($sql){
            print_r('Selamat Anda Berhasil Regristrasi :)');
        }else{
            print_r('Regristrasi Gagal, Harap Masukkan Email/Password Sesuai Format..!');
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
    </head>
    <body>
        <div>
            <form class="box" action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                <table>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><input type="text" name="nama" placeholder="Nama" required="required"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><input type="email" name="email" placeholder="example:Viandrizqi15@gmail.com" required="required"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td><input type="password" name="password" placeholder="password" required="required"></td>
                    </tr>
                    <tr>
                        <td>
                            <button name="save" type="submit">Register</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>