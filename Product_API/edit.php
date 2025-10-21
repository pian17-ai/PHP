<?php

header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:GET,POST,OPTIONS");
header("Access-Control-Allow-Headers:X-Request-With, Content-Type");
header("Content-Type:application/json; charse=UTF-8");

$conn = new mysqli('localhost', 'pma', 'pmapass', 'db_flutter');
$name_product = $_POST['name_product'];
$price_product = $_POST['price_product'];

$query = $query = mysqli_query($conn, "INSERT into tb_product set name_product='$name_product', price_product='$price_product', where id_product='$id_product'");

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
