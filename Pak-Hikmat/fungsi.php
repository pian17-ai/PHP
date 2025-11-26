<?php
declare(strict_types=1);

function cekKelulusan(int $nilai): string {
    if ($nilai >= 75) {
        return "LULUS";
    } else {
        return "TIDAK LULUS";
    }
}

echo cekKelulusan(75);

?>