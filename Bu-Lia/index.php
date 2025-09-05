<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DB Nilai Siswa</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .hero {
      height: 94vh; /* 1 layar penuh */
      background: url('img/bg.png') no-repeat center center/cover;
      position: relative;
      color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    .hero::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0,0,0,0.5);
    }

    .hero-content {
      position: relative;
      z-index: 1;
    }
  </style>
</head>
<body>

   <?php include 'components/navbar.php' ?>

  <section class="hero">
    <div class="hero-content">
      <h1 class="display-3 fw-bold">Selamat Datang di Database Siswa SMKN 64</h1>
      <!-- <p class="lead">Data Nilai Siswa</p> -->
      <!-- <a href="#about" class="btn btn-primary btn-lg mt-3">Get Started</a> -->
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>