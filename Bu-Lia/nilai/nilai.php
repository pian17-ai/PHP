<?php

include '../php.ini';

include '../conn.php';

$sql = 'SELECT * from nilai';

$kode = '';
$nama = '';
$nilai = '';
$pelajaran = '';

$success = '';
$error = '';

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = '';
}
if ($op == 'delete') {
    $kode = $_GET['kode'];
    $sql = "DELETE from nilai where Kode_nilai='$kode'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $success = "Data Berhasil Dihapus";
    } else {
        $error = "Data Gagal Dihapus";
    }
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
        $error = "Masukkan Data Yang Sesuai";
    } else {
        if ($op == 'edit') {
            $sql = "UPDATE nilai set Nilai='$nilai' where Kode_nilai='$kode'";
            $query = mysqli_query($conn, $sql);
            if ($query) {
                $success = "Berhasil Mengubah Data";
            } else {
                $error = "Gagal Mengubah Data";
            }
        } else {
            $sql = "INSERT into nilai values ('$kode', '$siswa', '$nilai', '$pelajaran')";
            $query = mysqli_query($conn, $sql);
            if ($query) {
                $success = 'Berhasil Menambah Data';
            } else {
                $error = 'Gagal Menambah Data';
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

    <div class="container p-4">

        <h1>Nilai</h1>
        <a class="btn btn-primary" href="nilai.php?op=tambah">Tambah</a>
        <hr>

        <?php if ($success) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $success;
                header('Refresh:5;url=nilai.php');
                ?>
            </div>
        <?php } ?>

        <?php if ($error) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error;
                header('Refresh:5;url=nilai.php');
                ?>
            </div>
        <?php } ?>

        <?php if ($op == 'tambah') { ?>

            <!-- <form method="post">
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
            </form> -->

            <form action="" method="POST">

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Kode Nilai</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="kd" id="kd" value="<?= $kode ?>">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Siswa</span>
                    <select class="form-select" name="siswa" id="">
                        <?php
                        $sql = 'SELECT * from siswa';
                        $query = mysqli_query($conn, $sql);
                        echo "<option selected value='Pilih Siswa'>Pilih Siswa</option>";
                        while ($siswa = mysqli_fetch_array($query)) {
                            echo "<option value='$siswa[NIS]'>$siswa[NIS] - $siswa[Nama]</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Mata Pelajaran</span>

                    <select class="form-select" name="pelajaran" id="">
                        <?php
                        $sql = 'SELECT * from mata_pelajaran';
                        $query = mysqli_query($conn, $sql);
                        echo "<option selected value='Pilih Mata Pelajaran'>Pilih Mata Pelajaran</option>";
                        while ($mapel = mysqli_fetch_array($query)) {
                            echo "<option value='$mapel[kode_mapel]'>$mapel[kode_mapel] - $mapel[nama_mapel]</option>";
                        }
                        ?>

                    </select>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Nilai</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="nilai" id="nilai" value="<?= $nilai ?>">
                </div>

                <input type="submit" name="submit" value="Simpan Data" class="btn btn-primary">
            </form>

        <?php } ?>

        <?php if ($op == 'edit') { ?>

            <form action="" method="POST">

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Kode Nilai</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="kd" id="kd" value="<?= $kode ?>" readonly>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Siswa</span>
                    <select class="form-select" name="siswa" id="">
                        <?php
                        $nis = $_GET['nis'];

                        $sql = "SELECT * from siswa where NIS='$nis'";
                        $query = mysqli_query($conn, $sql);
                        // echo '<option selected>Masukkan Siswa</option>';
                        $siswa = mysqli_fetch_array($query);
                        echo "<option value=$siswa[NIS] >$siswa[NIS] - $siswa[Nama]</option>";
                        ?>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Mata Pelajaran</span>

                    <select class="form-select" name="pelajaran" id="">
                        <?php
                        $mapel = $_GET['mapel'];

                        $sql = "SELECT * from mata_pelajaran where kode_mapel='$mapel'";
                        $query = mysqli_query($conn, $sql);
                        while ($mapel = mysqli_fetch_array($query)) {
                            echo "<option value=$mapel[kode_mapel]>$mapel[kode_mapel] - $mapel[nama_mapel]</option>";
                        }
                        ?>

                    </select>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Nilai</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="nilai" id="nilai" value="<?= $nilai ?>">
                </div>

                <input type="submit" name="submit" value="Simpan Data" class="btn btn-primary">
            </form>

        <?php } ?>

        <table class="table" style="margin-top: 34px;">
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
                    <td><?= $mapel['kode_mapel'] ?> - <?php $nama_get = $conn->query("SELECT mata_pelajaran.nama_mapel from mata_pelajaran where kode_mapel='$mapel[kode_mapel]'");
                                                        $nm = $nama_get->fetch_assoc();
                                                        echo $nm['nama_mapel'] ?></td>
                    <td><?= $mapel['Nilai'] ?></td>
                    <td>
                        <a class="btn btn-warning" href="nilai.php?op=edit&kode=<?= $mapel['Kode_nilai'] ?>&nis=<?= $mapel['Nis'] ?>&mapel=<?= $mapel['kode_mapel'] ?>">Edit</a>
                        <a class="btn btn-danger" href="nilai.php?op=delete&kode=<?= $mapel['Kode_nilai'] ?>"
                            onclick="return confirm('Yakin mau hapus data?')">Delete<a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>