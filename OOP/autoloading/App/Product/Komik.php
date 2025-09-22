<?php

class Komik extends Product
{
    public $page;

    public function __construct($title, $writter, $publisher, $price, $page)
    {
        parent::__construct($title, $writter, $publisher, $price);
        $this->page = $page;
    }

    public function getProductDetail()
    {
        $str = "Komik : " . parent::getDetail() . " - {$this->page} Pages";
        return $str;
    }

    public function setDiscount($discount)
    {
        $disc = $this->price - ($this->price * $discount / 100);
        return $disc;
    }
}