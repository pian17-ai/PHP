<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Blog Home - Start Bootstrap Template</title>
    <link rel="stylesheet" href="/WEP64/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <!-- Responsive navbar-->
    <?php include 'navbar.php' ?>
    <!-- Page content-->
    <div class="jumbotron p-3 p-md-5 text-dark bg-white mb-4">
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic">Berita 64</h1>
            <!-- <p class="lead my-3">Apa aja sih yang </p> -->
            <!-- <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p> -->
        </div>
    </div>
    <div class="bg-light">

        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <?php
                    $sql = "SELECT * from tbl_berita where utama_biasa='utama'";
                    $query = mysqli_query($conn, $sql);
                    while ($utama = mysqli_fetch_array($query)) {
                    ?>
                        <div class="card mb-4">
                            <a href="#!"><img class="card-img-top" src="<?= $utama['berita_img'] ?>" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted"><?= date("d M Y H:i", strtotime($utama['updated_at'])) ?></div>
                                <h2 class="card-title"><?= $utama['berita_title'] ?></h2>
                                <p class="card-text"><?= $utama['berita_deskripsi'] ?></p>
                                <a class="btn btn-primary" href="#!">Read more →</a>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row" data-masonry='{"percentPosition": true }'>
                        <?php
                        $sql = "SELECT * from tbl_berita where utama_biasa='biasa'";
                        $query = mysqli_query($conn, $sql);
                        while ($biasa = mysqli_fetch_array($query)) {
                        ?>
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <a href="#!"><img class="card-img-top" src="<?= $biasa['berita_img'] ?>" alt="..." /></a>
                                    <div class="card-body">
                                        <div class="small text-muted"><?= date('d M Y H:i', strtotime($biasa['updated_at'])) ?></div>
                                        <h2 class="card-title h4"><?= $biasa['berita_title'] ?></h2>
                                        <p class="card-text"><?= $biasa['berita_deskripsi'] ?></p>
                                        <a class="btn btn-primary" href="#!">Read more →</a>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>
                    </div>
                    <!-- <div class="col-lg-6">
                        <div class="card mb-4">
                            <a href="#!"><img class="card-img-top" src="img/berita/konatsu.jpg" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted">January 1, 2023</div>
                                <h2 class="card-title h4">Post Title</h2>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p>
                                <a class="btn btn-primary" href="#!">Read more →</a>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <a href="#!"><img class="card-img-top" src="img/berita/mywife.jpg" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted">January 1, 2023</div>
                                <h2 class="card-title h4">Post Title</h2>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.</p>
                                <a class="btn btn-primary" href="#!">Read more →</a>
                            </div>
                        </div>
                    </div> -->
                    <!-- Pagination-->
                    <!-- <nav aria-label="Pagination">
                        <hr class="my-0" />
                        <ul class="pagination justify-content-center my-4">
                            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                            <li class="page-item"><a class="page-link" href="#!">2</a></li>
                            <li class="page-item"><a class="page-link" href="#!">3</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                            <li class="page-item"><a class="page-link" href="#!">15</a></li>
                            <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                        </ul>
                    </nav> -->
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Cari Berita" aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="button">Search</button>
                            </div>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <!-- <div class="card mb-4">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#!">Web Design</a></li>
                                    <li><a href="#!">HTML</a></li>
                                    <li><a href="#!">Freebies</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#!">JavaScript</a></li>
                                    <li><a href="#!">CSS</a></li>
                                    <li><a href="#!">Tutorials</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> -->
                    <!-- Berita Utama widget-->
                    <?php include 'berita_utama.php' ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer-->
    <?php include 'footer.php' ?>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>