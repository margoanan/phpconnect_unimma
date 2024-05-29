<?php
    include('../connect.php');
    if (isset($_POST['save'])) {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = mysqli_query(
            $connection,
            "INSERT INTO user(nama,email,password) VALUES('$nama','$email','$password')") or die(mysqli_error($connection));
        if ($sql) {
            header('location:index.php');
            print_r('Berhasil');
        } else {
            print_r('Gagal');
        }
    }
    if(isset($_POST['hobby'])){
        $user_id = mysqli_insert_id($connection);
        foreach($_POST['hobby'] as $key => $hobby){
            $insert_hobby = mysqli_query($connection, "INSERT INTO hobby (user_id,hobby) VALUES('$user_id','$hobby')") or die(mysqli_error($connection));
        }
    }
?>


<!DOCTYPE html>
<html>

<head>
    <title>Create User</title>
</head>

<body>
    <div>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><input type="text" name="nama" placeholder="masukkan nama"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><input type="email" name="email" placeholder="masukkan email"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>:</td>
                    <td><input type="password" name="password" placeholder="masukkan password"></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Hobby</td>
                    <td><a href="#" class="btn-hoby">Tambah Hobby</a></td>
                </tr>
                <tr class="hobby-area">
                    <td>Hobby</td>
                    <td>:</td>
                    <td><input type="text" name="hobby[]" placeholder="hobby"></td>
                </tr>
                <tr>
                    <td><button type="submit" name="save">Save</button></td>
                </tr>
            </table>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script>
        $('.btn-hoby').click(function(){
            $($('#hobby-template').html()).insertAfter($('.hobby-area'));
        });
        $('body').on('click', '.delete-hobby', function() {
            $(this).closest('tr').remove();
        });
    </script>
    <script type="text/template" id="hobby-template">
        <tr>
            <td>Hobby</td>
            <td>:</td>
            <td><input type="text" name="hobby[]" placeholder="hobby" required="required"> <a href="#" class="delete-hobby">Hapus</a></td>
        </tr>
    </script>
</body>
</html>