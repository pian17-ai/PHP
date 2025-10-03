<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../models/Product.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: register_login.php");
  exit;
}

$db = new Database;
$product = new Product($db);
$home_active = "active"

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

                <form method="POST" action="order_add.php">
                  <input type="hidden" name="id_product" value="<?= $row['id_product'] ?>">
                  <input type="hidden" name="price" value="<?= $row['price'] ?>">
                  <button type="submit" class="btn btn-primary btn-sm">Beli</button>
                </form>
                <!-- <button class="btn btn-primary btn-sm">Beli</button> -->

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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>