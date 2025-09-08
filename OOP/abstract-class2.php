<?php

include 'php.ini';

abstract class Product
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

    public function setNewPrice($newPrice)
    {
        $this->price = $newPrice;
    }

    public function getPrice()
    {
        return $this->price - ($this->price * $this->discount / 100);
    }

    public function getDiscount()
    {
        return $this->discount;
    }

    // -------------------------------------------------

    public function getLabel()
    {
        $str = "{$this->writter}, {$this->publisher}";
        return $str;
    }

    abstract public function getProductDetail();

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

    public function getProductDetail()
    {
        $str = "Komik : " . $this->getDetail() . " - {$this->page} Pages";
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

    public function getProductDetail()
    {
        $str = "Anime : " . $this->getDetail() . " - {$this->time} Times";
        return $str;
    }

    public function getDiscount()
    {
        $disc = $this->price - ($this->price * $this->discount / 100);
        return $disc;
    }
}

class PrintProduct
{
    public $listProduct = [];

    public function tambahProduct(Product $product)
    {
        $this->listProduct[] = $product;
    }

    public function print()
    {
        $str = "Daftar product :";

        foreach ($this->listProduct as $lp) {
            $str .= '<br>' . "- {$lp->getDetail()}";
        }

        return $str;
    }
}

$product1 = new Komik('Fumetsu no anata e', 'Yoshitoki Oima', 'Kodansha', 120000, 135);
$product2 = new Anime('Majo no tabitabi', 'Jougi Shiraishi', 'Square Enix', 149999, 180);

$printProduct = new PrintProduct();
$printProduct->tambahProduct($product1);
$printProduct->tambahProduct($product2);

echo $printProduct->print();
