<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">TokoKita</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="/PHP/Bu-Lia/ecommerce2/views/index.php"">Home</a></li>
                <!-- <li class=" nav-item"><a class="nav-link" href="#">Kategori</a></li> -->
                <?php
                if (!isset($_SESSION['user_id'])) {
                ?>
                    <li class="nav-item"><a class="nav-link" href="/PHP/Bu-Lia/ecommerce2/views/register_login.php">Login / Register</a></li>
                <?php } else { ?>
                    <li class="nav-item"><a class="nav-link" href="/PHP/Bu-Lia/ecommerce2/views/register_login.php"><?= $_SESSION['user_name'] ?></a></li>
                <?php }  ?>
                <li class="nav-item">
                    <a class="btn btn-outline-light ms-2" href="#" data-bs-toggle="modal" data-bs-target="#cartModal">Keranjang (0)</a>
                </li>
            </ul>
        </div>
    </div>
</nav>