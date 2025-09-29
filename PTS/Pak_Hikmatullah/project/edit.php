<?php

require_once 'config.php';

$op = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

$id = $_POST['id'];
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];

$sql = "UPDATE mahasiswa set nim='$nim', nama='$nama', jurusan='$jurusan' where id='$id'";
$query = mysqli_query($conn, $sql);

if ($query) {
    header('Location: tampil.php?status=sukses');
} else {
    echo "Gagal mengedit data";
}