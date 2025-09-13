<div class="container p-4">
  <h1>Data Produk</h1>
  <a href="?action=create" class="btn btn-primary">Tambah Data</a>
  <hr>

  <div class="table-responsive">
    <table class="table mt-4 table-bordered text-center align-middle">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Harga</th>
          <th>Stok</th>
          <th>Img</th>
          <th>Link</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($products)) { ?>
        <tr>
          <td><?= $row['id_product'] ?></td>
          <td><?= $row['name_product'] ?></td>
          <td><?= $row['price'] ?></td>
          <td><?= $row['stock'] ?></td>
          <!-- <td><img src="../../<?= $row['img'] ?>" style="width:80px;"></td> -->
          <td><img src="img/bantal.png" style="width:80px;"></td>
          <img src="../../" alt="">
          <td>
            <a href="?action=edit&id=<?= $row['id_product'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="?action=delete&id=<?= $row['id_product'] ?>" onclick="return confirm('Yakin?')" class="btn btn-danger btn-sm">Delete</a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>