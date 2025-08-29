<?php

include 'php.ini';

class Product
{
    public      $title, 
                $writter, 
                $publisher;
                // $price;

    protected   $discount=0;

    private     $price;

    public function __construct($title, $writter, $publisher, $price)
    {
        $this->title = $title;
        $this->writter = $writter;
        $this->publisher = $publisher;
        $this->price = $price;
    }

    public function getLabel()
    {
        $str = "{$this->writter}, {$this->publisher}";
        return $str;
    }

    public function getDetail() {
        $str = "{$this->title} | {$this->getLabel()} | {$this->price}";
        return $str;
    }

    public function getPrice() {
        return $this->price;
    }
}

class Komik extends Product {
    public $page;
    
    public function __construct($title, $writter, $publisher, $price, $page)
    {
        parent::__construct($title, $writter, $publisher, $price);
        $this->page = $page;
    }
    
    public function getDetail()
    {
        $str = "Komik : ". parent::getDetail() ." - {$this->page} Pages.";
        return $str;
    }

    public function getDiscount($discount) {
        $disc = $this->price - ($this->price * $discount/100);
        return $disc;
    }
}

class Anime extends Product {
    public $time;
    
    public function __construct($title, $writter, $publisher, $price, $time)
    {
        parent::__construct($title, $writter, $publisher, $price);
        $this->time = $time;
    }

    public function getDetail()
    {
        $str = "Anime : ". parent::getDetail() ." - {$this->time} Minutes.";
        return $str;
    }
}

$product1 = new Komik('Fumetsu no anata e', 'Yoshitoki Oima', 'Kodansha', 120000, 135);
$product2 = new Anime('Majo no tabitabi', 'Jougi Shiraishi', 'Square Enix', 149999, 180);
echo $product1->getDetail();
echo "<br>";
echo $product2->getDetail();


echo "<hr>";
echo "Harga awal : ";
echo $product1->price;
echo "<br>";
echo $product1->getDiscount(20);
echo "<br>";
// echo $product1->price;
echo "<br>";