<?php

require_once 'php.ini';
require_once 'conn.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokter</title>
</head>

<body>
    <table style="border: 1px solid black" ;>
        <thead>
            <tr>
                <th>Kode Dokter</th>
                <th>Nama Dokter</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th>Jam Jaga</th>
                <th>Kode Spesialis</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * from tbl_dokter";
            $query = mysqli_query($conn, $sql);
            while ($dokter = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td><?= $dokter['kode_dokter'] ?></td>
                    <td><?= $dokter['nama_dokter'] ?></td>
                    <td><?= $dokter['alamat'] ?></td>
                    <td><?= $dokter['no_telepon'] ?></td>
                    <td><?= $dokter['jam_jaga'] ?></td>
                    <td><?= $dokter['kode_spesialis'] ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>