<?php

include "php.ini";


class Product {
    protected $title, $writter, $publisher, $price;

    public function __construct($title, $writter, $publisher, $price)
    {
        $this->title = $title;
        $this->writter = $writter;
        $this->publisher = $publisher;
        $this->price = $price;
    }

    public function getLabel() {
        $str = "{$this->writter}, {$this->publisher}";

        return $str;
    }

    public function getDetailsProduct() {
        $str = "{$this->title} | {$this->getLabel()} | {$this->price}";

        return $str;
    }
}

class Komik extends Product {
    public $page;

    public function __construct($title, $writter, $publisher, $price, $page)
    {
        parent::__construct($title, $writter, $publisher, $price);
        $this->page = $page;
    }

    public function getDetailsProduct()
    {
        $str = "Komik : " . parent::getDetailsProduct() . " - {$this->page} Pages.";
        
        return $str;
    }
}

class Anime extends Product{
    public $time;

    public function __construct($title, $writter, $publisher, $price, $time)
    {
        parent::__construct($title, $writter, $publisher, $price);
        $this->time = $time;
    }

    public function getDetailsProduct()
    {
        $str = "Anime : " . parent::getDetailsProduct() . " - {$this->time} Minutes.";

        return $str;
    }
}

$product1 = new Komik('Fumetsu no anata e', 'Yoshitoki Oima', 'Kodansha', 120000, 345);
$product2 = new Anime('Majo no tabitabi', 'Jougi Shiraishi', 'Square Enix', 149999, 180);

echo $product1->getDetailsProduct();
echo "<br>";
echo $product2->getDetailsProduct();
echo "<hr>";

echo $product1->price;