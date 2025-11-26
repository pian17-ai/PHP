<?php

$siswa = [
    ["nama" => "Budi", "nilai" => 85],
    ["nama" => "Siti", "nilai" => 92],
    ["nama" => "Andi", "nilai" => 78],
    ["nama" => "Rina", "nilai" => 88],
];

function getGrade(int $nilai): string {
    if ($nilai >= 90) {
        return "A";
    } elseif ($nilai >= 80) {
        return "B";
    } elseif ($nilai >= 70) {
        return "C";
    } else {
        return "D";
    }
}

echo "<table border='1'>
        <tr>
            <th>Nama</th>
            <th>Nilai</th>
            <th>Grade</th>
        </tr>";

foreach ($siswa as $data) {
    $grade = getGrade($data["nilai"]);
    echo "<tr>
            <td>{$data['nama']}</td>
            <td>{$data['nilai']}</td>
            <td>$grade</td>
          </tr>";
}

echo "</table>";

?>
