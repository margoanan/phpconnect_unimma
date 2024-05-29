<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INPUT DATA</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        height: 100vh;
    }

    h3 {
        margin-top: 3rem;
        text-align: center;
    }

    .container {
        margin-top: 5rem;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .form {
        background-color: turquoise;
        border: 1px solid black;
        width: 25%;
        border-radius: 10px;
        padding: 15px 30px;
    }

    .btn-danger a {
        color: black;
        text-decoration: none;
    }

    .btn-danger a:hover {
        color: black;
        text-decoration: none;
    }
</style>

<body>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <h3>Tamabah Data Produk</h3>
    <div class="container">
        <form action="proses.php?aksi=tambah" method="post" class="form">
            <div class="form-group">
                <label for="nama">Nama :</label>
                <input type="text" name="nama" class="form-control" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="stok">Stok :</label>
                <input type="number" name="stok" class="form-control" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga :</label>
                <input type="number" name="harga" class="form-control" autocomplete="off" required>
            </div>
            <div>
                <button type="submit" name="Simpan" class="btn btn-success">Simpan</button>
                <button type="submit" name="Batal" class="btn btn-danger"><a href="index.php" class="link">Batal</a></button>
            </div>
        </form>
    </div>
</body>
</html>