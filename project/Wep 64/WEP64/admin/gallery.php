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

if (isset($_GET['op'])) {
  $op = $_GET['op'];
} else {
  $op = "";
}

if($op == 'delete') {
  $id = $_GET['id'];
  $sql = "DELETE from tbl_gallery where id='$id'";
  $query = mysqli_query($conn, $sql);
  if ($query) {
    $success = "Data Berhasil Dihapus";
  } else {
    $error = "Data Gagal Dihapus";
  }
}

if ($op == 'edit') {
  $id = $_GET['id'];
  $sql = "SELECT * from tbl_gallery where id='$id'";
  $query = mysqli_query($conn, $sql);
  $edit = mysqli_fetch_array($query);
  $title = $edit['title'];
  $deskripsi = $edit['deskripsi'];
  $img = $edit['img'];
}

if (isset($_POST['submit'])) {
  $title = $_POST['title'];
  $deskripsi = $_POST['deskripsi'];
  $img = $_POST['img'];

  if ($title && $deskripsi && $img) {

    if ($op == 'edit') {
      $sql = "UPDATE tbl_gallery set title='$title', deskripsi='$deskripsi', img='$img' where id='$id'";
      $query = mysqli_query($conn, $sql);
      if ($query) {
        $success = "Data Berhasil Diubah";
      } else {
        $error = "Data Gagal Diubah";
      }
    } else {
      $sql = "INSERT into tbl_gallery (title, deskripsi, img) values ('$title', '$deskripsi', '$img')";
      $query = mysqli_query($conn, $sql);
      if ($query) {
        $success = "Berhasil Tambah Data";
      } else {
        $error = "Gagal Tambah Data";
      }
    }
  } else {
    $error = "Harap Masukkan Semua Data";
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
        <h2>Gallery</h2>

        <div class="max-auto mb-4">
          <div class="card">
            <div class="card-header">
              Create or Edit Gallery
            </div>
            <div class="card-body">
              <!-- ALERT START -->
              <?php if ($success) {
              ?>
                <div class="alert alert-success"><?= $success ?></div>
              <?php
                header("Refresh:5;url=gallery.php");
              } ?>
              <?php if ($error) {
              ?>
                <div class="alert alert-danger"><?= $error ?></div>
              <?php
                header("Refresh:5;url=gallery.php");
              } ?>
              <!-- ALERT END -->
              <form action="" method="post">
                <div class="mb-3 row">
                  <label for="title" class="col-sm-2 col-form-label">Gallery Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" id="title" value="<?= $title ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="deskripsi" class="col-sm-2 col-form-label">Gallery Deskripsi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="<?= $deskripsi ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="logo" class="col-sm-2 col-form-label">Gallery Image</label>
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

        <!-- DATA -->

        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Title</th>
              <th scope="col">Deskripsi</th>
              <th scope="col">Image</th>
              <th scope="col">created_at</th>
              <th scope="col">updated_at</th>
              <th scope="col">Edit or Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT * from tbl_gallery";
            $query = mysqli_query($conn, $sql);
            while ($gallery = mysqli_fetch_array($query)) {
            ?>
              <tr>
                <th scope="row"><?= $gallery['id'] ?></th>
                <td><?= $gallery['title'] ?></td>
                <td><?= $gallery['deskripsi'] ?></td>
                <td>
                  <img class="img rounded" src="../<?= $gallery['img'] ?>" alt="">
                </td>
                <td><?= $gallery['created_at'] ?></td>
                <td><?= $gallery['updated_at'] ?></td>
                <td>
                  <a href="gallery.php?op=edit&id=<?= $gallery['id'] ?>">
                    <div class="btn btn-warning mb-2">Edit</div>
                  </a>
                  <a href="gallery.php?op=delete&id=<?= $gallery['id'] ?>" onclick="return confirm('Yakin Mau Hapus Data?')">
                    <div class="btn btn-danger">Delete</div>
                  </a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>