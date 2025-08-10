<?php

// class Product
// {
//     public $title, $writter, $publisher, $price, $page, $time, $type;

//     public function __construct($title, $writter, $publisher, $price, $page, $time, $type)
//     {
//         $this->title = $title;
//         $this->writter = $writter;
//         $this->publisher = $publisher;
//         $this->price = $price;
//         $this->page = $page;
//         $this->time = $time;
//         $this->type = $type;
//     }

//     public function getLabel()
//     {
//         $str =  "{$this->writter}, {$this->publisher}";

//         return $str;
//     }
// }

// class Komik extends Product {
//     public function detailProduct($product) {
//         $str = "Komik : {$product->title} | {$product->getLabel()} | {$product->price} - {$product->page} Pages.";

//         return $str;
//     }
// }

// class Anime extends Product {
//     public function detailProduct($product) {
//         $str = "Anime : {$product->title} | {$product->getLabel()} | {$product->price} - {$product->time} Minutes";

//         return $str;
//     }
// }

// $product1 = new Komik('Fumetsu no anata e', 'Yoshitoki Oima', 'Kodansha', 120000, 345, 0, "Komik");
// $product2 = new Anime('Majo no tabitabi', 'Jougi Shiraishi', 'Square Enix', 149999, 0, 180, "Anime");

// echo $product2->detailProduct($product2);

// // Komik : Fumetsu no anata e | Yoshitoki Oima, Kodansha | 120000 - 300 Pages.

class Car {
    public $merk, $type, $color, $heavy, $hp, $price, $turbo, $sunroof;

    public function __construct($merk, $type, $color, $heavy, $hp, $price, $turbo, $sunroof)
    {
        $this->merk = $merk;
        $this->type = $type;
        $this->color = $color;
        $this->heavy = $heavy;
        $this->hp = $hp;
        $this->price = $price;
        $this->turbo = $turbo;
        $this->sunroof = $sunroof;
    }

    public function getLabel () {
        $str = "{$this->color}, {$this->heavy} kg";

        return $str;
    }
}

class Sport extends Car { // turbo true
    public function getCar ($car) {
        $str = "{$car->type} Car : {$car->merk} | {$car->getLabel()} | {$car->hp} HP | ({$car->price}) - {$car->turbo} Turbo";
        return $str;
    }
}

class SUV extends Car {
    public function getCar ($car) {
        $str = "{$car->type} Car : {$car->merk} | {$car->getLabel()} | {$car->hp} HP | ({$car->price}) - {$car->sunroof} Sunroof";
        return $str;
    }
}

$car1 = new Sport("Porsche 911", "Sport", "Gray", 192, 800, 1800000000, 2, 0);
$car2 = new SUV("Fortuner", "SUV", "White", "180", "500", 800000000, 0, 1);

echo $car1->getCar($car1);
echo "<br>";
echo $car2->getCar($car2);