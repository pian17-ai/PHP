<?php
include '../koneksi.php';
include '../backend/Product.php';

$db = $conn;
$product = new Product($db);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Data Siswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include '../components/navbar.php'; ?>

<div class="container p-4">
  <h1>Data Siswa</h1>
  <a href="siswa.php?op=tambah" class="btn btn-primary">Tambah Data</a>
  <hr>

  <?php if ($success) { ?>
    <div class="alert alert-success"><?= $success ?></div>
  <?php } ?>

  <?php if ($error) { ?>
    <div class="alert alert-danger"><?= $error ?></div>
  <?php } ?>

  <!-- Form tambah / edit sama kayak punyamu -->
  <!-- Table -->
  <table class="table mt-3">
    <thead>
      <tr>
        <th>Id Product</th>
        <th>Name Product</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Img</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $result = $product->getProducts();
      while ($row = $result->fetch_assoc()) {
      ?>
      <tr>
        <td><?= $row['id_product'] ?></td>
        <td><?= $row['name_product'] ?></td>
        <td><?= $row['price'] ?></td>
        <td><?= $row['stock'] ?></td>
        <td><?= $row['img'] ?></td>
        <td>
          <a href="siswa.php?op=edit&nis=<?= $row['NIS'] ?>" class="btn btn-warning">Edit</a>
          <a href="siswa.php?op=delete&nis=<?= $row['NIS'] ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus data?')">Delete</a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</body>
</html>
