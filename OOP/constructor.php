<?php

class Product {
    public $title, $writter, $publisher, $price;

    public function __construct($title, $writter, $publisher, $price) {
        $this->title = $title;
        $this->writter = $writter;
        $this->publisher = $publisher;
        $this->price = $price;
    }

    public function aboutProduct () {
        return "The $this->title, writter with $this->writter and publisher with $this->publisher, now sale Rp. $this->price";
    }
}

$product1 = new Product('Fumetsu no anata e', 'Yoshitoki Oima', 'Kodansha', 145000);
$product2 = new Product('Majo no tabitabi', 'Jougi Shiraishi', 'Square Enix', 190000);