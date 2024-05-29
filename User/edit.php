<?php

include('../connect.php');
$id = $_GET['id'];
$select = mysqli_query($connection, "SELECT * FROM user WHERE id = '$id'");
$data = mysqli_fetch_assoc($select);

$hobby = mysqli_query($connection, "SELECT * FROM hobby WHERE user_id = '$id'") or die('terjadi masalah');

if(isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = empty($_POST['password'])? $data['password'] : $_POST['password'];

    $sql = mysqli_query(
        $connection, "UPDATE user SET
        nama = '$nama',
        email = '$email',
        password = '$password'
        WHERE id = '$id'"
    ) or die(mysqli_error($connection));
    
    if ($sql) {
        if(isset($_POST['hobby'])) {
            $delete_hobby = mysqli_query($connection, "DELETE FROM hobby WHERE user_id = '$id'") or die('gagal menghapus hoby');
            foreach($_POST['hobby'] as $key => $hobby) {
                $insert_hobby = mysqli_query($connection, "INSERT INTO hobby (user_id,hobby) VALUES('$id', '$hobby')") or die(mysqli_error($connection)); 
            }
        }
        header('location:index.php');
    } else {
        echo 'terjadi kesalahan';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Uset</title>
</head>
<body>
    <div class="">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><input type="text" name="nama" placeholder="nama" required="required"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><input type="email" name="email" placeholder="example@gmail.com" required="required"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>:</td>
                    <td><input type="password" name="password" placeholder="password" required="required"></td>
                </tr>
                <tr>
                    <td colspan="2">Hobby</td>
                        <td><a href="#" class="btn-hoby">Tambah Hobby</a></td>
                </tr>
                <?php while($hobbies = mysqli_fetch_array($hobby)){ ?>
                <tr>
                    <td>Hobby</td>
                    <td>:</td>
                    <td><input type="text" name="hobby[]" value="<?=$hobbies['hobby']?>" placeholder="hobby" required="required"><a href="#" class="delete-hobby">Hapus</a></td>
                </tr>
                <?php } ?>
                <tr class="hobby-area"></tr>
                <tr>
                    <td>
                        <button name="update" type="submit">Update</button>
                    </td>
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

