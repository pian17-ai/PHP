<?php
$angka1 = $_POST['angka1'];
$angka2 = $_POST['angka2'];
$angka3 = $_POST['angka3'];
$operator = $_POST['operator'];

$hasil = 0;

switch ($operator) {
    case 'tambah':
        $hasil = $angka1 + $angka2 + $angka3;
        break;
    case 'kurang':
        $hasil = $angka1 - $angka2 - $angka3;
        break;
    case 'kali':
        $hasil = $angka1 * $angka2 * $angka3;
        break;
    case 'bagi':
        // Cek jika pembagian dengan 0
        if ($angka2 == 0 || $angka3 == 0) {
            $hasil = "Error! Pembagian dengan 0 tidak diizinkan.";
        } else {
            $hasil = $angka1 / $angka2 / $angka3;
        }
        break;
    default:
        $hasil = "Operator tidak valid.";
        break;
}

echo "<h2>Hasil Perhitungan:</h2>";
echo "<p>$angka1 $operator $angka2 $operator $angka3 = $hasil</p>";
echo "<br><a href='index.php'>Kembali ke Kalkulator</a>";
