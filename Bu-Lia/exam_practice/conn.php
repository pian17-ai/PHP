<?php

$host = "localhost";
$user = "pma";
$pass = "pmapass";
$db = "Latihan_pian";

$conn = new mysqli($host, $user, $pass, $db);

if($conn->connect_error) {
    echo "KONEKSI GAGAL";
    die("Koneksi gagal" . $conn->connect_error);
}