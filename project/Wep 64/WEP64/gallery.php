<?php
session_start();
include 'koneksi.php';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Album example for Bootstrap</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

  <link rel="stylesheet" href="/WEP64/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>

  <?php include 'navbar.php' ?>

  <main role="main">

    <div class="jumbotron p-3 p-md-5 text-dark bg-white mb-4">
      <div class="col-md-6 px-0">
        <h1 class="display-4 font-italic">Gallery 64</h1>
        <!-- <p class="lead my-3">Apa aja sih yang </p> -->
        <!-- <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p> -->
      </div>
    </div>


    <div class="album py-5 bg-light">
      <div class="container">


        <div class="row">
          <?php
          $sql = "SELECT * from tbl_gallery";
          $query = mysqli_query($conn, $sql);
          while ($gallery = mysqli_fetch_array($query)) {
          ?>
            <!-- BERITA START -->
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="<?= $gallery['img'] ?>" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text"><?= $gallery['title'] ?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted"><?= date("d M Y H:i", strtotime($gallery['updated_at'])) ?></small>
                  </div>
                </div>
              </div>
            </div>
            <!-- BERITA END -->
          <?php
          }
          ?>
        </div>
      </div>
    </div>

  </main>

  <!-- FOOTER -->
  <?php include 'footer.php' ?>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
  </script>
  <script src="../../assets/js/vendor/popper.min.js"></script>
  <script src="../../dist/js/bootstrap.min.js"></script>
  <script src="../../assets/js/vendor/holder.min.js"></script>
</body>

</html>