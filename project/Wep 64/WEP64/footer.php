<?php 
    include 'koneksi.php';

    $sql = "SELECT * from tbl_profile";
    $query = mysqli_query($conn, $sql);
    $footer = mysqli_fetch_array($query);
?>
    <!-- FOOTER START -->
    <footer class="bg-dark text-white pt-4">
        <div class="container text-center opacity-50">

            <div class="mb-3 d-flex justify-content-center gap-5">
                <div>
                    <a href="<?= $footer['profile_ig'] ?>" class="text-decoration-none text-white">
                        <i class="bi bi-instagram fs-2"></i><br>
                        <span>Instagram</span>
                    </a>
                </div>
                <div>
                    <a href="<?= $footer['profile_fb'] ?>" class="text-decoration-none text-white">
                        <i class="bi bi-facebook fs-2"></i><br>
                        <span>Facebook</span>
                    </a>
                </div>
                <div>
                    <a href="<?= $footer['profile_yt'] ?>" class="text-decoration-none text-white">
                        <i class="bi bi-youtube fs-2"></i><br>
                        <span>Youtube</span>
                    </a>
                </div>
            </div>

            <hr class="border-secondary">

            <p class="mb-0 pb-3 small">@2025 SMKN 64 JAKARTA</p>

        </div>
    </footer>
    <!-- FOOTER END -->