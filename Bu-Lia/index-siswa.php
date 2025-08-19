<?php

include 'conn.php';

$result = mysqli_query($conn, 'SELECT * from siswa')

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hal Siswa</title>
</head>
<body>
    <h2>Data Siswa</h2>
    <a href="" class="button">Tambah Siswa</a>
</body>
</html>