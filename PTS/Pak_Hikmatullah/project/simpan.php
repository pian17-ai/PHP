<?php 

require_once 'config.php';

$op = "";

$nim = "";
$nama = "";
$jurusan = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'simpan') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];

    $sql = "INSERT into mahasiswa (nim, nama, jurusan) values ('$nim', '$nama', '$jurusan')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        header('Location: tampil.php?status=sukses');
    } else {
        echo "Gagal menyimpan data";
    }
}