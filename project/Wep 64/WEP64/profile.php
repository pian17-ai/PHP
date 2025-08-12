<?php
session_start();
include 'koneksi.php';

$sql = "SELECT * from tbl_profile";
$q = mysqli_query($conn, $sql);
$profile = mysqli_fetch_array($q);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SMKN 64 | Gallery</title>
    <link rel="stylesheet" href="/WEP64/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>

<body>
    <?php include 'navbar.php' ?>

    <div class="container">

        <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark mt-4 mb-4">
            <div class="col-md-6 px-0">
                <h1 class="display-4 font-italic">Profile SMKN 64 Jakarta</h1>
                <!-- <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what's most interesting in this post's contents.</p>
                <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p> -->
            </div>
        </div>

        <div class="row mb-2 mt-2">
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-info">Visi Misi</strong>
                        <h3 class="mb-0">
                            <strong>Visi Misi SMKN 64 Jakarta</strong>
                        </h3>
                        <h4 class="m-3">Visi :</h4>
                        <p class="card-text mb-auto"><?= $profile['profile_visi'] ?></p>
                        <h4 class="m-3">Misi :</h4>
                        <p class="card-text mb-auto"><?= $profile['profile_misi'] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-success">Profile</strong>
                        <h3 class="mb-0">
                            <strong>SMK Negeri 64 Jakarta</strong>
                        </h3>
                        <h5 class="m-3">Alamat : </h5>
                        <p class="card-text mb-auto"><?= $profile['profile_alamat'] ?></p>
                        <h5 class="m-3">Email :</h5>
                        <p class="card-text mb-auto"><?= $profile['profile_email'] ?></p>
                        <h5 class="m-3">NPSN :</h5>
                        <p class="card-text mb-auto"><?= $profile['profile_npsn'] ?></p>
                        <h5 class="m-3">Nama Pengawas :</h5>
                        <p class="card-text mb-auto"><?= $profile['profile_pengawas'] ?></p>
                        <h5 class="m-3">NIP Pengawas :</h5>
                        <p class="card-text mb-auto"><?= $profile['profile_pengawas_nip'] ?></p>
                        <h5 class="m-3">Nama Kepala Sekolah :</h5>
                        <p class="card-text mb-auto"><?= $profile['profile_kepse'] ?></p>
                        <h5 class="m-3">NIP Kepala Sekolah :</h5>
                        <p class="card-text mb-auto"><?= $profile['profile_kepse_nip'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <h3 class="pb-3 mb-4 font-italic border-bottom">
                    Identitas SMK Negeri 64 Jakarta
                </h3>

                <div class="blog-post">
                    <p><?= $profile['profile_identitas'] ?></p>
                </div><!-- /.blog-post -->

                <!-- <div class="blog-post">
                    <h2 class="blog-post-title">New feature</h2>
                    <p class="blog-post-meta">December 14, 2013 by <a href="#">Chris</a></p>

                    <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                    <ul>
                        <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
                        <li>Donec id elit non mi porta gravida at eget metus.</li>
                        <li>Nulla vitae elit libero, a pharetra augue.</li>
                    </ul>
                    <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                    <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>
                </div> -->
                <!-- /.blog-post -->

            </div><!-- /.blog-main -->

            <aside class="col-md-4 blog-sidebar">
                <!-- <div class="p-3 mb-3 bg-light rounded">
                    <h4 class="font-italic">About</h4>
                    <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                </div> -->
                <a href="berita.php" class="text-decoration-none">
                    <?php include 'berita_utama.php' ?>
                </a>
            </aside>
                
        </div><!-- /.row -->

    </main><!-- /.container -->

    <?php include 'footer.php' ?>
</body>

</html>