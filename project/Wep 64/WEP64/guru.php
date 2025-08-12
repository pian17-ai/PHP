<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMKN 64 | Guru</title>
    <link rel="stylesheet" href="/WEP64/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .team-member {
            transition: transform 0.3s ease-in-out;
        }

        .team-member:hover {
            transform: translateY(-10px);
        }

        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background-color: #f8f9fa;
            color: #0d6efd;
            margin: 0 5px;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background-color: #0d6efd;
            color: white;
            transform: translateY(-3px);
        }

        .team-member img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid #f8f9fa;
            transition: transform 0.3s ease;
        }

        .team-member:hover img {
            transform: scale(1.05);
        }

        .section-title::after {
            content: "";
            display: block;
            width: 50px;
            height: 3px;
            background-color: #0d6efd;
            margin: 20px auto;
        }
    </style>
</head>

<body>
    <!-- NAVBAR START -->
    <?php
    include 'navbar.php';
    ?>
    <!-- NAVBAR END -->

    <section class="py-5">
        <div class="container">
            <!-- Section Header -->
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h2 class="section-title">Guru / TU</h2>
                    <p class="text-muted">Ini Merupakan Guru, TU, maupun Staff di SMKN 64 Jakarta</p>
                </div>
            </div>

            <!-- Team Members -->
            <div class="row g-4">
                <?php
                $sql = "SELECT * from tbl_guru_tu";
                $query = mysqli_query($conn, $sql);
                while ($guru = mysqli_fetch_array($query)) {
                ?>
                    <!-- Team Member -->
                    <div class="col-lg-3 col-md-6">
                        <div class="team-member text-center p-4">
                            <img src="<?= $guru['guru_tu_img'] ?>" alt="Team Member 1" class="mb-4 shadow" style="height: 200px; width: auto; ">
                            <h5 class="mb-1"><?= $guru['guru_tu_name'] ?></h5>
                            <p class="text-muted mb-3"></p><?= $guru['guru_tu_gtk'] ?>
                            <p class="small mb-3">Jenis Kelamin : <?= $guru['guru_tu_jenkel'] ?> <br>
                            Tempat Lahir : <?= $guru['guru_tu_tmpt_lahir'] ?>
                        </p>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <?php include 'footer.php' ?>
</body>

</html>