<?php

// $host="localhost";
// $user="root";
// $database="ecommerce";
// $password="gr6882899";

$conn = mysqli_connect("localhost", "root", "gr6882899", "ecommerce");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}