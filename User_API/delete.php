<?php
require_once '../Product_API/php.ini';

header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:GET,POST,OPTIONS");
header("Access-Control-Allow-Headers:X-Request-With, Content-Type");
header("Content-Type:application/json; charse=UTF-8");

$conn = new mysqli('localhost', 'pma', 'pmapass', 'db_flutter');
if ($conn->connect_error) {
    echo json_encode(['messages=>failed',
    'error' => $conn->connect_error]);
    exit;
}

$id = $_POST['id'];
$query = mysqli_query($conn, "DELETE from tb_user where id='$id'");

if ($query) {
	echo json_encode([
		'messagess' => 'delete data success',
		mysqli_fetch_all($query, MYSQLI_ASSOC)
	]);
} else {
	echo json_encode([
		'messagess' => 'delete data failed'
	]);
}


?>
