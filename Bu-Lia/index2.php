<?php 

include 'php.ini';
include 'conn.php';

$query = $conn->query("SELECT * from siswa");

$n = $query->fetch_assoc();

echo $n['Nama'];