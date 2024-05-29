<!-- <?php
include('../connect.php');
$sql = mysqli_query($connection, "SELECT * FROM user");
$number = 1;
?>

<!DOCTYPE html>
<html>

<head>
    <title>Title Of The Document</title>
</head>

<body>
    <div>
        <div>
            <a href="create.php">Tambah Data</a>
        </div>
        <table border="1">
            <tr>
                <td>No</td>
                <td>Nama</td>
                <td>Email</td>
                <td>Hobby</td>
                <td>Action</td>
            </tr>
            <?php while ($data = mysqli_fetch_array($sql)) { ?>
                <tr>
                    <td><?= $number++ ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['email'] ?></td>
                    <td>
                        <?php
                            $user_id = $data['id'];
                            $hobby = mysqli_query($connection, "SELECT * FROM hobby WHERE user_id = '$user_id'") or die(mysqli_error($connection));
                        ?>
                        <?php while ($hobbies = mysqli_fetch_array($hobby)) { ?>
                            <li><?= $hobbies['hobby'] ?></li>
                        <?php } ?>
                    <td>
                        <a href="edit.php?id=<?= $data['id'] ?>">Edit</a>
                        <a href="delete.php?id=<?= $data['id'] ?>">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html> -->

<?php

    include('../connect.php');
    $sql = mysqli_query($connection, "SELECT * FROM user");
    $number = 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>

    <div>
        <div>
            <a href="create.php">Tambah Data</a>
        </div>
        <table border="1">
            <tr>
                <td>No</td>
                <td>Nama</td>
                <td>Email</td>
                <td>Hobby</td>
                <td>Action</td>
            </tr>
            <?php while ($data = mysqli_fetch_array($sql)) { ?>
            <tr>
                <td><?=$number++ ?></td>
                <td><?=$data['nama'] ?></td>
                <td><?=$data['email'] ?></td>
                <td>
                    <?php
                        $user_id = $data['id'];
                        $hobby = mysqli_query($connection, "SELECT * FROM hobby WHERE user_id = '$user_id'") or die(mysqli_error($connection));
                    ?>
                    <?php while($hobbies = mysqli_fetch_array($hobby)) {?>
                        <li><?= $hobbies['hobby']?></li>
                    <?php } ?>
                </td>
                <td>
                    <a href="edit.php?id=<?=$data['id']?>">Edit</a>
                    <a href="delete.php?id=<?=$data['id']?>">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
    
</body>
</html>