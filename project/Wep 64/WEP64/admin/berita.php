<?php
session_start();
include "../koneksi.php";
?>

<?php
$title = "";
$deskripsi = "";
$img = "";
$ub = "";
$success = "";
$error = "";

if (isset($_GET['op'])) {
  $op = $_GET['op'];
} else {
  $op = "";
}

if ($op == 'delete') {
  $id = $_GET['id'];
  $sql = "DELETE from tbl_berita where id='$id'";
  $query = mysqli_query($conn, $sql);
  if ($query) {
    $success = "Data Berhasil Dihapus";
  } else {
    $error = "Data Gagal Dihapus";
  }
}

if ($op == 'edit') {
  $id = $_GET['id'];
  $sql = "SELECT * from tbl_berita where id='$id'";
  $query = mysqli_query($conn, $sql);
  $edit = mysqli_fetch_array($query);
  $title = $edit['berita_title'];
  $deskripsi = $edit['berita_deskripsi'];
  $img = $edit['berita_img'];
  $ub = $edit['utama_biasa'];
  if (!$edit) {
    $error = "Data Tidak Ditemukan";
  }
}

if (isset($_POST['simpan'])) {
  $title = $_POST['title'];
  $deskripsi = $_POST['deskripsi'];
  $img = $_POST['image'];
  $ub = $_POST['ub'];

  if ($ub == "Pilih Jenis Berita") {
    $error = "Silahkan Pilih Jenis Berita Dengan Benar";
  } else {
    if ($op == 'edit') {
      if (empty($title) || empty($deskripsi) || empty($img)) {
        $error = "Data Harus Diisi Semua";
      } else {
        $sql = "UPDATE tbl_berita set berita_title='$title', berita_deskripsi='$deskripsi', berita_img='$img', utama_biasa='$ub' where id='$id'";
        $query = mysqli_query($conn, $sql);
        if ($query) {
          $success = "Data Berhasil Diubah";
        } else {
          $error = "Data Gagal Diubah";
        }
      }
    } else {
      if ($title && $deskripsi && $img) {
        $sql = "INSERT into tbl_berita (berita_title, berita_deskripsi, berita_img, utama_biasa) values ('$title', '$deskripsi', '$img', '$ub')";
        $query = mysqli_query($conn, $sql);
        if ($sql && $query) {
          $success = "Berhasil Menambahkan Data";
        } else {
          $error = "Gagal Menambahkan Data";
        }
      } else {
        $error = "Masukkan Semua Data Dengan Benar";
      }
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
        <h2>Berita</h2>

        <div class="max-auto mb-4">
          <div class="card">
            <div class="card-header">
              Create or Edit Berita
            </div>
            <div class="card-body">
              <?php
              if ($error) { ?>
                <div class="alert alert-danger">
                  <?= $error ?>
                </div>
              <?php
                header('Refresh:5;url=berita.php');
              }
              ?>
              <?php
              if ($success) { ?>
                <div class="alert alert-success">
                  <?= $success ?>
                </div>
              <?php
                header('Refresh:5;url=berita.php');
              }
              ?>
              <form action="" method="POST">
                <div class="mb-3 row">
                  <label for="title" class="col-sm-2 col-form-label">Berita Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" id="title" value="<?= $title ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="deskripsi" class="col-sm-2 col-form-label">Berita Deskripsi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="<?= $deskripsi ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="logo" class="col-sm-2 col-form-label">Berita Image</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="image" id="image" value="<?= $img ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="logo" class="col-sm-2 col-form-label">Berita Utama / Biasa</label>
                  <div class="col-sm-10">
                    <!-- <input type="text" class="form-control" name="ub" id="ub" value="<?= $ub ?>"> -->
                    <select class="form-select" name="ub" id="ub" aria-label="Default select example">
                      <option selected>Pilih Jenis Berita</option>
                      <option value="utama" <?= ($ub == "utama" ? 'selected' : '') ?>>utama</option>
                      <option value="biasa" <?= ($ub == 'biasa' ? 'selected' : '') ?>>biasa</option>
                    </select>
                  </div>
                </div>
                <div class="col-12">
                  <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary">
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
              <th scope="col">Utama / Biasa</th>
              <th scope="col">Created</th>
              <th scope="col">Edited</th>
              <th scope="col">Edit or Delete</th>
            </tr>
          </thead>
          <?php
          $sql = "SELECT * from tbl_berita";
          $query = mysqli_query($conn, $sql);
          while ($berita = mysqli_fetch_array($query)) {
          ?>
            <tbody>
              <tr>
                <th scope="row"><?= $berita['id'] ?></th>
                <td><?= $berita['berita_title'] ?></td>
                <td><?= $berita['berita_deskripsi'] ?></td>
                <td>
                  <img class="img rounded" src="../<?= $berita['berita_img'] ?>" alt="">
                </td>
                <td><?= $berita['utama_biasa'] ?></td>
                <td><?= $berita['created_at'] ?></td>
                <td><?= $berita['updated_at'] ?></td>
                <td>
                  <a href="berita.php?op=edit&id=<?= $berita['id'] ?>">
                    <div class="btn btn-warning mb-2">Edit</div>
                  </a>
                  <a href="berita.php?op=delete&id=<?= $berita['id'] ?>" onclick="return confirm('Yakin Mau Hapus Data?')">
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