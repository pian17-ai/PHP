<?php
session_start();
include '../koneksi.php';
?>

<?php
$title = "";
$deskripsi = "";
$img = "";
$success = "";
$error = "";
$berdiri = "";
$penghargaan = "";
$guru_tu = "";
$industri = "";
$deskripsi_kecil = "";
$logo = "";
$ig = "";
$fb = "";
$yt = "";   

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'edit_hero') {
    $id = $_GET['id'];
    $sql = "SELECT * from tbl_hero where id='$id'";
    $query = mysqli_query($conn, $sql);
    $hero = mysqli_fetch_array($query);
    $title = $hero['hero_title'];
    $deskripsi = $hero['hero_deskripsi'];
    $img = $hero['hero_img'];
}

if ($op == 'edit_desk_photo') {
    $id = $_GET['id'];
    $sql = "SELECT * from tbl_profile where id='$id'";
    $query = mysqli_query($conn, $sql);
    $desk_photo = mysqli_fetch_array($query);
    $berdiri = $desk_photo['profile_berdiri'];
    $penghargaan = $desk_photo['profile_penghargaan'];
    $guru_tu = $desk_photo['profile_guru_tu'];
    $industri = $desk_photo['profile_industri'];
}

if ($op == 'edit_deskripsi') {
    $id = $_GET['id'];
    $sql = "SELECT * from tbl_profile where id='$id'";
    $query = mysqli_query($conn, $sql);
    $desk_kecil = mysqli_fetch_array($query);
    $deskripsi_kecil = $desk_kecil['profile_deskripsi'];
}

if($op == 'edit_logo_sosmed') {
    $id = $_GET['id'];
    $sql = "SELECT * from tbl_profile";
    $query = mysqli_query($conn, $sql);
    $logo_sosmed = mysqli_fetch_array($query);
    $logo = $logo_sosmed['profile_logo'];
    $ig = $logo_sosmed['profile_ig'];
    $fb = $logo_sosmed['profile_fb'];
    $yt = $logo_sosmed['profile_yt'];
}

if (isset($_POST['submit'])) {

    if ($op == 'edit_hero') {
        $title = $_POST['title'];
        $deskripsi = $_POST['deskripsi'];
        $img = $_POST['img'];
        $hero = (empty($title) || empty($deskripsi) || empty($img));
        if (!$hero) {
            $sql = "UPDATE tbl_hero set hero_title='$title', hero_deskripsi='$deskripsi', hero_img='$img' where id='1'";
            $query = mysqli_query($conn, $sql);
            if ($query) {
                $success = "Data Berhasil Diubah";
            } else {
                $error = "Data Gagal Diubah";
            }
        } else {
            $error = "Harap Isi Semua Data";
        }
    }

    if ($op == 'edit_desk_photo') {
        $berdiri = $_POST['berdiri'];
        $penghargaan = $_POST['penghargaan'];
        $guru_tu = $_POST['guru_tu'];
        $industri = $_POST['industri'];
        $desk_photo = (empty($berdiri) || empty($penghargaan) || empty($guru_tu) || empty($industri));
        if (!$desk_photo) {
            $sql = "UPDATE tbl_profile set profile_berdiri='$berdiri', profile_penghargaan='$penghargaan', profile_guru_tu='$guru_tu', profile_industri='$industri' where id='$id'";
            $query = mysqli_query($conn, $sql);
            if ($query) {
                $success = "Data Berhasil Diubah";
            } else {
                $error = "Data Gagal Diubah";
            }
        } else {
            $error = "Harap Isi Semua Data";
        }
    }

    if ($op == 'edit_deskripsi') {
        $id = $_GET['id'];
        $deskripsi_kecil = $_POST['deskripsi_kecil'];
        if (!empty($deskripsi_kecil)) {
            $sql = "UPDATE tbl_profile set profile_deskripsi='$deskripsi_kecil' where id='$id'";
            $query = mysqli_query($conn, $sql);
            if ($query) {
                $success = "Data Berhasil Diubah";
            } else {
                $error = "Data Gagal Diubah";
            }
        } else {
            $error = "Isi Data Dengan Benar";
        }
    }

    if($op == 'edit_logo_sosmed'){
        $id = $_GET['id'];
        $logo = $_POST['logo'];
        $ig = $_POST['ig'];
        $yt = $_POST['yt'];
        $fb = $_POST['fb'];
        $logo_sosmed_check = (empty($logo) || empty($ig) || empty($fb) || empty($yt));
        if(!$logo_sosmed_check) {
            $sql = "UPDATE tbl_profile set profile_logo='$logo', profile_ig='$ig', profile_fb='$fb', profile_yt='$yt' where id='$id'";
            $query = mysqli_query($conn, $sql);
            if($query) {
                $success = "Data Berhasil Diubah";
            } else {
                $error = "Data Gagal Diubah";
            }
        } else {
            $error = "Isi Data Dengan Benar";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMKN 64 | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
        }

        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
        }

        .sidebar a {
            color: white;
        }

        .sidebar a:hover {
            background-color: #495057;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <?php include 'side_bar.php' ?>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <h2>Home</h2>

                <!-- TABLE EDIT -->
                <!-- HERO SECTION -->
                <?php if ($op == 'edit_hero') { ?>
                    <h4>Hero Section</h4>
                    <div class="max-auto mb-4">
                        <div class="card">
                            <div class="card-header">
                                Edit Hero Section
                            </div>
                            <div class="card-body">
                                <form action="" method="POST">
                                    <?php if ($success) { ?>
                                        <div class="alert alert-success"><?= $success ?></div>
                                    <?php
                                        header("Refresh:5;url='home.php'");
                                    } ?>
                                    <?php if ($error) { ?>
                                        <div class="alert alert-danger"><?= $error ?></div>
                                    <?php
                                        header("Refresh:5;url='home.php'");
                                    } ?>
                                    <div class="mb-3 row">
                                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="title" id="title" value="<?= $title ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="<?= $deskripsi ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="logo" class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="img" id="img" value="<?= $img ?>">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <input type="submit" name="submit" value="Simpan Data" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <!-- DESKRIPSI FOTO -->
                <?php if ($op == 'edit_desk_photo') { ?>
                    <h4>Deskripsi Logo</h4>
                    <div class="max-auto mb-4">
                        <div class="card">
                            <div class="card-header">
                                Edit Deskripsi Logo
                            </div>
                            <div class="card-body">
                                <form action="" method="POST">
                                    <?php if ($success) { ?>
                                        <div class="alert alert-success"><?= $success ?></div>
                                    <?php
                                        header("Refresh:5;url='home.php'");
                                    } ?>
                                    <?php if ($error) { ?>
                                        <div class="alert alert-danger"><?= $error ?></div>
                                    <?php
                                        header("Refresh:5;url='home.php'");
                                    } ?>
                                    <div class="mb-3 row">
                                        <label for="berdiri" class="col-sm-2 col-form-label">Berdiri Sejak</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="berdiri" id="berdiri" value="<?= $berdiri ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="penghargaan" class="col-sm-2 col-form-label">Penghargaan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="penghargaan" id="penghargaan" value="<?= $penghargaan ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="guru_tu" class="col-sm-2 col-form-label">Guru & TU</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="guru_tu" id="guru_tu" value="<?= $guru_tu ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="industri" class="col-sm-2 col-form-label">Kerja Sama Industri</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="industri" id="industri" value="<?= $industri ?>">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <input type="submit" name="submit" value="Simpan Data" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <!-- DESKRIPSI -->
                <?php if ($op == 'edit_deskripsi') { ?>
                    <h4>Deskripsi</h4>
                    <div class="max-auto mb-4">
                        <div class="card">
                            <div class="card-header">
                                Edit Deskripsi
                            </div>
                            <div class="card-body">
                                <?php if ($success) { ?>
                                    <div class="alert alert-success"><?= $success ?></div>
                                <?php
                                    header("Refresh:5;url=home.php");
                                } ?>
                                <?php if ($error) { ?>
                                    <div class="alert alert-success"><?= $error ?></div>
                                <?php
                                    header("Refresh:5;url=home.php");
                                } ?>
                                <form action="" method="POST">
                                    <div class="mb-3 row">
                                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="deskripsi_kecil" id="deskripsi_kecil" value="<?= $deskripsi_kecil ?>">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <input type="submit" name="submit" value="Simpan Data" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <!-- DESKRIPSI LOGO SOSMED -->
                <?php if ($op == 'edit_logo_sosmed') { ?>
                    <h4>Logo & Sosial Media</h4>
                    <div class="max-auto mb-4">
                        <div class="card">
                            <div class="card-header">
                                Edit Logo & Sosmed
                            </div>
                            <div class="card-body">
                                <form action="" method="POST">
                                    <?php if ($success) { ?>
                                        <div class="alert alert-success"><?= $success ?></div>
                                    <?php
                                        header("Refresh:5;url='home.php'");
                                    } ?>
                                    <?php if ($error) { ?>
                                        <div class="alert alert-danger"><?= $error ?></div>
                                    <?php
                                        header("Refresh:5;url='home.php'");
                                    } ?>
                                    <div class="mb-3 row">
                                        <label for="logo" class="col-sm-2 col-form-label">Logo</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="logo" id="logo" value="<?= $logo ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="ig" class="col-sm-2 col-form-label">Instagram</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="ig" id="ig" value="<?= $ig ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="fb" class="col-sm-2 col-form-label">Facebook</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="fb" id="fb" value="<?= $fb ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="yt" class="col-sm-2 col-form-label">Youtube</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="yt" id="yt" value="<?= $yt ?>">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <input type="submit" name="submit" value="Simpan Data" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <!-- TABLE -->
                <!-- HERO -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Image</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <?php
                    $sql = "SELECT * from tbl_hero";
                    $query = mysqli_query($conn, $sql);
                    while ($hero = mysqli_fetch_array($query)) {
                    ?>
                        <tbody>
                            <tr>
                                <td><?= $hero['hero_title'] ?></td>
                                <td><?= $hero['hero_deskripsi'] ?></td>
                                <td>
                                    <img class="img rounded img-fluid" src="../<?= $hero['hero_img'] ?>" alt="">
                                </td>
                                <td>
                                    <a href="home.php?op=edit_hero&id=<?= $hero['id'] ?>">
                                        <div class="btn btn-warning">Edit</div>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    <?php
                    }
                    ?>
                </table>

                <!-- DESK PHOTO -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Berdiri Sejak</th>
                            <th scope="col">Penghargaan</th>
                            <th scope="col">Guru & TU</th>
                            <th scope="col">Kerja Sama Industri</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <?php
                    $sql = "SELECT * from tbl_profile";
                    $query = mysqli_query($conn, $sql);
                    while ($hero = mysqli_fetch_array($query)) {
                    ?>
                        <tbody>
                            <tr>
                                <td><?= $hero['profile_berdiri'] ?></td>
                                <td><?= $hero['profile_penghargaan'] ?></td>
                                <td><?= $hero['profile_guru_tu'] ?></td>
                                <td><?= $hero['profile_industri'] ?></td>
                                <td>
                                    <a href="home.php?op=edit_desk_photo&id=<?= $hero['id'] ?>">
                                        <div class="btn btn-warning">Edit</div>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    <?php
                    }
                    ?>
                </table>

                <!-- DESKRIPSI -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <?php
                    $sql = "SELECT * from tbl_profile";
                    $query = mysqli_query($conn, $sql);
                    $profile = mysqli_fetch_array($query);
                    ?>
                    <tbody>
                        <tr>
                            <td><?= $profile['profile_deskripsi'] ?></td>
                            <td><a href="home.php?op=edit_deskripsi&id=<?= $profile['id'] ?>">
                                    <div class="btn btn-warning">Edit</div>
                                </a></td>
                        </tr>
                    </tbody>
                </table>

                <!-- LOGO & SOSMED -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Logo</th>
                            <th scope="col">Instagram</th>
                            <th scope="col">Facebook</th>
                            <th scope="col">Youtube</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <?php
                    $sql = "SELECT * from tbl_profile";
                    $query = mysqli_query($conn, $sql);
                    $profile = mysqli_fetch_array($query);
                    ?>
                    <tbody>
                        <tr>
                            <!-- <td><?= $profile['profile_logo'] ?></td> -->
                            <td><img src="../<?= $profile['profile_logo'] ?>" height="80px" alt=""></td>
                            <td><?= $profile['profile_ig'] ?></td>
                            <td><?= $profile['profile_fb'] ?></td>
                            <td><?= $profile['profile_yt'] ?></td>
                            <td><a href="home.php?op=edit_logo_sosmed&id=<?= $profile['id'] ?>">
                                    <div class="btn btn-warning">Edit</div>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>