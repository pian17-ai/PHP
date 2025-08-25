<?php

include 'koneksi.php';

$nama = '';
$email = '';
$password = '';

$op = '';

if (isset($_GET['op'])) {
    $op = 'submit';
} else {
    $op = '';
}

if ($_POST['submit']) {
    $nama = $_POST['nm'];
    $email = $_POST['email'];
    $password = $_POST['pw'];

    if ($email == '' || $email =='' || $password == '') {
        header("alert('masukkan semua data)");
    } else {
        $sql = "INSERT INTO `users` (`id`, `nama`, `email`, `password`) VALUES (NULL, '$nama', '$email', '$password')";
        $query = mysqli_query($conn, $sql);
    }
    
}

?>

<form action="" method="post" class="form-bg">
    <div class="form">
        <h1>Formulir Pendaftaran :</h1>
        <p>Nama Lengkap: </p>
        <input type="text" id="nm" name="nm">
        <p>Email: </p>
        <input type="text" id="email" name="email">
        <p>Password </p>
        <input type="text" id="pw" name="pw">
        <input type="submit" name="submit" value="Simpan Data" id="submit" class="btn btn-primary submit">
    </div>
</form>