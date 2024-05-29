<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'test_register';

    $connection = mysqli_connect($host, $username, $password, $database) or die('Gagal Membuka Database');
    if(!$connection){
        print_r('Gagal Membuka Database....!');
    }
?>