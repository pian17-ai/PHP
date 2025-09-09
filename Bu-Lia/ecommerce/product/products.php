<?php

include '../PHP/Bu-Lia/ecommerce/product/php.ini';
include '../koneksi.php';

$id_product = "";
$name_product = "";
$price = "";
$stock = "";

$success = "";
$error = "";

if (isset($_GET['op'])) {
  $op = $_GET['op'];
} else {
  $op = "";
}

# DELETE
if ($op == 'delete') {
  $id_product = $_GET['id_product'];
  $sql = "DELETE FROM products WHERE id_product='$id_product'";
  $query = mysqli_query($conn, $sql);
  if ($query) {
    $success = "Data Berhasil Dihapus";
  } else {
    $error = "Gagal menghapus data";
  }
}

# EDIT
if ($op == 'edit') {
  $id_product = $_GET['id_product'];
  $sql = "SELECT * FROM products WHERE id_product='$id_product'";
  $query = mysqli_query($conn, $sql);
  $edited = mysqli_fetch_array($query);

  $id_product = $edited['id_product'];
  $name_product = $edited['name_product'];
  $price = $edited['price'];
  $stock = $edited['stock'];
}

# SUBMIT (tambah/update)
if (isset($_POST['submit'])) {
  $id_product = $_POST['id_product'];
  $name_product = $_POST['name_product'];
  $price = $_POST['price'];
  $stock = $_POST['stock'];

  if ($id_product == '' || $name_product == '' || $price == '' || $stock == '') {
    $error = "Masukkan semua data dengan benar";
  } else {
    if ($op == 'edit') {
      $sql = "UPDATE products 
              SET name_product='$name_product', price='$price', stock='$stock' 
              WHERE id_product='$id_product'";
      $query = mysqli_query($conn, $sql);
      if ($query) {
        $success = "Berhasil Mengupdate Data";
      } else {
        $error = "Gagal Mengupdate Data";
      }
    } else {
      $sql = "INSERT INTO products (id_product, name_product, price, stock) 
              VALUES ('$id_product', '$name_product', '$price', '$stock')";
      $query = mysqli_query($conn, $sql);

      if ($query) {
        $success = "Berhasil Menambahkan Data";
      } else {
        $error = "Gagal Menambahkan Data";
      }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Produk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container p-4">
    <h1>Data Produk</h1>
    <a href="products.php?op=tambah" class="btn btn-primary">Tambah Data</a>
    <hr>

    <?php if ($success) { ?>
      <div class="alert alert-success"><?= $success ?></div>
      <?php header("Refresh:3; url=products.php"); ?>
    <?php } ?>

    <?php if ($error) { ?>
      <div class="alert alert-danger"><?= $error ?></div>
      <?php header("Refresh:3; url=products.php"); ?>
    <?php } ?>

    <div class="container">

      <?php if ($op == 'tambah' || $op == 'edit') { ?>
        <form action="" method="POST">

          <div class="input-group mb-3">
            <span class="input-group-text">ID Product</span>
            <input type="text" class="form-control" name="id_product" value="<?= $id_product ?>" <?= ($op == 'edit' ? 'readonly' : '') ?>>
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text">Nama Product</span>
            <input type="text" class="form-control" name="name_product" value="<?= $name_product ?>">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text">Harga</span>
            <input type="text" class="form-control" name="price" value="<?= $price ?>">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text">Stok</span>
            <input type="text" class="form-control" name="stock" value="<?= $stock ?>">
          </div>

          <input type="submit" name="submit" value="Simpan Data" class="btn btn-success">
        </form>
      <?php } ?>

      <table class="table mt-4">
        <thead>
          <tr>
            <th>ID Product</th>
            <th>Nama Product</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>
          <?php
          $sql = "SELECT * FROM products";
          $query = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_array($query)) {
          ?>
            <tr>
              <td><?= $row['id_product'] ?></td>
              <td><?= $row['name_product'] ?></td>
              <td><?= $row['price'] ?></td>
              <td><?= $row['stock'] ?></td>
              <td>
                <a href="products.php?op=edit&id_product=<?= $row['id_product'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="products.php?op=delete&id_product=<?= $row['id_product'] ?>" onclick="return confirm('Yakin Mau Hapus Data?')" class="btn btn-danger btn-sm">Delete</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>

    </div>
  </div>
</body>
</html>
