<?php

    include('../connect.php');
    $id = $_GET['id'];
    $sql = mysqli_query($connection, "DELETE FROM user where id = '$id'") or die(mysqli_error($connection));
    if($sql) {
        header('location: index.php');
    }

?>