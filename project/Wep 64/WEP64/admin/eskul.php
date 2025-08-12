<?php
session_start();
include '../koneksi.php';
?>

<?php
$title = "";
$deskripsi = "";
$logo = "";
$success = "";
$error = "";

if (isset($_GET['op'])) {
  $op = $_GET['op'];
} else {
  $op = "";
}

if ($op == 'delete') {
  $id = $_GET['id'];
  $sql = "DELETE from tbl_eskul where id='$id'";
  $query = mysqli_query($conn, $sql);
  if ($query) {
    $success = "Data Berhasil Dihapus";
  } else {
    $error = "Data Gagal Dihapus";
  }
}

if ($op == 'edit') {
  $id = $_GET['id'];
  $sql = "SELECT * from tbl_eskul where id='$id'";
  $query = mysqli_query($conn, $sql);
  $edit = mysqli_fetch_array($query);
  $title = $edit['eskul_title'];
  $deskripsi = $edit['eskul_deskripsi'];
  $logo = $edit['eskul_img'];
}

if (isset($_POST['submit'])) {
  $title = $_POST['title'];
  $deskripsi = $_POST['deskripsi'];
  $logo = $_POST['logo'];

  if ($op == 'edit') {
    $sql = "UPDATE tbl_eskul set eskul_title='$title', eskul_deskripsi='$deskripsi', eskul_img='$logo' where id='$id'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
      $success = "Data Berhasil Diubah";
    } else {
      $error = "Data Gagal Diubah";
    }
  } else {
    if ($title && $deskripsi && $logo) {
      $sql = "INSERT into tbl_eskul (eskul_title, eskul_deskripsi, eskul_img) values ('$title', '$deskripsi', '$logo')";
      $query = mysqli_query($conn, $sql);

      if ($query) {
        $success = "Berhasil Menambahkan Data";
      } else {
        $error = "Gagal Menambahkan Data";
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

    .text {
      display: flex;
      text-align: center;
      justify-content: center;
      height: 100vh;
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
        <h2>Ekstrakurikuler</h2>

        <div class="max-auto mb-4 rounded">
          <div class="card">
            <div class="card-header">
              Create or Edit Ekstrakurikuler
            </div>
            <div class="card-body">
              <form action="" method="POST">
                <?php if ($success) { ?>
                  <div class="alert alert-success">
                    <?= $success ?>
                  </div>
                <?php
                  header('Refresh:5;url=eskul.php');
                } ?>
                <?php if ($error) { ?>
                  <div class="alert alert-danger">
                    <?= $error ?>
                  </div>
                <?php
                  header('Refresh:5;url=eskul.php');
                } ?>
                <div class="mb-3 row">
                  <label for="title" class="col-sm-2 col-form-label">Eskul Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" id="title" value="<?= $title ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="deskripsi" class="col-sm-2 col-form-label">Eskul Deskripsi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="<?= $deskripsi ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="logo" class="col-sm-2 col-form-label">Eskul Logo</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="logo" id="logo" value="<?= $logo ?>">
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
              <th scope="col">Title</th>
              <th scope="col">Deskripsi</th>
              <th scope="col">Image</th>
              <th scope="col">Edit or Delete</th>
            </tr>
          </thead>
          <?php
          $sql = "SELECT * from tbl_eskul";
          $query = mysqli_query($conn, $sql);
          while ($eskul = mysqli_fetch_array($query)) {
          ?>
            <tbody>
              <tr>
                <th scope="row"><?= $eskul['id'] ?></th>
                <td><?= $eskul['eskul_title'] ?></td>
                <td><?= $eskul['eskul_deskripsi'] ?></td>
                <td>
                  <img class="img rounded" src="../<?= $eskul['eskul_img'] ?>" alt="">
                </td>
                <td>
                  <a href="eskul.php?op=edit&id=<?= $eskul['id'] ?>">
                    <div class="btn btn-warning mb-2">Edit</div>
                  </a>
                  <a href="eskul.php?op=delete&id=<?= $eskul['id'] ?>" onclick="return confirm('Yakin Untuk Menghapus Data?')">
                    <div class="btn btn-danger">Delete</div>
                  </a>
                </td>
              </tr>
            </tbody>
          <?php
          }
          ?>
        </table>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>