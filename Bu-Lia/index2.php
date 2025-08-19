<?php
include 'php.ini';
include 'conn.php';

$nilai_query = $conn->query("SELECT nilai.Kode_nilai, siswa.Nama, mata_pelajaran.nama_mapel, nilai.Nilai from nilai join siswa on nilai.Nis=siswa.NIS join mata_pelajaran on nilai.kode_mapel=mata_pelajaran.kode_mapel");

// while ($n = $nilai_query->fetch_assoc()) {
// // while ($new = mysqli_fetch_array($nilai_query)) {
    
// echo $n['Nama'];
// }


$new = mysqli_fetch_array($nilai_query);
echo $new['Nama'];


?>