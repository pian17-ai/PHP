<?php

class Anime extends Product
{
    public $time;

    public function __construct($title, $writter, $publisher, $price, $time)
    {
        parent::__construct($title, $writter, $publisher, $price);
        $this->time = $time;
    }

    public function getProductDetail()
    {
        $str = "Anime : " . parent::getDetail() . " - {$this->time} Times";
        return $str;
    }

    public function getDiscount()
    {
        $disc = $this->price - ($this->price * $this->discount / 100);
        return $disc;
    }
}