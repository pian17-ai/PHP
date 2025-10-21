<?php
require_once '../Product_API/php.ini';

header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:GET,POST,OPTION");
header("Access-Control-Allow-Headers:X-Request-With, Content-Type");
header("Content-Type:application/json; charse=UTF-8");

$conn = new mysqli('localhost', 'pma', 'pmapass', 'db_flutter');
$query = mysqli_query($conn, "SELECT * from tb_product");
$data = mysqli_fetch_all($query, MYSQLI_ASSOC);
echo json_encode($data);

?>
