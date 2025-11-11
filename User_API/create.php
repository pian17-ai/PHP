<?php
require_once '../Product_API/php.ini';

header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:GET,POST,OPTION");
header("Access-Control-Allow-Headers:X-Request-With, Content-Type");
header("Content-Type:application/json; charse=UTF-8");

$conn = new mysqli('localhost', 'pma', 'pmapass', 'db_flutter');
$username = $_POST['username'] ?? null;
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;

if ($username) {
	$query = mysqli_query($conn, "INSERT INTO `tb_user` VALUES (NULL, '$username', '$email', '$password')");
	$getquery = mysqli_query($conn, "SELECT * from tb_user where username = '$username'");
	$data = mysqli_fetch_all($getquery, MYSQLI_ASSOC);

	if ($query) {
		echo json_encode([
			'messagess' => 'insert data success',
			'data' => $data
		]);
	} else {
		echo json_encode([
			'messagess' => 'insert data failed'
		]);
	}
}