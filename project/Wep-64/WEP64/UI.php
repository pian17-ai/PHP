<?php
    session_start();
    include '../WEP64/UI_con.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar bg-body-tertiary shadow p-3">
        <div class="container-fluid">
            <a class="navbar-brand font-monospace" href="#">
                <!-- <img src="../img/UI/UI_bg.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top"> -->
                <img src="img/UI/UI_bg.png" width="30" height="auto" alt="">
                Universitas Indonesia
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="UI_add.php">Add Mahasiswa</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-4" type="search" placeholder="Search" aria-label="Search" />
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <!-- TABLE -->
    <table class="table m-4">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Nip</th>
                <th scope="col">Faculty</th>
                <th scope="col">GPA</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $sql = "SELECT * from tbl_mhs";
            $query = mysqli_query($conn, $sql);
            while($mhs = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <th scope="row"><?= $mhs['id'] ?></th>
                <td><?= $mhs['name_mhs'] ?></td>
                <td><?= $mhs['nip_mhs'] ?></td>
                <td><?= $mhs['faculty_mhs'] ?></td>
                <td><?= $mhs['gpa_mhs'] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>