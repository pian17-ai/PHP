<?php
include '../php.ini';

include '../conn.php';

$nilai_query = $conn->query("SELECT nilai.Kode_nilai, siswa.Nama, mata_pelajaran.nama_mapel, nilai.Nilai from nilai join siswa on nilai.Nis=siswa.NIS join mata_pelajaran on nilai.Kode_mapel=mata_pelajaran.kode_mapel");

$nama = '';

$op = '';

if (isset($_GET['op'])) {
  $op = $_GET['op'];
} else {
  $op = '';
}

if ($op == 'search') {
  $nama = $_GET['nama'];
  $search = $conn->query("SELECT nilai.Kode_nilai, siswa.Nama, mata_pelajaran.nama_mapel, nilai.Nilai from nilai join siswa on nilai.Nis=siswa.NIS join mata_pelajaran on nilai.Kode_mapel=mata_pelajaran.kode_mapel where siswa.Nama like '%$nama%'");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Nilai Siswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
  <?php include '../components/navbar.php' ?>

  <div class="container p-4">
    <h1>Data Nilai Siswa</h1>
    <hr>

    <form class="d-flex" method="GET" action="">
      <input id="nama" name="nama" class="form-control me-2" placeholder="Cari Nama" value="<?= isset($_GET['nama']) ? $_GET['nama'] : '' ?>" />
      <button class="btn btn-outline-success" name="op" value="search" type="submit">Cari</button>
    </form>

    <?php
    if ($op == 'search') {
    ?>
      <table class="table" style="margin-top: 34px;">
        <thead>
          <tr>
            <th>Kode Nilai</th>
            <th>Nama</th>
            <th>Nama Mapel</th>
            <th>Nilai</th>
          </tr>
        </thead>

        <tbody>
          <?php while ($n = $search->fetch_assoc()) { ?>
            <tr>
              <td><?= $n['Kode_nilai'] ?></td>
              <td><?= $n['Nama'] ?></td>
              <td><?= $n['nama_mapel'] ?></td>
              <td><?= $n['Nilai'] ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php
    } else {
    ?>
      <table class="table" style="margin-top: 34px;">
        <thead>
          <tr>
            <th>Kode Nilai</th>
            <th>Nama</th>
            <th>Nama Mapel</th>
            <th>Nilai</th>
          </tr>
        </thead>

        <tbody>
          <?php while ($n = $nilai_query->fetch_assoc()) { ?>
            <tr>
              <td><?= $n['Kode_nilai'] ?></td>
              <td><?= $n['Nama'] ?></td>
              <td><?= $n['nama_mapel'] ?></td>
              <td><?= $n['Nilai'] ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php
    }
    ?>



  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>