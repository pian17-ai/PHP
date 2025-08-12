<?php
session_start();
include '../koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

// search via username
$sql_search = "SELECT * FROM tbl_user_admin WHERE username = '$username' AND password = '$password'";
$query_search = mysqli_query($conn, $sql_search);
$search = mysqli_fetch_assoc($query_search);

// check a login
if(mysqli_num_rows($query_search) > 0) {
    $_SESSION['username'] = $data['username'];
    $_SESSION['password'] = $data['password'];

    // redirect sesuai role
    if($data['role'] == 'admin') {
        header("Location : dashboard.php");
    } else if ($data['role'] == 'pengguna') {
        header('Location : /dashboard.php');
    } else {
        echo('username atau password salah');
    }
}
?>