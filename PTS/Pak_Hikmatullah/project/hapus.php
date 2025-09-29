<?php

require_once 'config.php';

$id = $_GET['id'];

$sql = "DELETE from mahasiswa where id='$id'";
$query = mysqli_query($conn, $sql);

if ($query) {
    header('Location: tampil.php?status=sukses');
} else {
    echo "Gagal menghapus data";
}