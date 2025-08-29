<?php

include 'php.ini';

class Product
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

class Komik extends Product
{
    public $page;

    public function __construct($title, $writter, $publisher, $price, $page)
    {
        parent::__construct($title, $writter, $publisher, $price);
        $this->page = $page;
    }

    public function getDetail()
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

class Anime extends Product
{
    public $time;

    public function __construct($title, $writter, $publisher, $price, $time)
    {
        parent::__construct($title, $writter, $publisher, $price);
        $this->time = $time;
    }

    public function getDetail()
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

$product1 = new Komik('Fumetsu no anata e', 'Yoshitoki Oima', 'Kodansha', 120000, 135);
$product2 = new Anime('Majo no tabitabi', 'Jougi Shiraishi', 'Square Enix', 149999, 180);
echo $product1->getDetail();
echo "<br>";
echo $product2->getDetail();
echo "<hr>";

// $product3 = new Product("Komik free fire sad");
// echo $product3->getTitle();

$product1->setNewWritter("Piann");
echo $product1->getWritter();
