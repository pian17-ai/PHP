<?php

include "php.ini";


// class Product {
//     public $title, $writter, $publisher, $price;

//     public function __construct($title, $writter, $publisher, $price)
//     {
//         $this->title = $title;
//         $this->writter = $writter;
//         $this->publisher = $publisher;
//         $this->price = $price;
//     }

//     public function getLabel() {
//         $str = "{$this->writter}, {$this->publisher}";

//         return $str;
//     }

//     public function getProduct() {
//         $str = "{$this->title} | {$this->getLabel()} ({$this->price})";

//         return $str;
//     }
// }

// class Komik extends Product {
//     public $page;

//     public function __construct($title, $writter, $publisher, $price, $page)
//     {
//         parent::__construct($title, $writter, $publisher, $price);
//         $this->page = $page;
//     }

//     public function getProduct () {
//         $str = "Komik : ". parent::getProduct() ." - {$this->page} Pages.";

//         return $str;
//     }
// }

// class Anime extends Product {
//     public $time;

//     public function __construct($title, $writter, $publisher, $price, $time)
//     {
//         parent::__construct($title, $writter, $publisher, $price);

//         $this->time = $time;
//     }

//     public function getProduct()
//     {
//         $str = "Anime : ". parent::getProduct() ." - {$this->time} Minutes. ";

//         return $str;
//     }
// }

// $product1 = new Komik('Fumetsu no anata e', 'Yoshitoki Oima', 'Kodansha', 120000, 345);
// $product2 = new Anime('Majo no tabitabi', 'Jougi Shiraishi', 'Square Enix', 149999, 180);

// echo $product2->getProduct();

class Car
{
    public $merk, $color, $tSpeed, $price;

    public function __construct($merk, $color, $tSpeed, $price)
    {
        $this->merk = $merk;
        $this->color = $color;
        $this->tSpeed = $tSpeed;
        $this->price = $price;
    }

    public function getLabel()
    {
        return "{$this->color}, {$this->tSpeed} Km/h";
    }

    public function getCar()
    {
        return "{$this->merk} | {$this->getLabel()} | {$this->price}";
    }
}

class Sport extends Car
{
    public $turbo;

    public function __construct($merk, $color, $tSpeed, $price, $turbo)
    {
        parent::__construct($merk, $color, $tSpeed, $price);
        $this->turbo = $turbo;
    }

    public function getCar()
    {
        return "Sport Car : " . parent::getCar() . " - {$this->turbo} Turbo.";
    }
}

class SUV extends Car {
    public $seat;

    public function __construct($merk, $color, $tSpeed, $price, $seat)
    {
        parent::__construct($merk, $color, $tSpeed, $price);
        $this->seat = $seat;
    }

    public function getCar() {
        return "SUV Car : " . parent::getCar() . " - {$this->seat} Seat";
    }
}


$car1 = new Sport("Porsche 911", "Gray", 314, 1800000000, 2);
$car2 = new SUV("Fortuner", "White", 260, 800000000, 6);

echo $car1->getCar(); echo "<br>";
echo $car2->getCar();