<?php
include '../php.ini';

include '../conn.php';

$nilai_query = $conn->query("SELECT nilai.Kode_nilai, siswa.Nama, mata_pelajaran.nama_mapel, nilai.Nilai from nilai join siswa on nilai.Nis=siswa.NIS join mata_pelajaran on nilai.Kode_mapel=mata_pelajaran.kode_mapel");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SIkma</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
  <div class="container p-4">
    <h1 class="fs-2">Data Siswa</h1>
    <hr>
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
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>