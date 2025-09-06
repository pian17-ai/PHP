<?php

// define('MYLOVE', 'Jihan');

// const MYHEART = 'Jihan Syahbani';

// echo MYHEART;

// class Coba {
//     const MYLOVE = "Jihan";
// }

// echo Coba::MYLOVE;

// echo __LINE__;

function coba() {
    return __FUNCTION__;
}

class JihanSyahbani {
    public static function tes() {
        return __CLASS__;
    }
}

echo JihanSyahbani::tes();

// $jihan = new JihanSyahbani();
// echo $jihan->tes();