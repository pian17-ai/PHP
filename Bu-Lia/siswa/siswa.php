<?php
include '../php.ini';

include '../conn.php';


$nis = "";
$nama = "";
$alamat = "";
$jenkel = "";
$telepon = "";
$kelas = "";

$success = "";
$error = "";


if (isset($_GET['op'])) {
  $op = $_GET['op'];
} else {
  $op = "";
}

if ($op == 'delete') {
  $nis = $_GET['nis'];
  $sql = "DELETE from siswa where NIS=$nis";
  $query = mysqli_query($conn, $sql);
  if ($query) {
    $success = "Data Berhasil Dihapus";
  }
}

if ($op == 'edit') {
  $nis = $_GET['nis'];
  $sql = "SELECT * from siswa where NIS='$nis'";
  $query = mysqli_query($conn, $sql);
  $edited = mysqli_fetch_array($query);

  $nis = $edited['NIS'];
  $nama = $edited['Nama'];
  $alamat = $edited['Alamat'];
  $jenkel = $edited['Jenis_kelamin'];
  $telepon = $edited['Telepon'];
  $kelas = $edited['Kelas'];
}

if (isset($_POST['submit'])) {
  $nis = $_POST['ni'];
  $nama = $_POST['nm'];
  $alamat = $_POST['almt'];
  $jenkel = $_POST['jnkel'];
  $telepon = $_POST['tlp'];
  $kelas = $_POST['kls'];

  if ($jenkel == 'Pilih Jenis Kelamin') {
    $error = "Pilih jenis kelamin dengan benar";
  } else {
    if ($op == 'edit') {
      $sql = "UPDATE siswa set NIS='$nis', Nama='$nama', Alamat='$alamat', Jenis_kelamin='$jenkel', Telepon='$telepon', Kelas='$kelas' where NIS='$nis'";
      $query = mysqli_query($conn, $sql);
      if ($query) {
        $success = "Berhasil Mengganti Data";
      } else {
        $error = "Gagal Mengganti Data";
      }
    } else {
      if ($nis == '' || $jenkel == 'Pilih Jenis Kelamin') {
        $error = "Masukkan data yang benar";
      } else {
        $sql = "INSERT INTO siswa (`NIS`, `Nama`, `Alamat`, `Jenis_kelamin`, `Telepon`, `Kelas`) values ('$nis', '$nama', '$alamat', '$jenkel', '$telepon', '$kelas')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
          $success = "Berhasil Menambahkan Data";
        } else {
          $error = "Error";
        }
      }
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Siswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
  <div class="container-fluid">
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav">
        <li class="nav-item"><a href="" class="btn">Siswa</a></li>
        <li class="nav-item"><a href="" class="btn">Nilai</a></li>
      </ul>
    </div>
  </div>
  </navbar>

  <div class="container p-4">
    <a href="../index.php" class="btn"><h1 class="fs-1">Data Siswa</h1></a>
    <a href="siswa.php?op=tambah" class="btn btn-primary">Tambah Data</a>
    <hr>


    <?php if ($success) { ?>
      <div class="alert alert-success" role="alert">
        <?php echo $success;
        header('Refresh:5;url=siswa.php');
        ?>
      </div>
    <?php } ?>
    <div class="container">

      <?php if ($op == 'tambah' ){ ?>
        <form action="" method="POST">

          <?php if ($error) { ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $error;
              header('Refresh:5;url=siswa.php');
              ?>
            </div>
          <?php } ?>

          <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">NIS</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="ni" id="ni" value="<?= $nis ?>">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Nama</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="nm" id="nm" value="<?= $nama ?>">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Alamat</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="almt" id="almt" value="<?= $alamat ?>">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Jenis Kelamin</span>
            <select class="form-select" name="jnkel" id="jnkel" aria-label="Default select example">
              <option selected>Pilih Jenis Kelamin</option>
              <option value="L" <?= ($jenkel == 'L' ? 'selected' : '') ?>>L</option>
              <option value="P" <?= ($jenkel == 'P' ? 'selected' : '') ?>>P</option>
            </select>

          </div>

          <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Telepon</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="tlp" value="<?= $telepon ?>">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Kelas</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="kls" id="kls" value="<?= $kelas ?>">
          </div>

          <input type="submit" name="submit" value="Simpan Data" class="btn btn-primary">
    </div>
    </form>
  <?php } ?>

  <?php if ($op == 'edit') { ?>
        <form action="" method="POST">

          <?php if ($error) { ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $error;
              header('Refresh:5;url=siswa.php');
              ?>
            </div>
          <?php } ?>

          <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">NIS</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="ni" id="ni" value="<?= $nis ?>" readonly>
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Nama</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="nm" id="nm" value="<?= $nama ?>">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Alamat</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="almt" id="almt" value="<?= $alamat ?>">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Jenis Kelamin</span>
            <select class="form-select" name="jnkel" id="jnkel" aria-label="Default select example">
              <option selected>Pilih Jenis Kelamin</option>
              <option value="L" <?= ($jenkel == 'L' ? 'selected' : '') ?>>L</option>
              <option value="P" <?= ($jenkel == 'P' ? 'selected' : '') ?>>P</option>
            </select>

          </div>

          <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Telepon</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="tlp" value="<?= $telepon ?>">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Kelas</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="kls" id="kls" value="<?= $kelas ?>">
          </div>

          <input type="submit" name="submit" value="Simpan Data" class="btn btn-primary">
    </div>
    </form>
  <?php } ?>

  <table class="table" style="margin-top: 34px;">

    <thead>
      <tr>
        <th>NIS</th>
        <th>Nama Nilai</th>
        <th>Alamat</th>
        <th>Jenis Kelamin</th>
        <th>Telepon</th>
        <th>Kelas</th>
        <th>Edit or Delete</th>
      </tr>
    </thead>

    <tbody class="">
      <?php
      $sql = "SELECT * from siswa";
      $query = mysqli_query($conn, $sql);
      while ($siswa = mysqli_fetch_array($query)) {
      ?>
        <tr>
          <td><?= $siswa['NIS'] ?></td>
          <td><?= $siswa['Nama'] ?></td>
          <td><?= $siswa['Alamat'] ?></td>
          <td><?= $siswa['Jenis_kelamin'] ?></td>
          <td><?= $siswa['Telepon'] ?></td>
          <td><?= $siswa['Kelas'] ?></td>
          <td>
            <a href="siswa.php?op=edit&nis=<?= $siswa['NIS'] ?>">
              <div class="btn btn-warning">Edit</div>
            </a>
            <a href="siswa.php?op=delete&nis=<?= $siswa['NIS'] ?>" onclick="return confirm('Yakin Mau Hapus Data?')">
              <div class="btn btn-danger">Delete</div>
            </a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>