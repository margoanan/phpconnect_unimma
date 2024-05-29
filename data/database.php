<?php
    class database{

        var $host = "localhost";
        var $uname = "root";
        var $pass = "";
        var $db = "db_toko";

        private $koneksi;

        function __construct(){
            $this->koneksi = mysqli_connect($this->host, $this->uname, $this->pass, $this->db);
        }

        function tampil_data(){
            $hasil = mysqli_query($this->koneksi, "SELECT * FROM produk");
            return $hasil;
        }

        function input($nama, $stok, $harga){
            mysqli_query($this->koneksi, "Insert into produk (nama, stok, harga) values('$nama','$stok','$harga')");
        }

        function hapus($id){
            mysqli_query($this->koneksi, "Delete from produk where id='$id'");
        }

        function edit($id){
            $hasil = mysqli_query($this->koneksi, "select * from produk where id='$id'");
            return $hasil;
        }

        function update($id, $nama, $stok, $harga){
            mysqli_query($this->koneksi, "update produk set nama='$nama', stok='$stok', harga='$harga' where id='$id'");
        }
    }
?>