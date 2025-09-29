<?php

require_once 'config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil</title>
</head>

<body>
    <h1>Data Mahasiswa</h1>
    <hr>
    <div class="container">
        <label>Tambah Data : </label>
        <a href="form.php?op=tambah"><button>Tambah</button></a>
        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * from mahasiswa";
                $query = mysqli_query($conn, $sql);
                while ($data = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?= $data['id'] ?></td>
                        <td><?= $data['nim'] ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['jurusan'] ?></td>
                        <td>
                            <a href="hapus.php?id=<?= $data['id'] ?>" onclick="return confirm('Yakin mau hapus data?')"><button>Hapus</button></a>
                            <a href="form.php?id=<?= $data['id'] ?>"><button>Edit</button></a>
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