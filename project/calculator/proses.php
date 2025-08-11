<?php

$angka1 = $_POST['angka1'];
$angka2 = $_POST['angka2'];

// Fungsi Aritmatika
$tambah = $_POST['tambah'];

function tambah ($angka1, $angka2) {
    $hasil = $angka1 + $angka2;
    return "Hasil dari {$angka1} + {$angka2} adalah {$hasil}";
}

echo tambah($angka1, $angka2);