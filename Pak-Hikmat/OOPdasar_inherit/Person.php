<?php
class Person {
    protected string $nama;
    protected int $umur;
    
    public function __construct($nama, $umur)
    {
        $this->nama = $nama;
        $this->umur = $umur;
    }

    public function introduce(): string {
        return "Halo, nama saya {$this->nama}, umur {$this->umur} tahun";
    }
}
?>