<?php
require_once '../Product_API/php.ini';

header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:GET,POST,OPTIONS");
header("Access-Control-Allow-Headers:X-Request-With, Content-Type");
header("Content-Type:application/json; charse=UTF-8");

$conn = new mysqli('localhost', 'pma', 'pmapass', 'db_flutter');
$id_product = $_POST['id_product'];
$name_product = $_POST['name_product'];
$price_product = $_POST['price_product'];
$image_product = $_POST['image_product'];

$query = $query = mysqli_query($conn, "UPDATE tb_product set name_product='$name_product', price_product='$price_product', image_product='$image_product' where id_product='$id_product'");

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
