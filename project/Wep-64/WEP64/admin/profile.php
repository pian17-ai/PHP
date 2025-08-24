<?php
session_start();
include '../koneksi.php';

$visi = "";
$misi = "";
$alamat = "";
$email = "";
$npsn = "";
$nama_pengawas = "";
$nip_pengawas = "";
$nama_kepala_sekolah = "";
$nip_kepala_sekolah = "";
$identitas = "";
$success = "";
$error = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'edit_vm') {
    $id = $_GET['id'];
    $sql = "SELECT * from tbl_profile where id='$id'";
    $q = mysqli_query($conn, $sql);
    $vm = mysqli_fetch_array($q);
    $visi = $vm['profile_visi'];
    $misi = $vm['profile_misi'];
}

if ($op == 'edit_profile') {
    $id = $_GET['id'];
    $sql = "SELECT * from tbl_profile where id='$id'";
    $q = mysqli_query($conn, $sql);
    $p = mysqli_fetch_array($q);
    $alamat = $p['profile_alamat'];
    $email = $p['profile_email'];
    $npsn = $p['profile_npsn'];
    $nama_pengawas = $p['profile_pengawas'];
    $nip_pengawas = $p['profile_pengawas_nip'];
    $nama_kepala_sekolah = $p['profile_kepse'];
    $nip_kepala_sekolah = $p['profile_kepse_nip'];
}

if ($op == 'edit_identitas') {
    $id = $_GET['id'];
    $sql = "SELECT * from tbl_profile";
    $q = mysqli_query($conn, $sql);
    $iden = mysqli_fetch_array($q);
    $identitas = $iden['profile_identitas'];
}

if (isset($_POST['submit'])) {

    if ($op == 'edit_vm') {
        $id = $_GET['id'];
        $visi = $_POST['visi'];
        $misi = $_POST['misi'];
        if (!empty($visi) && !empty($misi)) {
            $sql = "UPDATE tbl_profile set profile_visi='$visi', profile_misi='$misi' where id='$id'";
            $q = mysqli_query($conn, $sql);
            if ($q) {
                $success = "Data Berhasil Diubah";
            } else {
                $error = "Data Gagal Diubah";
            }
        }
    }

    if ($op == 'edit_profile') {
        $id = $_GET['id'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $npsn = $_POST['npsn'];
        $nama_pengawas = $_POST['nama_pengawas'];
        $nip_pengawas = $_POST['nip_pengawas'];
        $nama_kepala_sekolah = $_POST['nama_kepala_sekolah'];
        $nip_kepala_sekolah = $_POST['nip_kepala_sekolah'];
        $sql = "UPDATE tbl_profile set profile_alamat='$alamat', profile_email='$email', profile_npsn='$npsn', profile_pengawas='$nama_pengawas', profile_pengawas_nip='$nip_pengawas', profile_kepse='$nama_kepala_sekolah', profile_kepse_nip='$nip_kepala_sekolah' where id='$id'";
        $q = mysqli_query($conn, $sql);
        if ($q) {
            $success = "Data Berhasil Diubah";
        } else {
            $error = "Data Gagal Diubah";
        }
    }

    if ($op == 'edit_identitas') {
        $id = $_GET['id'];
        $identitas = $_POST['identitas'];
        $sql = "UPDATE tbl_profile set profile_identitas='$identitas' where id='$id'";
        $q = mysqli_query($conn, $sql);
        if ($q) {
            $success = "Data Berhasil Diubah";
        } else {
            $error = "Data Gagal Diubah";
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

        .card {
            margin-top: 10px;
        }

        .border {
            margin: 5px;
        }

        .img {
            width: 108px;
            height: auto;
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
                <h2>Profile</h2>

                <div class="max-auto mb-4">
                    <?php if ($op == 'edit_vm') { ?>
                        <div class="card">
                            <div class="card-header">
                                Create or Edit Visi Misi
                            </div>
                            <div class="card-body">
                                <?php if ($success) { ?>
                                    <div class="alert alert-success"><?= $success ?></div>
                                <?php
                                    header("Refresh:5;url=profile.php");
                                } ?>
                                <form action="" method="POST">
                                    <div class="mb-3 row">
                                        <label for="visi" class="col-sm-2 col-form-label">Visi</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="visi" id="visi" value="<?= $visi ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="misi" class="col-sm-2 col-form-label">Misi</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="misi" id="misi" value="<?= $misi ?>">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <input type="submit" name="submit" value="Simpan Data" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ($op == 'edit_profile') { ?>
                        <div class="card">
                            <div class="card-header">
                                Create or Edit Profile
                            </div>
                            <div class="card-body">
                                <?php if ($success) { ?>
                                    <div class="alert alert-success"><?= $success ?></div>
                                <?php
                                    header("Refresh:5;url=profile.php");
                                } ?>
                                <form action="" method="POST">
                                    <div class="mb-3 row">
                                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $alamat ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="email" id="email" value="<?= $email ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="npsn" class="col-sm-2 col-form-label">NPSN</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="npsn" id="npsn" value="<?= $npsn ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="nama_pengawas" class="col-sm-2 col-form-label">Nama Pengawas</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nama_pengawas" id="nama_pengawas" value="<?= $nama_pengawas ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="nip_pengawas" class="col-sm-2 col-form-label">NIP Pengawas</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nip_pengawas" id="nip_pengawas" value="<?= $nip_pengawas ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="nama_kepala_sekolah" class="col-sm-2 col-form-label">Nama Kepala Sekolah</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nama_kepala_sekolah" id="nama_kepala_sekolah" value="<?= $nama_kepala_sekolah ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="nip_kepala_sekolah" class="col-sm-2 col-form-label">NIP Kepala Sekolah</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nip_kepala_sekolah" id="nip_kepala_sekolah" value="<?= $nip_kepala_sekolah ?>">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <input type="submit" name="submit" value="Simpan Data" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ($op == 'edit_identitas') { ?>
                        <div class="card">
                            <div class="card-header">
                                Create or Edit Identitas
                            </div>
                            <div class="card-body">
                                <?php if ($success) { ?>
                                    <div class="alert alert-success"><?= $success ?></div>
                                <?php
                                    header("Refresh:5;url=profile.php");
                                } ?>
                                <form action="" method="POST">
                                    <div class="mb-3 row">
                                        <label for="identitas" class="col-sm-2 col-form-label">Identitas</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="identitas" id="identitas" value="<?= $identitas ?>">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <input type="submit" name="submit" value="Simpan Data" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <!-- DATA -->

                <!-- TABLE VISI MISI -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Visi</th>
                            <th scope="col">Misi</th>
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
                            <td><?= $profile['profile_visi'] ?></td>
                            <td><?= $profile['profile_misi'] ?></td>
                            <td><a href="profile.php?op=edit_vm&id=<?= $profile['id'] ?>">
                                    <div class="btn btn-warning">Edit</div>
                                </a></td>
                        </tr>
                    </tbody>
                </table>

                <!-- TABLE PROFILE -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Alamat</th>
                            <th scope="col">Email</th>
                            <th scope="col">NPSN</th>
                            <th scope="col">Nama Pengawas</th>
                            <th scope="col">NIP Pengawas</th>
                            <th scope="col">Nama Kepala Sekolah</th>
                            <th scope="col">NIP Kepala Sekolah</th>
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
                            <td><?= $profile['profile_alamat'] ?></td>
                            <td><?= $profile['profile_email'] ?></td>
                            <td><?= $profile['profile_npsn'] ?></td>
                            <td><?= $profile['profile_pengawas'] ?></td>
                            <td><?= $profile['profile_pengawas_nip'] ?></td>
                            <td><?= $profile['profile_kepse'] ?></td>
                            <td><?= $profile['profile_kepse_nip'] ?></td>
                            <td><a href="profile.php?op=edit_profile&id=<?= $profile['id'] ?>">
                                    <div class="btn btn-warning">Edit</div>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- TABLE IDENTITAS -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Identitas</th>
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
                            <td><?= $profile['profile_identitas'] ?></td>
                            <td><a href="profile.php?op=edit_identitas&id=<?= $profile['id'] ?>">
                                    <div class="btn btn-warning">Edit</div>
                                </a></td>
                        </tr>
                    </tbody>
                </table>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>