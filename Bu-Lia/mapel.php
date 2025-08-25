<?php
include 'php.ini';
include 'conn.php';


$kode = '';
$nama = '';

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = '';
}

if ($op =='delete'){
    $kode = $_GET['kode'];
    $sql = "DELETE from mata_pelajaran where kode_mapel='$kode'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "Data berhasil dihapus";
        header('Refresh:5;url=mapel.php');
    } else {
        echo "Data gagal dihapus";
        header('Refresh:5;url=mapel.php');
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
            echo 'sukses mengganti data';
            header('Refresh:5;url=mapel.php');
        } else {
            echo 'gagal mengganti data';
        }
    } else {
        $sql = "INSERT into mata_pelajaran values ('$kode', '$nama')";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            echo "Data Berhasil Ditambah";
            header("Refresh:5;url=mapel.php");
        } else {
            echo "Data Gagal Ditambah";
            header("Refresh:5;url=mapel.php");
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
</head>

<body>
    <h1>Mata Pelajaran</h1>

    <form method="post">
        <span>Kode Mapel : </span>
        <input type="text" name="kd" value="<?= $kode ?>">
        <span>Nama Mapel : </span>
        <input type="text" name="nm" value="<?= $nama ?>">
        <button name="submit">Simpan</button>
    </form>

    <table border="1">
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
                    <a href="mapel.php?op=edit&kode=<?= $mapel['kode_mapel'] ?>"><button>Edit</button></a>
                    <a href="mapel.php?op=delete&kode=<?= $mapel['kode_mapel'] ?>" onclick="return confirm('Yakin mau hapus data?')"><button>Delete</button></a>
                </td>
            </tr>
        <?php } ?>
    </table>

</body>

</html>