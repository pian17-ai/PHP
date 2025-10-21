<?php
require_once '../Product_API/php.ini';

header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:GET,POST,OPTIONS");
header("Access-Control-Allow-Headers:X-Request-With, Content-Type");
header("Content-Type:application/json; charse=UTF-8");

$conn = new mysqli('localhost', 'pma', 'pmapass', 'db_flutter');
$name_product = $_POST['name_product'];
$price_product = $_POST['price_product'];

$conn = new mysqli('localhost', 'pma', 'pmapass', 'db_flutter');
if ($conn->connect_error) {
    echo json_encode(['messages=>failed',
    'error' => $conn->connect_error]);
    exit;
}

$id_product = $_POST['id_product'];
$query = mysqli_query($conn, "DELETE from tb_product where id_product='$id_product'");

if ($query) {
	echo json_encode([
		'messagess' => 'success'
	]);
} else {
	echo json_encode([
		'messagess' => 'failed'
	]);
}


?>
