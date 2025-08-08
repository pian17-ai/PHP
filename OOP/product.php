<?php

// Sale products
// Sale comics
// Sale games

class Product {
    public  $title = "judul",
            $writter = "penulis",
            $publisher = "penerbit", 
            $price = 0;

    public function sayHello () {
        return "The comic $this->title and writter $this->writter, sale with a Rp.$this->price";
    }
}

// $product1 = new Product();
// $product1->title = "Majo no tabi tabi";

// $product2 = new Product();
// $product2->title = "Fumetsu no anata e";
// $product2->season3 = "Oktober 2025";

// var_dump($product2);

$product1 =  new Product();
$product1->title = "Fumetsu no anata e";
$product1->writter = "Yoshitoki Oima";
$product1->price = 250000;

echo $product1->sayHello();

echo "<br>";

$product2 = new Product();
$product2->title = "Majo no tabi tabi";
$product2->writter = "Jogi Shiraishi prikitiw";
$product2->price = 300000;

echo $product2->sayHello();