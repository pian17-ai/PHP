<?php

include '../conn.php';

$sql = "SELECT * from nilai";

$kode = '';
$nama = '';
$nilai = '';

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = '';
}

// if ($op == 'tambah'){
    // }
    
    if (isset($_POST['submit'])){
        $kode = $_POST['kd'];
        $siswa = $_POST['siswa'];
        $pelajaran = $_POST['pelajaran'];
        $nilai = $_POST['nilai'];
    
        $sql = "INSERT into nilai values ('$kode', '$siswa', '$nilai', '$pelajaran')";
        $query = mysqli_query($conn, $sql);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai</title>
</head>

<body>
    <h2>Nilai</h2>
    <a href="nilai.php?op=tambah"><button>Tambah</button></a>

    <?php if ($op == 'tambah') { ?>

        <form method="post">
            <span>Kode Nilai : </span>
            <input type="text" name="kd" value="<?= $kode ?>">

            <span>Pilih Siswa : </span>
            <select name="siswa" id="">
                <?php 
                    $sql = "SELECT * from siswa";
                    $query = mysqli_query($conn, $sql);
                    while ($siswa = mysqli_fetch_array($query)){
                        echo "<option value=$siswa[NIS] >$siswa[Nama] - $siswa[NIS]</option>";
                    }
                ?>
            </select>
            

            <span>Pilih Pelajaran : </span>
            <select name="pelajaran" id="">
                
                    <?php 
                        $sql = "SELECT * from mata_pelajaran";
                        $query = mysqli_query($conn, $sql);
                        while($mapel = mysqli_fetch_array($query)){
                            echo "<option value=$mapel[kode_mapel]>$mapel[kode_mapel] - $mapel[nama_mapel]</option>";
                        }
                    ?>

            </select>

            <span>Nilai : </span>
            <input type="text" name="nilai" value="<?= $nilai ?>">

            <button name="submit">Simpan</button>
        </form>

    <?php } ?>

    <table border="1">
        <tr>
            <th>Kode Nilai</th>
            <th>Nilai</th>
            <th>Edit or Delete</th>
        </tr>
        <?php
        $sql = "SELECT * from nilai";
        $query = mysqli_query($conn, $sql);

        while ($mapel = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?= $mapel['Kode_nilai'] ?></td>
                <td><?= $mapel['Nilai'] ?></td>
                <td>
                    <a href="nilai.php?op=edit&kode=<?= $mapel['Kode_nilai'] ?>"><button>Edit</button></a>
                    <a href="nilai.php?op=delete&kode=<?= $mapel['Nilai'] ?>" onclick="return confirm('Yakin mau hapus data?')"><button>Delete</button></a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>