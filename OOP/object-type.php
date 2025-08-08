<?php

class Product {
    public $title, $writter, $publisher, $season;

    public function __construct($title, $writter, $publisher, $season) {
        $this->title = $title;
        $this->writter = $writter;
        $this->publisher = $publisher;
        $this->season = $season;
    }

    public function aboutProduct () {
        return "The $this->title, writter with $this->writter and publisher with $this->publisher, now sale Rp. $this->season";
    }

    public function getLabel () {
        return "$this->writter, $this->publisher";
    }
}

class PrintProduct {
    public function print(Product $product) {
        return "{$product->title} | {$product->getLabel()} | {$product->season} Seasons";
    }
}

$product1 = new Product('Fumetsu no anata e', 'Yoshitoki Oima', 'Kodansha', 2);
$product2 = new Product('Majo no tabitabi', 'Jougi Shiraishi', 'Square Enix', 3);

// echo "Anime : " . $product1->getLabel();

$infoProduct1 = new PrintProduct();
echo $infoProduct1->print($product2);