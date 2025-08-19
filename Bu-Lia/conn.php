<?php
include 'php.ini';

$host="localhost";
$user="root";
$password="";
$database="pian";

$conn = new mysqli($host, $user, $password, $database);

if($conn->connect_error) {
    echo "KONEKSI GAGAL";
    die("koneksi gagal". $conn->connect_error);
}