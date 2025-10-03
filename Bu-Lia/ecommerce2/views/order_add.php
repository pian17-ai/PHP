<?php
session_start();
var_dump($_SESSION);
// if (!isset($_SESSION['user_id'])) {
//     header("Location: register_login.php");
//     exit;
// }

include '../config/php.ini';
require_once '../models/Orders.php';

// if (!isset($_SESSION['id_user'])) {
//     header("Location: register_login.php");
//     exit;
// }

$db = new Database();
$orders = new Orders($db);

$data = [
    'id_product' => $_POST['id_product'],
    'user_id'    => $_SESSION['id_user'],
    'quantity'   => 1,
    'price'      => $_POST['price']
];

$orders->insert($data);

header("Location: orders.php");
exit;