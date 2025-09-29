<?php

require_once 'config.php';

$op = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>

        label,
        input {
            display: block;
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <?php
    if ($op == 'tambah') {
    ?>
        <h1>Tambah Data</h1>
        <form action="simpan.php?op=simpan" method="POST">
            <label for="nim">Nim : </label>
            <input type="text" name="nim" id="nim"><br>
            <label for="nama">Nama : </label>
            <input type="text" name="nama" id="nama"><br>
            <label for="jurusan">Jurusan : </label>
            <input type="text" name="jurusan" id="jurusan"><br>
            <input type="submit" value="Simpan">
        </form>
    <?php
    } else {
    ?>
        <h1>Edit Data</h1>
        <form action="edit.php?op=edit" method="POST">
            <?php
            $id = $_GET['id'];

            $sql = "SELECT * from mahasiswa where id='$id'";
            $query = mysqli_query($conn, $sql);
            while ($data = mysqli_fetch_array($query)) {
            ?>
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                <label for="nim">Nim : </label>
                <input type="text" name="nim" id="nim" value="<?= $data['nim'] ?>"><br>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" value="<?= $data['nama'] ?>"><br>
                <label for="jurusan">Jurusan : </label>
                <input type="text" name="jurusan" id="jurusan" value="<?= $data['jurusan'] ?>"><br>
                <input type="submit" value="Simpan">
            <?php
            }
            ?>
        </form>
    <?php } ?>
</body>

</html>