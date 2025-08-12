<?php
include 'koneksi.php';

$sql = "SELECT * from tbl_berita where utama_biasa='utama'";
$query = mysqli_query($conn, $sql);
while ($utama = mysqli_fetch_array($query)) {
?>

    <div class="card mb-4">
        <img src="<?= $utama['berita_img'] ?>" class="card-img-top" alt="">
        <div class="card-header">Berita Utama</div>
        <div class="card-body"><?= $utama['berita_title'] ?></div>
        <!-- <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div> -->
    </div>

<?php } ?>