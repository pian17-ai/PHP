<?php

$nama = "Alvian Cahyo P";
$umur = 16;
$tinggi = 150;
$isStudent = true;

// declare(strict_types=1);

function hitungBMI (float $tinggiCm, float $beratKg): float {
	$hasil = $beratKg / (($tinggiCm / 100) * ($tinggiCm / 100));
	return $hasil;
}

echo "Halo, $nama! BMI kamu adalah " . hitungBMI($tinggi, 65);
?>
