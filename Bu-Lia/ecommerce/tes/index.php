<?php
include '../php.ini';
require_once 'models/Product.php';

$db = new Database();
$siswa = new Product($db);

// if (isset($_GET['delete'])) {
//     $siswa->delete($_GET['delete']);
//     header("Location: index.php");
// }
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD OOP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
<h2>Data Siswa</h2>
<a href="form.php" class="btn btn-primary mb-3">Tambah Data</a>

<table class="table table-bordered">
    <tr>
        <th>Id Product</th>
        <th>Name Product</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Image</th>
        <th>Image Link</th>
        <th>Aksi</th>
    </tr>
    <?php
    $result = $siswa->getProducts();
    while ($row = $result->fetch_assoc()) {
    ?>
    <tr>
        <td><?= $row['id_product'] ?></td>
        <td><?= $row['name_product'] ?></td>
        <td><?= $row['price'] ?></td>
        <td><?= $row['stock'] ?></td>
        <td><img style="width: 200px;" src="<?= $row['img'] ?>" alt=""></td>
        <td><?= $row['img'] ?></td>
        <td>
            <a href="form.php?edit=<?= $row['id_product'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="index.php?delete=<?= $row['id_product'] ?>" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>
</body>
</html>
