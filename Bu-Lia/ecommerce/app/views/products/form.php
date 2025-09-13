<div class="container mt-4">
  <h2><?= isset($product) ? "Edit Produk" : "Tambah Produk" ?></h2>
  <form method="POST" action="?action=<?= isset($product) ? 'update' : 'store' ?>">
    <div class="mb-3">
      <label>ID Product</label>
      <input type="text" class="form-control" name="id_product" value="<?= $product['id_product'] ?? '' ?>" <?= isset($product) ? 'readonly' : '' ?>>
    </div>
    <div class="mb-3">
      <label>Nama Product</label>
      <input type="text" class="form-control" name="name_product" value="<?= $product['name_product'] ?? '' ?>">
    </div>
    <div class="mb-3">
      <label>Harga</label>
      <input type="text" class="form-control" name="price" value="<?= $product['price'] ?? '' ?>">
    </div>
    <div class="mb-3">
      <label>Stok</label>
      <input type="text" class="form-control" name="stock" value="<?= $product['stock'] ?? '' ?>">
    </div>
    <div class="mb-3">
      <label>Img</label>
      <input type="text" class="form-control" name="img" value="<?= $product['img'] ?? '' ?>">
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
  </form>
</div>
