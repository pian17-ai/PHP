<?php

$angka1 = $_POST["angka1"] ?? null;
$angka2 = $_POST["angka2"] ?? null;
$operasi = $_POST["operasi"] ?? null;
$hasil = "";
$error = "";

// VALIDASI
if ($angka1 === null || $angka1 === "" || $angka2 === null || $angka2 === "") {
    $error = "Angka tidak boleh kosong!";
} else {
    switch ($operasi) {
        case "+":
            $hasil = $angka1 + $angka2;
            break;

        case "-":
            $hasil = $angka1 - $angka2;
            break;

        case "*":
            $hasil = $angka1 * $angka2;
            break;

        case "/":
            if ($angka2 == 0) {
                $error = "Tidak bisa membagi dengan 0!";
            } else {
                $hasil = $angka1 / $angka2;
            }
            break;

        default:
            $error = "Operasi tidak valid!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Perhitungan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card p-4 shadow">

        <h3 class="text-center mb-3">Hasil Perhitungan</h3>

        <?php if ($error): ?>
            <div class="alert alert-danger text-center">
                <?= $error ?>
            </div>
        <?php else: ?>
            <div class="alert alert-success text-center">
                Hasil: <strong><?= $hasil ?></strong>
            </div>
        <?php endif; ?>

        <a href="index.php" class="btn btn-secondary w-100 mt-3">Kembali</a>

    </div>
</div>

</body>
</html>
