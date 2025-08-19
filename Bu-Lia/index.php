<?php 
include 'php.ini';

include 'conn.php';

$nilai_query = $conn->query("SELECT nilai.Kode_nilai, siswa.Nama, mata_pelajaran.nama_mapel, nilai.Nilai from nilai join siswa on nilai.Nis=siswa.NIS join mata_pelajaran on nilai.kode_mapel=mata_pelajaran.kode_mapel");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIkma</title>
</head>
<body>
    <h2>Data Nilai siswa</h2>
    <table>
        <tr>
            <th>s</th>
            <th>s</th>
            <th>s</th>
            <th>s</th>
        </tr>

        <?php while($n = $nilai_query->fetch_assoc()) { ?>
            <tr>
                <td><?= $n['Kode_nilai'] ?></td>
                <td><?= $n['Nama'] ?></td>
                <td><?= $n['nama_mapel'] ?></td>
                <td><?= $n['Nilai'] ?></td>
            </tr>
        <? } ?>

    </table>
</body>
</html>