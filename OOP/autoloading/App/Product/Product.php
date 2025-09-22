<?php

abstract class Product
{
    private $title, $writter, $publisher, $price, $discount;

    public function __construct($title, $writter, $publisher, $price)
    {
        $this->title = $title;
        $this->writter = $writter;
        $this->publisher = $publisher;
        $this->price = $price;
    }

    // ------------------------------------------------

    public function getTitle()
    {
        return $this->title;
    }

    public function setNewTitle($newTitle)
    {
        $this->title = $newTitle;
    }

    public function getWritter()
    {
        return $this->writter;
    }

    public function setNewWritter($newWritter)
    {
        $this->writter = $newWritter;
    }

    public function getPublisher()
    {
        return $this->publisher;
    }

    public function setNewPublisher($newPublisher)
    {
        $this->publisher = $newPublisher;
    }
    
    public function setNewPrice($newPrice) {
        $this->price = $newPrice;
    }

    public function getPrice() {
        return $this->price - ($this->price * $this->discount / 100);
    }

    public function getDiscount() {
        return $this->discount;
    }
    
    // -------------------------------------------------

    public function getLabel()
    {
        $str = "{$this->writter}, {$this->publisher}";
        return $str;
    }

    public function getDetail()
    {
        $str = "{$this->title} | {$this->getLabel()} | {$this->price}";
        return $str;
    }
}