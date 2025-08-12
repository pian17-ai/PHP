<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "tes";
$conn = new mysqli($host, $user, $password, $database);

$sql = "SELECT * from tbl_mhs";
$query = mysqli_query($conn, $sql);
$mhs = mysqli_fetch_array($query);
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
                <img src="../img/UI/UI_bg.png" width="30" height="auto" alt="">
                Universitas Indonesia
            </a>
        </div>
    </nav>

    <!-- SEARCH -->
    <!-- <div class="input-group">
        <span class="input-group-text" id="visible-addon">@</span>
        <input type="text" class="form-control m-4">

    </div> -->
    <!-- <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Recipient’s username" aria-label="Recipient’s username" aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
    </div> -->

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
            <tr>
                <th scope="row">1</th>
                <td>Alvian Cahyo Pambudi</td>
                <td>102931201</td>
                <td>Teknik Informatika</td>
                <td>4.0</td>
            </tr>
        </tbody>
    </table>
</body>

</html>