<?php

class Product
{
    public $title, $writter, $publisher, $price, $page, $time, $type;

    public function __construct($title="title", $writter="writter", $publisher="publisher", $price="price", $page=0, $time=0, $type="type")
    {
        $this->title = $title;
        $this->writter = $writter;
        $this->publisher = $publisher;
        $this->price = $price;
        $this->page = $page;
        $this->time = $time;
        $this->type = $type;
    }

    public function getLabel()
    {
        return "{$this->writter}, {$this->publisher}"; 
    }

    public function getCompleteProduct() {
        $str = "{$this->type} : {$this->title} | {$this->getLabel()} | {$this->price} ";
        if ($this->type == 'Komik') {
            $str .= "- {$this->page} Pages.";
        } else if ($this->type == "Anime") {
            $str .= "~ {$this->time} Minutes.";
        } else {
            $str .= "";
        }

        return $str;
    }
}

class Printer
{
    public function print(Product $product)
    {
        return "{$product->title} | {$product->getLabel()} | ({$product->price})";
    }
}

$product1 = new Product('Fumetsu no anata e', 'Yoshitoki Oima', 'Kodansha', 120000, 345, 0, "Komik");
$product2 = new Product('Majo no tabitabi', 'Jougi Shiraishi', 'Square Enix', 149999, 0, 180, "Anime");

echo $product1->getCompleteProduct(); echo "<br>";
echo $product2->getCompleteProduct(); echo "<br>";

// Komik : Fumetsu no anata e | Yoshitoki Oima, Kodansha | 120000 - 300 Pages.
// Anime : Majo no tabitabi | Jougi Shiraishi, Square Enix | 149999 - 108 Minutes.
