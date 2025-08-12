<?php
session_start();
require_once("koneksi.php");

$sql = "SELECT * from tbl_profile";
$query = mysqli_query($conn, $sql);
$profile = mysqli_fetch_array($query);
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

        .row {
            margin: 0;
        }
    </style>
</head>

<body>

    <!-- NAVBAR START -->
    <?php
    include 'navbar.php';
    ?>
    <!-- NAVBAR END -->

    <!-- HERO SECTION START -->
    <?php
    $sql = "SELECT * from tbl_hero where hero_status=true";
    $query = mysqli_query($conn, $sql);
    $hero = mysqli_fetch_array($query);
    ?>
    <div class="container py-5">
        <div class="row align-items-center">
            <!-- LEFT START -->
            <div class="col-lg-6 col-md 12 mb-4">
                <h1 class="fw-bold"><?= $hero['hero_title'] ?></h2>
                    <p><?= $hero['hero_deskripsi'] ?></p>
                    <div class="d-flex gap-2 mt-3">
                        <a href="contact.php" class="btn btn-custom bg-primary text-white">Contact Us</a>
                        <a href="#" class="btn btn-custom bg-primary text-white">PPDB SISWA</a>
                    </div>
            </div>
            <!-- LEFT END -->

            <!-- IMAGE -->
            <div class="col-lg-6 col-md-12 text-center">
                <img src="<?= $hero['hero_img'] ?>" alt="" class="img-fluid rounded-img">

            </div>
            <!-- IMAGE -->
        </div>
    </div>
    <!-- HERO SECTION END -->

    <!-- HERO 2 SECTION START -->
    <section class="bg-lightblue">
        <div class="container">
            <div class="row py-4 justify-content-center">

                <div class="col-md-3 col-sm-6 py-4">
                    <div class="stat-card">
                        <div class="stat-icon text-success"><i class="bi bi-calendar-event"></i></div>
                        <h5 class="mb-1"><?= $profile['profile_berdiri'] ?></h5>
                        <p class="text-muted mb-0">Berdiri Sejak</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 py-4">
                    <div class="stat-card">
                        <div class="stat-icon text-primary"><i class="bi bi-trophy"></i></div>
                        <h5 class="mb-1"><?= $profile['profile_penghargaan'] ?></h5>
                        <p class="text-muted mb-0">Penghargaan</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 py-4">
                    <div class="stat-card">
                        <div class="stat-icon text-success"><i class="bi bi-bag-check"></i></div>
                        <h5 class="mb-1"><?= $profile['profile_guru_tu'] ?></h5>
                        <p class="text-muted mb-0">GURU & TU</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 py-4">
                    <div class="stat-card">
                        <div class="stat-icon text-primary"><i class="bi bi-calendar2-week"></i></div>
                        <h5 class="mb-1"><?= $profile['profile_industri'] ?></h5>
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
                $sql = "SELECT * from tbl_eskul";
                $query = mysqli_query($conn, $sql);
                while ($eskul = mysqli_fetch_array($query)) {
                ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="shadow rounded p-4 h-100 bg-white">
                            <img src="<?= $eskul['eskul_img'] ?>" alt="SESC" class="mx-auto d-block mb-3" width="50">
                            <h5 class="fw-bold"><?= $eskul['eskul_title'] ?></h5>
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
    <div class="container-fluid py-5 d-flex justify-content-center align-items-center bg-lightblue">
        <p class="col-12 col-md-6 text-center text-secondary small px-3"><?= $profile['profile_deskripsi'] ?></p>
    </div>
    <!-- ??? -->

    <!-- BERITA START -->
    <div class="container py-4 text-center">
        <a href="berita.php" class="text-decoration-none">
            <div class="row g-4 justify-content-center">
                <?php
                $sql = "SELECT * from tbl_berita where utama_biasa='utama'";
                $query = mysqli_query($conn, $sql);
                while ($berita = mysqli_fetch_array($query)) {
                ?>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card border-primary-subtle shadow-sm">
                            <div class="card-body text-center">

                                <img src="<?= $berita['berita_img'] ?>"
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
        </a>
    </div>
    <!-- BERITA END -->

    <!-- GURU & TU START -->
    <section class="py-5 bg-white">
        <div class="container text-center">
            <h2 class="fw-bold">GURU & TU</h2>
            <hr class="mx-auto my-4 w-50 w-40 w-md-20 border-2 border-success opacity-30">

            <div class="row g-4 justify-content-center">
                <?php
                $sql = "SELECT * from tbl_guru_tu";
                $query = mysqli_query($conn, $sql);
                while ($guru_tu = mysqli_fetch_array($query)) {
                ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="shadow rounded p-4 h-100 bg-white">
                            <img src="<?= $guru_tu['guru_tu_img'] ?>" class="mx-auto d-block mb-3 rounded" width="100" alt=""></img>
                            <h5 class="fw-bold"><?= $guru_tu['guru_tu_name'] ?></h5>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>

        </div>
    </section>
    <!-- GURU & TU END -->

    <?php include 'footer.php' ?>

    <script src="/web skolah/js/bootstrap.bundle.min.js"></script>
</body>

</html>