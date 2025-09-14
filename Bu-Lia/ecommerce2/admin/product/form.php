<?php
include '../../config/php.ini';
require_once '../../models/Product.php';

$db = new Database();
$product = new Product($db);

$id = $name = $desc = $price = $img = $stock = "";

if (isset($_GET['edit'])) {
    $data = $product->getProduct($_GET['edit']);
    $id = $data['id_product'];
    $name = $data['name_product'];
    $desc = $data['description'];
    $price = $data['price'];
    $img = $data['img'];
    $stock = $data['stock'];
}

if (isset($_POST['save'])) {
    $data = [
        "id" => $_POST['id'],
        "name" => $_POST['name'],
        "desc" => $_POST['desc'],
        "price" => $_POST['price'],
        "img" => $_POST['img'],
        "stock" => $_POST['stock']
    ];

    if ($_POST['mode'] == "edit") {
        $product->update($data);
    } else {
        $product->insert($data);
    }
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
<h2><?= isset($_GET['edit']) ? "Edit" : "Tambah" ?> Data Product</h2>

<form method="post">
    <input type="hidden" name="mode" value="<?= isset($_GET['edit']) ? "edit" : "tambah" ?>">

    <div class="mb-3">
        <label>Id Product</label>
        <input type="text" name="id" class="form-control" value="<?= $id ?>" <?= isset($_GET['edit']) ? "readonly" : "" ?> required>
    </div>
    <div class="mb-3">
        <label>Name Product</label>
        <input type="text" name="name" class="form-control" value="<?= $name ?>" required>
    </div>
    <div class="mb-3">
        <label>Description Product</label>
        <input type="text" name="desc" class="form-control" value="<?= $desc ?>">
    </div>
    <div class="mb-3">
        <label>Price</label>
        <input type="text" name="price" class="form-control" value="<?= $price ?>">
    </div>
    <div class="mb-3">
        <label>Image</label>
        <input type="text" name="img" class="form-control" value="<?= $img ?>">
    </div>
    <div class="mb-3">
        <label>Stock</label>
        <input type="text" name="stock" class="form-control" value="<?= $stock ?>">
    </div>

    <button type="submit" name="save" class="btn btn-success">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>
</body>
</html>
