<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../models/Product.php';

$db = new Database;
$product = new Product($db);

?>

<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ecommerce</title>
  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      padding-top: 72px;
    }

    .card-img-top {
      object-fit: cover;
      height: 180px;
    }
  </style>
</head>

<body>

  <?php include 'components/navbar.php'; ?>

  <header class="bg-light py-5">
    <div class="container text-center">
      <h1 class="display-6">Selamat datang di TokoKita</h1>
      <p class="lead">Temukan produk favoritmu — cepat, aman, mudah.</p>
    </div>
  </header>


  <main class="container my-5">
    <div class="row g-4">

      <?php

      $result = $product->getProducts();
      while ($row = $result->fetch_assoc()) {

      ?>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
          <div class="card h-100">
            <img src="../<?= $row['img'] ?>" class="card-img-top" alt="Produk 1">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title"><?= $row['name_product'] ?> 1</h5>
              <p class="card-text mb-4"><?php

                                        $desc = $row['description'];
                                        $max = 100;
                                        echo substr($desc, 0, $max) . '...';

                                        ?>
              </p>
              <div class="mt-auto d-flex justify-content-between align-items-center">
                <strong class="fs-5">Rp<?= $row['price'] ?></strong>
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#buyModal" data-product="Nama Produk 1" data-price="Rp120.000">Beli</button>
              </div>
            </div>
          </div>
        </div>

      <?php } ?>

    </div>
  </main>


  <footer class="bg-dark text-light py-4">
    <div class="container text-center small">© 2025 TokoKita — All rights reserved</div>
  </footer>


  <div class="modal fade" id="buyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Konfirmasi Pembelian</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p id="buyText">Memuat...</p>
          <div class="mb-3">
            <label for="quantity" class="form-label">Jumlah</label>
            <input id="quantity" type="number" class="form-control" value="1" min="1">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button id="confirmBuy" type="button" class="btn btn-primary">Tambahkan ke Keranjang</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="cartModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Keranjang</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="cartBody">
          <p class="text-muted">Keranjang kosong.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button id="checkout" type="button" class="btn btn-success">Checkout</button>
        </div>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Simple client-side cart (for demo only)
    const cart = [];
    const cartCountButton = document.querySelector('.navbar .btn-outline-light');
    const cartBody = document.getElementById('cartBody');

    // Fill modal when opened via buy buttons
    const buyModal = document.getElementById('buyModal');
    buyModal.addEventListener('show.bs.modal', event => {
      const button = event.relatedTarget;
      const product = button.getAttribute('data-product');
      const price = button.getAttribute('data-price');
      document.getElementById('buyText').textContent = `${product} — ${price}`;
      document.getElementById('quantity').value = 1;
      // store product info on the confirm button
      const confirm = document.getElementById('confirmBuy');
      confirm.setAttribute('data-product', product);
      confirm.setAttribute('data-price', price);
    });

    // Confirm add to cart
    document.getElementById('confirmBuy').addEventListener('click', () => {
      const product = document.getElementById('confirmBuy').getAttribute('data-product');
      const price = document.getElementById('confirmBuy').getAttribute('data-price');
      const qty = parseInt(document.getElementById('quantity').value) || 1;
      cart.push({
        product,
        price,
        qty
      });
      updateCartUI();
      const modal = bootstrap.Modal.getInstance(buyModal);
      modal.hide();
    });

    function updateCartUI() {
      // update button text
      cartCountButton.textContent = `Keranjang (${cart.length})`;
      if (cart.length === 0) {
        cartBody.innerHTML = '<p class="text-muted">Keranjang kosong.</p>';
        return;
      }
      let html = '<div class="list-group">';
      cart.forEach((item, i) => {
        html += `<div class="list-group-item d-flex justify-content-between align-items-center">
                   
        html += '</div>';
        cartBody.innerHTML = html;
      }

      window.removeFromCart = function(index){ <div>
                      <div class="fw-bold">${item.product}</div>
                      <small>${item.price} × ${item.qty}</small>
                    </div>
                    <div>
                      <button class="btn btn-sm btn-outline-danger" onclick="removeFromCart(${i})">Hapus</button>
                    </div>
                  </div>`;
      });
      cart.splice(index, 1);
      updateCartUI();
    }

    document.getElementById('checkout').addEventListener('click', () => {
      if (cart.length === 0) return alert('Keranjang kosong.');
      alert('Demo: lanjut ke proses pembayaran (tidak diimplementasikan).');
    });

    // init
    updateCartUI();
  </script>
</body>

</html>