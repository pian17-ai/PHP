<?php
include 'nilai.php';

$mapel_query = $conn->query("SELECT * kode_mapel, nama_mapel from mata_pelajaran");
$nilai_query = $conn->query("SELECT nilai.kode_nilai, siswa.Nama, mata_pelajaran.nama_mapel, nilai.Nilai from nilai join siswa on nilai.nis = siswa.NIS join mata-pelajaran on nilai.kode_mapel=mata_pelajaran.kode_mapel");



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous"> -->

</head>

<body>
    
<form action="POST" action="simpan.php">
    <label for="">Pilih siswa</label>
    <select name="nis" id="" required>
        <option value="">-Pilih Siswa-</option>
        <?php 
            while($s = $nilai_query->fetch_assoc()) {
                ?>
            <option value="<?= $s['nis'];?>"><?= $s['nama'] ?></option>
                <?php
            }
        ?>
    </select> <br> <br>
</form>


    <!-- <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>sdad</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
            </tbody>
        </table>
    </div> -->


    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script> -->
</body>

</html>