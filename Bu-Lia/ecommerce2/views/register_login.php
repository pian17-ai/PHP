<?php

session_start();

include '../config/php.ini';
include '../config/connection.php';
require_once '../models/User.php';

$db = new Database();
$user = new User($db);
$error = "";
$login_register = "active";

$name = $email = $password = $phone = $address = "";


if (isset($_POST['save'])) {
    $data = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
        'phone' => $_POST['phone'],
        'address' => $_POST['address']
    ];

    if ($user->insert($data)) {
        header("Location: index.php");
    }
    
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $data = $user->getUser($email);

    if ($data && password_verify($password, $data['password'])) {
        $_SESSION['user_id'] = $data['id_user'];
        $_SESSION['user_name'] = $data['name'];
        header("Location: index.php");
        exit;
    } else {
        $error = "<div class='alert alert-danger'>Email atau Password salah</div>";
    }
}

?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login & Register — TokoKita</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: #f8f9fa;
        }

        /* .card { width: 100%; max-width: 400px; } */
    </style>
</head>

<body>

    <?php include 'components/navbar.php'; ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Nav Tabs -->
                <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="login-tab" data-bs-toggle="pill" data-bs-target="#login" type="button" role="tab">Login</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="register-tab" data-bs-toggle="pill" data-bs-target="#register" type="button" role="tab">Register</button>
                    </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="login" role="tabpanel">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Login ke TokoKita</h5>
                                <?= 
                                    $error;
                                ?>
                                <form method="post">
                                    <div class="mb-3">
                                        <label for="loginEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="loginEmail" name="email" value="<?= $email ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="loginPassword" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="loginPassword" name="password" value="<?= $password ?>" required>
                                    </div>
                                    <button name="login" type="submit" class="btn btn-primary w-100">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="register" role="tabpanel">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Buat Akun Baru</h5>
                                <form method="post">
                                    <div class="mb-3">
                                        <label for="registerName" class="form-label">Name</label>
                                        <input value="<?= $name ?>" type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="registerEmail" class="form-label">Email</label>
                                        <input value="<?= $email ?>" type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input value="<?= $password ?>" type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="registerName" class="form-label">Phone</label>
                                        <input value="<?= $phone ?>" type="text" class="form-control" id="phone" name="phone" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="registerName" class="form-label">Address</label>
                                        <input value="<?= $address ?>" type="text" class="form-control" id="address" name="address" required>
                                    </div>
                                    <button name="save" type="submit" class="btn btn-success w-100">Register</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>