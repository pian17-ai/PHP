<?php
    include 'koneksi.php';

    $sql = "SELECT * from tbl_profile where id='1'";
    $query = mysqli_query($conn, $sql);
    $nav = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMKN 64 | Guru</title>
    <link rel="stylesheet" href="/WEP64/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <!-- NAVBAR START -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <img src="<?= $nav['profile_logo'] ?>" style="height: 35px; margin-right: 10px; margin-left: 40px;" alt="img"> <!-- Ganti 'logo.png' dengan logo sekolah -->
                <span class="fw-bold">SMKN 64 Jakarta</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link fw-bold" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold" href="profile.php">Profile</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold" href="guru.php">Guru</a></li>
                    <!-- <li class="nav-item"><a class="nav-link fw-bold" href="#">Siswa</a></li> -->
                    <li class="nav-item"><a class="nav-link fw-bold" href="gallery.php">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold" href="berita.php">Berita</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold" href="contact.php">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- NAVBAR END -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>