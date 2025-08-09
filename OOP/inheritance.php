<?php 

class Product {
    public $title, $writter, $publisher, $price, $page, $time, $type;

    public function __construct($title, $writter, $publisher, $price, $page, $time, $type)
    {
        $this->title = $title;
        $this->writter = $writter;
        $this->publisher = $publisher;
        $this->price = $price;
        $this->page = $page;
        $this->time = $time;
        $this->type = $type;
    }

    public function getLabel() {
        $str = "{$this->writter}, {$this->publisher}";

        return $str;
    }

    public function getDetailsProduct() {
        
    }
}

class Komik extends Product {
    public function getDetailsProduct()
    {
        $str = "Komik : {$this->title} | {$this->getLabel()} | {$this->price} - {$this->page} - Pages.";

        return $str;
    }
}

class Anime extends Product {
    public function getDetailsProduct()
    {
        $str = "Anime : {$this->title} | {$this->getLabel()} | {$this->price} - {$this->time} - Minutes";

        return $str;
    }
}

$product1 = new Komik('Fumetsu no anata e', 'Yoshitoki Oima', 'Kodansha', 120000, 345, 0, "Komik");
$product2 = new Anime('Majo no tabitabi', 'Jougi Shiraishi', 'Square Enix', 149999, 0, 180, "Anime");

echo $product1->getDetailsProduct();
echo "<br>";
echo $product2->getDetailsProduct();


// Komik : Fumetsu no anata e | Yoshitoki Oima, Kodansha | 120000 - 300 Pages.