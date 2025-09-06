<?php

// class ContohStatic {
//     public static $angka = 1;

//     public static function halo () {
//         return 'halo ' . self::$angka . ' kali';
//     }
// }

// echo ContohStatic::halo();

class Contoh {
    public static $angka = 1;

    public function halo () {
        return "halo " . self::$angka++ . " kali";
    }
}

$obj = new Contoh;
echo $obj->halo();
echo "<br>";
echo $obj->halo();
echo "<br>";
echo $obj->halo();
echo "<br>";

echo "<hr>";

$obj2 = new Contoh;
echo $obj2->halo();
echo "<br>";
echo $obj2->halo();
echo "<br>";
echo $obj2->halo();
echo "<br>";