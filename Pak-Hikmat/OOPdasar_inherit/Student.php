<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'Person.php';

class Student extends Person {
    public function __construct(string $nama, int $umur, private string $nis)
    {
        parent::__construct($nama, $umur);
    }

    public function introduce(): string {
        return parent::introduce() . " Saya siswa dengan NIS {$this->nis}";
    }
}

$siswa = new Student("Alvian Cahyo Pambudi", 16, "0923842");
echo $siswa->introduce();
?>