<?php
require_once 'models/Product.php';

$db = new Database();
$siswa = new Product($db);

$nis = $nama = $alamat = $jenkel = $telepon = $kelas = "";

if (isset($_GET['edit'])) {
    $data = $siswa->getProduct($_GET['edit']);
    $nis = $data['NIS'];
    $nama = $data['Nama'];
    $alamat = $data['Alamat'];
    $jenkel = $data['Jenis_kelamin'];
    $telepon = $data['Telepon'];
    $kelas = $data['Kelas'];
}

if (isset($_POST['save'])) {
    $data = [
        "nis" => $_POST['nis'],
        "nama" => $_POST['nama'],
        "alamat" => $_POST['alamat'],
        "jenkel" => $_POST['jenkel'],
        "telepon" => $_POST['telepon'],
        "kelas" => $_POST['kelas'],
    ];

    if ($_POST['mode'] == "edit") {
        $siswa->update($data);
    } else {
        $siswa->insert($data);
    }
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Siswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
<h2><?= isset($_GET['edit']) ? "Edit" : "Tambah" ?> Data Siswa</h2>

<form method="post">
    <input type="hidden" name="mode" value="<?= isset($_GET['edit']) ? "edit" : "tambah" ?>">

    <div class="mb-3">
        <label>NIS</label>
        <input type="text" name="nis" class="form-control" value="<?= $nis ?>" <?= isset($_GET['edit']) ? "readonly" : "" ?> required>
    </div>
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="<?= $nama ?>" required>
    </div>
    <div class="mb-3">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" value="<?= $alamat ?>">
    </div>
    <div class="mb-3">
        <label>Jenis Kelamin</label>
        <select name="jenkel" class="form-control">
            <option value="L" <?= $jenkel=="L"?"selected":"" ?>>Laki-laki</option>
            <option value="P" <?= $jenkel=="P"?"selected":"" ?>>Perempuan</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Telepon</label>
        <input type="text" name="telepon" class="form-control" value="<?= $telepon ?>">
    </div>
    <div class="mb-3">
        <label>Kelas</label>
        <input type="text" name="kelas" class="form-control" value="<?= $kelas ?>">
    </div>

    <button type="submit" name="save" class="btn btn-success">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>
</body>
</html>
