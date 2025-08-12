<?php


    session_start();
    require_once "koneksi.php";

    $sql_profile = "select * from tbl_profile";
    $query_profile = mysqli_query($conn, $sql_profile);
    $web = mysqli_fetch_array($query_profile);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMKN 64</title>
    <link rel="stylesheet" href="/WEP64/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>

        .stat-card {
            background-color: #ffff;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        .stat-icon {
            font-size: 2rem;
        }

        .bg-lightblue {
            background-color: #f0f7ff;
        }

        .row{
            margin: 0;
        }
    </style>
</head>
<body>

    <!-- HEADER START -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="<?= $web['web_logo'] ?>" style="height: 35px; margin-right: 10px; margin-left: 40px;" alt="img"> <!-- Ganti 'logo.png' dengan logo sekolah -->
                <span class="fw-bold">SMKN 64 Jakarta</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="/web skolah/index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="#">Guru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="#">Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="#">Publish</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="#">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="#">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="/web skolah/contact.html">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
        </nav>
    <!-- HEADER END -->
    
    <!-- HERO SECTION START -->
    <?php
        $sql_slider = "select * from tbl_slider";
        $query_slider = mysqli_query($conn, $sql_slider);
        while($data = mysqli_fetch_array($query_slider)) 
        
        {
            
    ?>
        <div class="container py-5">
            <div class="row align-items-center">
                <!-- LEFT START -->
                    <div class="col-lg-6 col-md 12 mb-4">
                        <h1 class="fw-bold"><?= $data['slider_title'] ?></h2>
                            <p><?= $data['slider_deskripsi'] ?></p>
                            <div class="d-flex gap-2 mt-3">
                                <a href="<?= $data['slider_link'] ?>" class="btn btn-custom bg-lightblue">Contact Us</a>
                                <a href="<?= $data['slider_link'] ?>" class="btn btn-custom bg-lightblue">PPDB SISWA</a>
                            </div>
                    </div>
                <!-- LEFT END -->

                <!-- IMAGE -->
                    <div class="col-lg-6 col-md-12 text-center">
                        <img src="<?= $data['slider_picture'] ?>" alt="" class="img-fluid rounded-img">

                    </div>
                 <!-- IMAGE -->
            </div>
        </div>

    <?php 
        };
    ?>
    <!-- HERO SECTION END -->

    <!-- HERO 2 SECTION START -->
     <section class="bg-lightblue">
        <div class="container">
            <div class="row py-4 justify-content-center">

                <div class="col-md-3 col-sm-6 py-4">
                    <div class="stat-card">
                        <div class="stat-icon text-success"><i class="bi bi-calendar-event"></i></div>
                        <h5 class="mb-1"><?php echo $web['web_berdiri'] ?></h5>
                        <p class="text-muted mb-0">Berdiri Sejak</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 py-4">
                    <div class="stat-card">
                        <div class="stat-icon text-primary"><i class="bi bi-trophy"></i></div>
                        <h5 class="mb-1"><?php echo $web['web_penghargaan'] ?></h5>
                        <p class="text-muted mb-0">Penghargaan</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 py-4">
                    <div class="stat-card"> 
                        <div class="stat-icon text-success"><i class="bi bi-bag-check"></i></div>
                        <h5 class="mb-1"><?php echo $web['web_guru'] ?></h5>
                        <p class="text-muted mb-0">GURU & TU</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 py-4">
                    <div class="stat-card">
                        <div class="stat-icon text-primary"><i class="bi bi-calendar2-week"></i></div>
                        <h5 class="mb-1"><?php echo $web['web_industri'] ?></h5>
                        <p class="text-muted mb-0">Kerjasama Industri</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
     <!-- HERO 2 SECTION END -->

    <!-- EKSTRAKURIKULER START -->
      <section class="py-5 bg-white">
        <div class="container text-center">
            <h2 class="fw-bold">Kegiatan Ekstrakurikuler</h2>
            <hr class="mx-auto my-4 w-50 w-40 w-md-20 border-2 border-success opacity-30">

            <div class="row g-4 justify-content-center">
            <?php
                $sql_eskul = "select * from tbl_eskul";
                $query_eskul = mysqli_query($conn, $sql_eskul);
                while($eskul = mysqli_fetch_array($query_eskul)) {
            ?>
                <div class="col-lg-3 col-md-6">
                    <div class="shadow rounded p-4 h-100 bg-white">
                        <img src="<?= $eskul['eskul_logo']?>" alt="SESC" class="mx-auto d-block mb-3" width="50">
                        <h5 class="fw-bold"><?= $eskul["eskul_title"] ?></h5>
                        <p class="text-muted small"><?= $eskul['eskul_deskripsi'] ?></p>
                    </div>
                </div>
            <?php
                }
            ?>

            </div>

        </div>
      </section>
    <!-- EKSTRAKURIKULER END -->

      <!-- ??? -->
        <?php 
            $sql_deskripsi = "select * from tbl_deskripsi where status='1'";
            $query_deskripsi = mysqli_query($conn, $sql_deskripsi);
            while($deskripsi = mysqli_fetch_array($query_deskripsi)) {
        ?>
            <div class="container-fluid py-5 d-flex justify-content-center align-items-center bg-lightblue">
                <p class="col-12 col-md-6 text-center text-secondary small px-3"><?= $deskripsi['deskripsi_body'] ?></p>
            </div>
        <?php 
            }
        ?>
    <!-- ??? -->

    <!-- BERITA START -->
        <div class="container py-4">
            <div class="row g-4 justify-content-center">
                <img src="/img/eskul/SESC.png" class="mx-auto d-block mb-3 rounded" alt="">
                
                <?php 
                    $sql_berita = "select * from tbl_berita";
                    $query_berita = mysqli_query($conn, $sql_berita);
                    while($berita = mysqli_fetch_array($query_berita))
                    {
                ?>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card border-primary-subtle shadow-sm">
                            <div class="card-body text-center">

                                <!-- Gambar di atas judul -->
                                <img src="<?= $berita['berita_picture'] ?>" 
                                    alt="<?= $berita['berita_title'] ?>" 
                                    class="img-fluid mb-3 rounded-3" 
                                    style="max-height: 150px; object-fit: cover;">

                                <h5 class="card-title"><?= $berita['berita_title'] ?></h5>
                                <p class="card-text text-secondary small"><?= $berita['berita_deskripsi'] ?></p>
                            </div>
                        </div>
                    </div>


                <?php 
                    }
                ?>
            </div>
        </div>
    <!-- BERITA END -->
        
    <!-- GURU & TU START -->
        <section class="py-5 bg-white">
            <div class="container text-center">
                <h2 class="fw-bold">GURU & TU</h2>
                <hr class="mx-auto my-4 w-50 w-40 w-md-20 border-2 border-success opacity-30">

                <div class="row g-4 justify-content-center">

                    <?php 
                        $sql_guru_tu = "select * from tbl_guru_tu";
                        $query_guru_tu = mysqli_query($conn, $sql_guru_tu);
                        while($guru_tu = mysqli_fetch_array($query_guru_tu)) {
                            ?>
                                <div class="col-lg-3 col-md-6">
                                    <div class="shadow rounded p-4 h-100 bg-white">
                                        <img src="<?= $guru_tu['detail_picture'] ?>" class="mx-auto d-block mb-3 rounded" width="100" alt=""></img>
                                        <h5 class="fw-bold"><?= $guru_tu['detail_nama'] ?></h5>
                                    </div>
                                </div>
                            <?php
                              }  
                            ?>
                </div>

            </div>
        </section>
    <!-- GURU & TU END -->

    <!-- FOOTER START -->
        <footer class="bg-dark text-white pt-4">
            <div class="container text-center opacity-50">
                
                <div class="mb-3 d-flex justify-content-center gap-5">
                    <?php 
                        $sql_sosmed = "select * from tbl_sosmed";
                        $query_sosmed = mysqli_query($conn, $sql_sosmed);
                        while($sosmed = mysqli_fetch_array($query_sosmed)) 
                        {
                    ?>
                    <div>
                        <a href="<?= $sosmed['instagram'] ?>" class="text-decoration-none text-white">
                            <i class="bi bi-instagram fs-2"></i><br>
                            <span>Instagram</span>
                        </a>
                    </div>
                    <div>
                        <a href="<?= $sosmed['facebook'] ?>" class="text-decoration-none text-white">
                            <i class="bi bi-facebook fs-2"></i><br>
                            <span>Facebook</span>
                        </a>
                    </div>
                    <div>
                        <a href="<?= $sosmed['youtube'] ?>" class="text-decoration-none text-white">
                            <i class="bi bi-youtube fs-2"></i><br>
                            <span>Youtube</span>
                        </a>
                    </div>
                    <?php
                        }
                    ?>
                </div>

                <hr class="border-secondary">

                <p class="mb-0 pb-3 small">@2025 SMKN 64 JAKARTA</p>

            </div>
        </footer>
    <!-- FOOTER END -->

    <script src="/web skolah/js/bootstrap.bundle.min.js"></script>
</body>
</html>