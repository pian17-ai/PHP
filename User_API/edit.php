<?php
require_once '../Product_API/php.ini';

header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:GET,POST,OPTIONS");
header("Access-Control-Allow-Headers:X-Request-With, Content-Type");
header("Content-Type:application/json; charse=UTF-8");

$conn = new mysqli('localhost', 'pma', 'pmapass', 'db_flutter');
$id = $_POST['id'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

if ($id) {
	$query = $query = mysqli_query($conn, "UPDATE tb_user set username='$username', email='$email', password='$password' where id='$id'");

	if ($query) {
		echo json_encode([
			'messagess' => 'edited data success'
		]);
	} else {
		echo json_encode([
			'messagess' => 'edited data failed'
		]);
	}
}
