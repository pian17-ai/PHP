<?php
session_start();
include '../koneksi.php'
?>

<?php
$name = "";
$deskripsi = "";
$jenkel = "";
$gtk = "";
$tmpt_lahir = "";
$img = "";
$success = "";
$error = "";


if (isset($_GET['op'])) {
  $op = $_GET['op'];
} else {
  $op = "";
}

if ($op == 'delete') {
  $id = $_GET['id'];
  $sql = "DELETE from tbl_guru_tu where id='$id'";
  $query = mysqli_query($conn, $sql);
  if ($query) {
    $success = "Data Berhasil Dihapus";
  } else {
    $error = "Data Gagal Dihapus";
  }
}

if ($op == 'edit') {
  $id = $_GET['id'];
  $sql = "SELECT * from tbl_guru_tu where id='$id'";
  $query = mysqli_query($conn, $sql);
  $edit = mysqli_fetch_array($query);
  $name = $edit['guru_tu_name'];
  $deskripsi = $edit['guru_tu_deskripsi'];
  $jenkel = $edit['guru_tu_jenkel'];
  $gtk = $edit['guru_tu_gtk'];
  $tmpt_lahir = $edit['guru_tu_tmpt_lahir'];
  $img = $edit['guru_tu_img'];

  if (!$edit) {
    $error = "Data Tidak Ditemukan";
  }
}

if (isset($_POST['submit'])) { //CREATE
  $name = $_POST['name'];
  $deskripsi = $_POST['deskripsi'];
  $jenkel = $_POST['jenkel'];
  $gtk = $_POST['gtk'];
  $tmpt_lahir = $_POST['lahir'];
  $img = $_POST['image'];

  if ($jenkel == "Pilih Jenis Kelamin") {
    $error = "Mohon Masukkan Jenis Kelamin Dengan Benar";
  } else {
    if ($name && $deskripsi && $jenkel && $gtk && $tmpt_lahir && $img) {
      if ($op == 'edit') { // EDIT
        $sql = "UPDATE tbl_guru_tu SET guru_tu_name = '$name', guru_tu_deskripsi = '$deskripsi', guru_tu_jenkel = '$jenkel', guru_tu_gtk = '$gtk', guru_tu_tmpt_lahir = '$tmpt_lahir', guru_tu_img = '$img' where id = '$id'";
        $query = mysqli_query($conn, $sql);
        if ($query) {
          $success = "Data Berhasil Diubah";
        } else {
          $error = "Data Gagal Diubah";
        }
      } else {
        $checkImg = mysqli_query($conn, "SELECT * from tbl_guru_tu where guru_tu_name = '$name'");
        if (mysqli_num_rows($checkImg) > 0) {
          $error = "Data Sudah Ada";
        } else {
          $sql = "INSERT into tbl_guru_tu (guru_tu_name, guru_tu_deskripsi, guru_tu_jenkel, guru_tu_gtk, guru_tu_tmpt_lahir, guru_tu_img) values ('$name', '$deskripsi', '$jenkel', '$gtk', '$tmpt_lahir', '$img')";
          $query = mysqli_query($conn, $sql);

          if ($query) {
            $success = "Berhasil Menambahkan Data";
          } else {
            $error = "Gagal Menambahkan Data";
          }
        }
      }
    } else {
      $error = "Masukkan Data Dengan Benar";
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
        <h2>Guru / TU</h2>

        <div class="max-auto mb-4">
          <div class="card">
            <div class="card-header">
              Create or Edit Guru / TU
            </div>
            <div class="card-body">
              <?php if ($success) {
              ?>
                <div class="alert alert-success">
                  <?= $success ?>
                </div>
              <?php
                header("Refresh:5;url=guru_tu.php");
              }
              ?>
              <?php if ($error) {
              ?>
                <div class="alert alert-danger">
                  <?= $error ?>
                </div>
              <?php
                header("Refresh:5;url=guru_tu.php");
              }
              ?>
              <form action="" method="POST">
                <div class="mb-3 row">
                  <label for="title" class="col-sm-2 col-form-label">Guru/TU Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" value="<?= $name ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="deskripsi" class="col-sm-2 col-form-label">Guru/TU Deskripsi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="<?= $deskripsi ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="deskripsi" class="col-sm-2 col-form-label">Guru/TU Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <!-- <input type="text" class="form-control" name="jenkel" id="jenkel" value=""> -->
                    <select class="form-select" name="jenkel" id="jenkel" aria-label="Default select example">
                      <option selected>Pilih Jenis Kelamin</option>
                      <option value="Laki - Laki" <?= ($jenkel == "Laki - Laki" ? 'selected' : '') ?>>Laki - Laki</option>
                      <option value="Perempuan" <?= ($jenkel == 'Perempuan' ? 'selected' : '') ?>>Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="deskripsi" class="col-sm-2 col-form-label">Guru/TU GTK</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="gtk" id="gtk" value="<?= $gtk ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="deskripsi" class="col-sm-2 col-form-label">Guru/TU Tempat Lahir</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="lahir" id="lahir" value="<?= $tmpt_lahir ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="logo" class="col-sm-2 col-form-label">Guru/TU Image</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="image" id="image" value="<?= $img ?>">
                  </div>
                </div>
                <div class="col-12">
                  <input type="submit" name="submit" value="Simpan Data" class="btn btn-primary">
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- DATA -->

        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Name</th>
              <th scope="col">Deskripsi</th>
              <th scope="col">Jenis Kelamin</th>
              <th scope="col">GTK</th>
              <th scope="col">Tempat Lahir</th>
              <th scope="col">Image</th>
              <th scope="col">Edit or Delete</th>
            </tr>
          </thead>
          <?php
          $sql = "SELECT * from tbl_guru_tu";
          $query = mysqli_query($conn, $sql);
          while ($guru_tu = mysqli_fetch_array($query)) {
          ?>
            <tbody>
              <tr>
                <th scope="row"><?= $guru_tu['id'] ?></th>
                <td><?= $guru_tu['guru_tu_name'] ?></td>
                <td><?= $guru_tu['guru_tu_deskripsi'] ?></td>
                <td><?= $guru_tu['guru_tu_jenkel'] ?></td>
                <td><?= $guru_tu['guru_tu_gtk'] ?></td>
                <td><?= $guru_tu['guru_tu_tmpt_lahir'] ?></td>
                <td>
                  <img class="img rounded" src="../<?= $guru_tu['guru_tu_img'] ?>" alt="">
                </td>
                <td scope="row">
                  <a href="guru_tu.php?op=edit&id=<?= $guru_tu['id'] ?>">
                    <div class="btn btn-warning mb-2">Edit</div>
                  </a>
                  <a href="guru_tu.php?op=delete&id=<?= $guru_tu['id'] ?>" onclick="return confirm ('Yakin Mau Delete Data?')">
                    <div class="btn btn-danger">Delete</div>
                  </a>
                </td>
              </tr>
            </tbody>
          <?php } ?>
        </table>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>