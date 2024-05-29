<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
        margin-top: 1rem;
        text-align: center;
    }

    .btn a {
        text-decoration: none;
    }

    .btn a:hover {
        color: #fff;
    }

    a {
        color: #fff;
    }
</style>

<body>

    <?php
    include 'database.php';
    $db = new database();
    ?>

    <h3>Data Produk</h3>
    <div class="container">
        <button type="submit" class="btn btn-info"><a class="link" href="input.php">Input Data</a></button>
        <table class="table table-bordered mt-2">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <?php
            $no = 1;
            foreach ($db->tampil_data() as $x) {
            ?>
                <tbody>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $x['nama']; ?></td>
                        <td><?php echo $x['stok']; ?></td>
                        <td><?php echo $x['harga']; ?></td>
                        <td>
                            <button type="submit" class="btn btn-warning""><a href="edit.php?id=<?php echo $x['id']; ?>&aksi=edit" class="link">Edit</a></button>
                            <button type="submit" class="btn btn-danger"><a href="proses.php?id=<?php echo $x['id']; ?>&aksi=hapus" class="link">Hapus</a></button>
                        </td>
                    </tr>
                <?php
            }
                ?>
                </tbody>
        </table>
    </div>
</body>

</html>