<?php
include '../config/php.ini';

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: register_login.php");
    exit;
}

require_once '../models/Orders.php';

$order_active = "active";

$db = new Database();
$orders = new Orders($db);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 72px;
        }

        .card-img-top {
            object-fit: cover;
            height: 180px;
        }
    </style>
</head>

<body>
    <?php include 'components/navbar.php' ?>

    <header class="bg-light py-5">
        <div class="container text-center">
            <!-- <h1 class="display-6">Orderan kamu, <?= $_SESSION['user_name'] ?></h1> -->
            <h1 class="display-6">Orderan kamu, Piann</h1>
        </div>
    </header>

    <main class="container my-4">
        <div class="row g-2" style="justify-content: center;">
            <?php
            $result = $orders->getOrders();
            while (
                $orders = mysqli_fetch_array($result)
            ) {
            ?>

                <div class="card mb-3 mx-2" style="width: 620px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="../<?= $orders['img'] ?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $orders['name_product'] ?></h5>
                                <p class="card-text text-bold"><b>Description : </b></p>
                                <p class="card-text"><?= $orders['description'] ?></p>
                                <p class="card-text"><small class="text-body-secondary">Status : <?= $orders['status'] ?></small></p>
                                <p class="btn btn-warning card-text">Price : <?= $orders['price'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>


</body>

</html>