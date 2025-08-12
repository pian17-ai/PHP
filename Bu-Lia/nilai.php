<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "conn.php";

if (isset($_POST['submit'])) {
    $kode_mapel = $_POST['kode_nilai'];
    $nilai = $_POST['nis'];
    $nama = $_POST['nama'];
    $kode_mapel = $_POST['kode_mapel'];

    
    $add_nilai = `insert into nilai (kode_nilai, nis, nilai, kode_mapel) values ({$kode_mapel}, {$nilai}, {$nama}, {$kode_mapel})`;
    if($conn->query($add_nilai)===true) {
        header("Location:index.php?status=sukses");
        exit();
    } else {
        header("Location:index.php?status=gagal");
        exit();
    }

} else {
    header("Location:index.php");
    exit();
}
?>