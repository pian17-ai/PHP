<?php
include '../php.ini';
include '../conn.php';


$kode = '';
$nama = '';

$success = '';
$error = '';

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = '';
}

if ($op == 'delete') {
    $kode = $_GET['kode'];
    $sql = "DELETE from mata_pelajaran where kode_mapel='$kode'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $success = "Data Berhasil Dihapus";
    } else {
        $error = "Data Gagal Dihapus";
    }
}

if ($op == 'edit') {
    $kode = $_GET['kode'];
    $sql = "SELECT * from mata_pelajaran where kode_mapel='$kode'";
    $query = mysqli_query($conn, $sql);
    $edit = mysqli_fetch_array($query);

    $kode = $edit['kode_mapel'];
    $nama = $edit['nama_mapel'];
}

if (isset($_POST['submit'])) {
    $kode = $_POST['kd'];
    $nama = $_POST['nm'];

    if ($op == 'edit') {
        $sql = "UPDATE mata_pelajaran set kode_mapel='$kode', nama_mapel='$nama' where kode_mapel='$kode'";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            $success = "Sukses Mengganti Data";
        } else {
            $error = "Gagal Mengganti Data";
        }
    } else {
        $sql = "INSERT into mata_pelajaran values ('$kode', '$nama')";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            $success = "Sukses Menambahkan data";
        } else {
            $error = "Gagal Menambahkan Data";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mata Pelajaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
    <?php include '../components/navbar.php' ?>

    <div class="container p-4">
        <h1>Mata Pelajaran</h1>
        <a class="btn btn-primary" href="mapel.php?op=tambah">Tambah</a>
        <hr>

        <?php if ($success) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $success;
                header('Refresh:5;url=mapel.php');
                ?>
            </div>
        <?php } ?>

        <?php if ($error) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error;
                header('Refresh:5;url=mapel.php');
                ?>
            </div>
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
                    <span class="input-group-text" id="inputGroup-sizing-default">Kode Mapel</span>
                    <input readonly type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="kd" id="kd" value="<?= $kode ?>">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Nama Mapel</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="nm" id="nm" value="<?= $nama ?>">
                </div>

                <input type="submit" name="submit" value="Simpan Data" class="btn btn-primary">
            </form>

        <?php }
        if ($op == 'tambah') { ?>

            <!-- <form method="post">
                <span>Kode Mapel : </span>
                <input type="text" name="kd" value="<?= $kode ?>">
                <span>Nama Mapel : </span>
                <input type="text" name="nm" value="<?= $nama ?>">
                <button name="submit">Simpan</button>
            </form> -->

            <form action="" method="POST">

                <?php if ($error) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error;
                        header('Refresh:5;url=siswa.php');
                        ?>
                    </div>
                <?php } ?>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Kode Mapel</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="kd" id="kd" value="<?= $kode ?>">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Nama Mapel</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="nm" id="nm" value="<?= $nama ?>">
                </div>

                <input type="submit" name="submit" value="Simpan Data" class="btn btn-primary">
            </form>

        <?php } ?>


        <table class="table" style="margin-top: 34px;">
            <tr>
                <th>Kode Mapel</th>
                <th>Nama Mapel</th>
                <th>Edit or Delete</th>
            </tr>
            <?php
            $sql = "SELECT * from mata_pelajaran";
            $query = mysqli_query($conn, $sql);

            while ($mapel = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td><?= $mapel['kode_mapel'] ?></td>
                    <td><?= $mapel['nama_mapel'] ?></td>
                    <td>
                        <a class="btn btn-warning" href="mapel.php?op=edit&kode=<?= $mapel['kode_mapel'] ?>">Edit</a>
                        <a class="btn btn-danger" href="mapel.php?op=delete&kode=<?= $mapel['kode_mapel'] ?>" onclick="return confirm('Yakin mau hapus data?')">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>