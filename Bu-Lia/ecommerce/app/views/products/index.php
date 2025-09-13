<?php
include '../php.ini';
include '../koneksi.php';
include '../app/controllers/ProductController.php';

$controller = new ProductController($conn);

$action = $_GET['action'] ?? 'index';
$id     = $_GET['id'] ?? null;

switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'store':
        $controller->store($_POST);
        break;
    case 'edit':
        $controller->edit($id);
        break;
    case 'update':
        $controller->update($_POST);
        break;
    case 'delete':
        $controller->delete($id);
        break;
    default:
        $controller->index();
        break;
}
