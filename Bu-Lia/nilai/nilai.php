<?php

include '../php.ini';

include '../conn.php';

$sql = 'SELECT * from nilai';

$kode = '';
$nama = '';
$nilai = '';
$pelajaran = '';

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = '';
}
if ($op == 'delete') {
    $kode = $_GET['kode'];
    $sql = "DELETE from nilai where Kode_nilai='$kode'";
    $query = mysqli_query($conn, $sql);
}

if ($op == 'edit') {
    $kode = $_GET['kode'];
    $sql = "SELECT * from nilai where Kode_nilai='$kode'";
    $query = mysqli_query($conn, $sql);
    $edited = mysqli_fetch_array($query);

    // $kode = $edited['kode_nilai'];
    $nama = $edited['Nis'];
    $nilai = $edited['Nilai'];
    $pelajaran = $edited['kode_mapel'];
}

if (isset($_POST['submit'])) {
    $op = $_GET['op'];

    $kode = $_POST['kd'];
    $siswa = $_POST['siswa'];
    $pelajaran = $_POST['pelajaran'];
    $nilai = $_POST['nilai'];

    if ($pelajaran == 'Pilih Mata Pelajaran' || $siswa == 'Pilih Siswa' || $kode == '' || $nilai == '') {
        echo 'Masukkan Data Yang Sesuai';
    } else {
        if ($op == 'edit') {
            $sql = "UPDATE nilai set Nilai='$nilai' where Kode_nilai='$kode'";
            $query = mysqli_query($conn, $sql);
            if ($query) {
                echo "Berhasil Mengubah Data";
            } else {
                echo "Gagal Mengubah Data";
            }
        } else {
            $sql = "INSERT into nilai values ('$kode', '$siswa', '$nilai', '$pelajaran')";
            $query = mysqli_query($conn, $sql);
            if ($query) {
                echo 'Berhasil Menambah Data';
            } else {
                echo 'Gagal Menambah Data';
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
    <title>Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
    <?php include '../components/navbar.php' ?>

    <a style="text-decoration: none; color:black" href="../index.php">
        <h2>Nilai</h2>
    </a>

    <a href="nilai.php?op=tambah"><button>Tambah</button></a>

    <?php if ($op == 'tambah') { ?>

        <form method="post">
            <span>Kode Nilai : </span>
            <input type="text" name="kd" value="<?= $kode ?>">

            <span>Pilih Siswa : </span>
            <select name="siswa" id="">
                <?php
                $sql = 'SELECT * from siswa';
                $query = mysqli_query($conn, $sql);
                echo "<option selected value='Pilih Siswa'>Pilih Siswa</option>";
                while ($siswa = mysqli_fetch_array($query)) {
                    echo "<option value='$siswa[NIS]'>$siswa[NIS] - $siswa[Nama]</option>";
                }
                ?>
            </select>


            <span>Pilih Pelajaran : </span>
            <select name="pelajaran" id="">

                <?php
                $sql = 'SELECT * from mata_pelajaran';
                $query = mysqli_query($conn, $sql);
                echo "<option selected value='Pilih Mata Pelajaran'>Pilih Mata Pelajaran</option>";
                while ($mapel = mysqli_fetch_array($query)) {
                    echo "<option value='$mapel[kode_mapel]'>$mapel[kode_mapel] - $mapel[nama_mapel]</option>";
                }
                ?>

            </select>

            <span>Nilai : </span>
            <input type="text" name="nilai" value="<?= $nilai ?>">

            <button name="submit">Simpan</button>
        </form>

    <?php } ?>

    <?php if ($op == 'edit') { ?>

        <form method="post">
            <span>Kode Nilai : </span>
            <input type="text" name="kd" readonly value="<?= $kode ?>">

            <span>Pilih Siswa : </span>
            <select name="siswa" id="">
                <?php
                $nis = $_GET['nis'];

                $sql = "SELECT * from siswa where NIS='$nis'";
                $query = mysqli_query($conn, $sql);
                // echo '<option selected>Masukkan Siswa</option>';
                $siswa = mysqli_fetch_array($query);
                echo "<option value=$siswa[NIS] >$siswa[NIS] - $siswa[Nama]</option>";
                ?>
            </select>


            <span>Pilih Pelajaran : </span>
            <select name="pelajaran" id="">
                <?php
                $mapel = $_GET['mapel'];

                $sql = "SELECT * from mata_pelajaran where kode_mapel='$mapel'";
                $query = mysqli_query($conn, $sql);
                while ($mapel = mysqli_fetch_array($query)) {
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
            <th>Nis - Siswa</th>
            <th>Mata Pelajaran</th>
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
                <td><?= $mapel['Nis'] ?> - <?php $nama_get = $conn->query("SELECT siswa.Nama from siswa where NIS='$mapel[Nis]'");
                                            $nm = $nama_get->fetch_assoc();
                                            echo $nm['Nama'] ?></td>
                <td><?= $mapel['kode_mapel'] ?></td>
                <td><?= $mapel['Nilai'] ?></td>
                <td>
                    <a href="nilai.php?op=edit&kode=<?= $mapel['Kode_nilai'] ?>&nis=<?= $mapel['Nis'] ?>&mapel=<?= $mapel['kode_mapel'] ?>"><button>Edit</button></a>
                    <a href="nilai.php?op=delete&kode=<?= $mapel['Kode_nilai'] ?>"
                        onclick="return confirm('Yakin mau hapus data?')"><button>Delete</button></a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>